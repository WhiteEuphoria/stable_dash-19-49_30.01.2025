<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\WithdrawalResource\Pages;
use App\Models\Withdrawal;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class WithdrawalResource extends Resource
{
    protected static ?string $model = Withdrawal::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $modelLabel = 'Withdrawal';
    protected static ?string $pluralModelLabel = 'Withdrawals';

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();
        return $user && $user->verification_status === 'approved';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('amount')
                    ->label('Withdrawal Amount')
                    ->required()
                    ->numeric()
                    ->step(0.01)
                    ->suffix(fn () => Auth::user()?->currency ?? config('currencies.default')),
                Forms\Components\Select::make('from_account_id')
                    ->label('From Account')
                    ->options(fn () => Auth::user()?->accounts()->pluck('name', 'id') ?? [])
                    ->searchable()
                    ->preload()
                    ->helperText('Leave empty to use main balance')
                    ->native(false)
                    ->nullable(),

                Forms\Components\TextInput::make('beneficiary_name')
                    ->label('Recipient Name')
                    ->required(),
                Forms\Components\TextInput::make('bank_name')
                    ->label('Bank Name')
                    ->required(),
                Forms\Components\TextInput::make('swift')
                    ->label('SWIFT')
                    ->required(),
                Forms\Components\TextInput::make('bank_account')
                    ->label('Bank Account / IBAN')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->sortable()
                    ->formatStateUsing(fn ($state, $record) => number_format((float) $state, 2) . ' ' . ($record->user->currency ?? 'EUR')),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'В обработке' => 'Pending',
                        'Выполнено', 'approve' => 'Approved',
                        'Отклонено' => 'Rejected',
                        default => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'pending', 'В обработке' => 'warning',
                        'approved', 'Выполнено', 'approve' => 'success',
                        'rejected', 'Отклонено' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Request Date')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWithdrawals::route('/'),
            'create' => Pages\CreateWithdrawal::route('/create'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }
}

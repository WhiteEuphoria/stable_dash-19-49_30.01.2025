<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\AccountResource\Pages;
use App\Models\Account;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Invoices';
    protected static ?string $modelLabel = 'Invoice';
    protected static ?string $pluralModelLabel = 'Invoices';
    protected static ?string $slug = 'invoices';

    public static function shouldRegisterNavigation(): bool
    {
        $user = Auth::user();
        return $user && $user->verification_status === 'approved';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('type')
                ->label('Type')
                ->options(config('accounts.types'))
                ->default('Брокерский')
                ->required(),

            Forms\Components\TextInput::make('number')
                ->label('Invoice Number')
                ->disabled()
                ->helperText('Generated automatically')
                ->default(function () {
                    $next = (int) \Illuminate\Support\Facades\DB::table('accounts')
                        ->selectRaw('MAX(CAST(number as INTEGER)) as max_num')
                        ->value('max_num');
                    $candidate = max(1, $next + 1);
                    if ($candidate > 1000000) { $candidate = 1; }
                    $tries = 0;
                    while (\App\Models\Account::where('number', (string) $candidate)->exists() && $tries < 1000001) {
                        $candidate++;
                        if ($candidate > 1000000) { $candidate = 1; }
                        $tries++;
                    }
                    return (string) $candidate;
                })
                ->dehydrated(true),

            Forms\Components\TextInput::make('balance')
                ->label('Balance')
                ->numeric()
                ->step(0.01)
                ->suffix(fn () => auth()->user()?->currency ?? config('currencies.default'))
                ->required(),

            Forms\Components\TextInput::make('name')
                ->label('Invoice Name')
                ->required(),

            Forms\Components\TextInput::make('bank')
                ->label('Bank Name')
                ->required(),

            Forms\Components\TextInput::make('client_initials')
                ->label('Client Initials')
                ->required(),

            Forms\Components\TextInput::make('broker_initials')
                ->label('Broker Initials'),

            // Note: No Status and no Expiration Date on client side
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('type')->label('Type')
                ->formatStateUsing(function ($state) {
                    $types = config('accounts.types');
                    return $types[$state] ?? $state;
                })
                ->badge(),
            Tables\Columns\TextColumn::make('currency')->label('Currency'),
            Tables\Columns\TextColumn::make('status')->label('Status')->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Active' => 'success',
                    'Hold', 'Pending' => 'warning',
                    'Blocked' => 'danger',
                    default => 'gray',
                }),
            Tables\Columns\TextColumn::make('created_at')->label('Created')->dateTime()->sortable(),
        ])->actions([])->bulkActions([]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccounts::route('/'),
            'create' => Pages\CreateAccount::route('/create'),
        ];
    }
}

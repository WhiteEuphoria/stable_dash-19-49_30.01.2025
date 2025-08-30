<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccountResource\Pages;
use App\Models\Account;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AccountResource extends Resource
{
    protected static ?string $model = Account::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Invoices';
    protected static ?string $modelLabel = 'Invoice';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')->relationship('user', 'name')->required(),
            Forms\Components\TextInput::make('number')->label('Card Number')->required(),
            Forms\Components\Select::make('type')
                ->options(config('accounts.types'))
                ->default('Брокерский')
                ->live()
                ->required(),

            Forms\Components\Select::make('currency')
                ->label('Currency')
                ->options(config('currencies.allowed'))
                ->default(config('currencies.default'))
                ->required(),

            Forms\Components\TextInput::make('balance')
                ->label('Balance')
                ->numeric()
                ->step(0.01)
                ->suffix(fn ($get) => $get('currency') ?: config('currencies.default'))
                ->required(),

            Forms\Components\TextInput::make('name')->label('Name')->required(),
            Forms\Components\TextInput::make('bank')->label('Custodian Bank')->required(),
            Forms\Components\TextInput::make('client_initials')->label('Client Initials')->required(),
            Forms\Components\TextInput::make('broker_initials')->label('Broker Initials')->required(),
            Forms\Components\DatePicker::make('term')->label('Expiration Date')->required(),
            Forms\Components\Select::make('status')
                ->options([
                    'Active' => 'Active',
                    'Hold' => 'Hold',
                    'Blocked' => 'Blocked',
                ])
                ->default('Active')
                ->required(),

            Forms\Components\Toggle::make('is_default')
                ->label('Primary (show first)')
                ->helperText('Mark as the main account shown first in the client area')
                ->default(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('user.name')->sortable(),
            Tables\Columns\TextColumn::make('name')
                ->default(fn ($record) => $record->type === 'Транзитный' ? 'Transit' : $record->name)
                ->label('Name')->searchable(),
            Tables\Columns\TextColumn::make('type')
                ->label('Type')
                ->formatStateUsing(fn (string $state): string => match ($state) {
                    'Транзитный' => 'Transit',
                    'Брокерский' => 'Brokerage',
                    'Инвестиционный' => 'Investment',
                    'Криптовалютный' => 'Crypto',
                    'Банковский' => 'Bank',
                    default => $state,
                })
                ->badge(),
            Tables\Columns\TextColumn::make('balance')
                ->label('Balance')
                ->sortable()
                ->formatStateUsing(fn ($state, $record) => number_format((float) $state, 2) . ' ' . ($record->currency ?? 'EUR')),
            Tables\Columns\TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                'Active' => 'success', 'Hold' => 'warning', 'Blocked' => 'danger',
                default => 'gray',
            }),
        ])->actions([Tables\Actions\EditAction::make()])->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }
    
    public static function getRelations(): array
    {
        return [];
    }
    
    public static function getPages(): array
    {
        return ['index' => Pages\ListAccounts::route('/'), 'create' => Pages\CreateAccount::route('/create'), 'edit' => Pages\EditAccount::route('/{record}/edit')];
    }
}

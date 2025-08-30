<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AccountsRelationManager extends RelationManager
{
    protected static string $relationship = 'accounts';

    protected static ?string $title = 'Accounts';

    public function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->default(fn ($record) => $record->type === 'Транзитный' ? 'Transit' : $record->name),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'Транзитный' => 'Transit',
                        'Брокерский' => 'Brokerage',
                        'Инвестиционный' => 'Investment',
                        'Криптовалютный' => 'Crypto',
                        'Банковский' => 'Bank',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('balance')->label('Balance')
                    ->formatStateUsing(fn ($state, $record) => number_format((float) $state, 2) . ' ' . ($record->currency ?? 'EUR')),
                Tables\Columns\TextColumn::make('status')->badge(),
            ])
            ->filters([])
            ->headerActions([])
            ->actions([
                Tables\Actions\EditAction::make()->url(fn ($record) => \App\Filament\Resources\AccountResource::getUrl('edit', ['record' => $record])),
            ])
            ->bulkActions([]);
    }
}

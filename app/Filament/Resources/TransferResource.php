<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransferResource\Pages;
use App\Models\Transfer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TransferResource extends Resource
{
    protected static ?string $model = Transfer::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';
    protected static ?string $navigationLabel = 'Transfers';
    protected static ?string $modelLabel = 'Transfer';
    protected static ?string $pluralModelLabel = 'Transfers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sender_id')
                    ->label('Sender')
                    ->relationship('sender', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\Select::make('receiver_id')
                    ->label('Receiver')
                    ->relationship('receiver', 'name')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('amount')
                    ->label('Amount')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),

                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->maxLength(255)
                    ->rows(2),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                    ]),

                Forms\Components\DateTimePicker::make('transferred_at')
                    ->label('Transferred At')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender.name')
                    ->label('Sender')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('receiver.name')
                    ->label('Receiver')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('message')
                    ->label('Message')
                    ->limit(30),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'completed',
                        'danger' => 'failed',
                    ])
                    ->sortable(),

                Tables\Columns\TextColumn::make('transferred_at')
                    ->label('Transferred At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTransfers::route('/'),
        ];
    }
}

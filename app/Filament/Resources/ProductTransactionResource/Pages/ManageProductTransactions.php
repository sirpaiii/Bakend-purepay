<?php

namespace App\Filament\Resources\ProductTransactionResource\Pages;

use App\Filament\Resources\ProductTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageProductTransactions extends ManageRecords
{
    protected static string $resource = ProductTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

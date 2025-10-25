<?php

namespace App\Filament\Resources\Tahunajarans\Pages;

use App\Filament\Resources\Tahunajarans\TahunajaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTahunajaran extends EditRecord
{
    protected static string $resource = TahunajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

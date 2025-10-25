<?php

namespace App\Filament\Resources\Tahunajarans\Pages;

use App\Filament\Resources\Tahunajarans\TahunajaranResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTahunajaran extends CreateRecord
{

    protected static string $resource = TahunajaranResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

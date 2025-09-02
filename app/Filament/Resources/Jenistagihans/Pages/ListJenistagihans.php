<?php

namespace App\Filament\Resources\Jenistagihans\Pages;

use App\Filament\Resources\Jenistagihans\JenistagihanResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListJenistagihans extends ListRecords
{
    protected static string $resource = JenistagihanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

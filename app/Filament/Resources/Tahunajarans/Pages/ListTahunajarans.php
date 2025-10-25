<?php

namespace App\Filament\Resources\Tahunajarans\Pages;

use App\Filament\Resources\Tahunajarans\TahunajaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTahunajarans extends ListRecords
{
    protected static string $resource = TahunajaranResource::class;
    protected static ?string $title = 'Tahun Ajaran';
    protected ?string $heading = 'Informasi Tahun Ajaran';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
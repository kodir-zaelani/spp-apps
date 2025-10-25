<?php

namespace App\Filament\Resources\Jenistagihans\Pages;

use Filament\Actions\CreateAction;
use Filament\Support\Icons\Heroicon;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\Jenistagihans\JenistagihanResource;

class ListJenistagihans extends ListRecords
{
    protected static string $resource = JenistagihanResource::class;
    protected static ?string $title = 'Jenis Tagihan';
    protected ?string $heading = 'Jenis Tagihan';
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
            ->icon(Heroicon::PlusCircle)
            ->label('New')
            ->size('xs')
            ->color('success'),
        ];
    }
}

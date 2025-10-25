<?php

namespace App\Filament\Resources\Semesters\Pages;

use App\Filament\Resources\Semesters\SemesterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSemesters extends ListRecords
{
    protected static string $resource = SemesterResource::class;
    protected static ?string $title = 'Semester';
    protected ?string $heading = 'Informasi Semester';

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
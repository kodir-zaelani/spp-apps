<?php

namespace App\Filament\Resources\Semesters\Schemas;

use App\Models\Tahunajaran;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class SemesterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            Select::make('tahunajaran_id')
            ->relationship('tahunajaran', 'nama')
            ->searchable()
            ->preload()
            ->live()
            ->afterStateUpdated(function ($state, callable $set) {
                $tahunajaran = Tahunajaran::find($state);

                $tahun_ajaran_id = $tahunajaran->tahun_ajaran_id;

                $set('tahun_ajaran_id', $tahun_ajaran_id);
            })
            ->afterStateHydrated(function (callable $set, $state) {
                $tahunajaranId = $state;

                if ($tahunajaranId) {
                    $tahun_ajaran_id = Tahunajaran::find($tahunajaranId);
                    $tahun_ajaran_id = $tahun_ajaran_id->tahun_ajaran_id;
                    $set('tahun_ajaran_id', $tahun_ajaran_id);
                }
            }),
            TextInput::make('tahun_ajaran_id')
            ->label('Tahun Angkatan')
            ->prefix('Angkatan')
            ->readOnly()
            ->required(),
            TextInput::make('semesterid')
            ->required(),
            TextInput::make('nama')
            ->required(),
            TextInput::make('semester')
            ->required()
            ->numeric(),
            // TextInput::make('periode_aktif')
            // ->required()
            // ->numeric(),
            DatePicker::make('tanggal_mulai')
            ->required(),
            DatePicker::make('tanggal_selesai')
            ->required(),
            Toggle::make('periode_aktif')
            ->required(),
        ]);
    }
}

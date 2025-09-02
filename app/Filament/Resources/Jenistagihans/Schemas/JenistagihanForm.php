<?php

namespace App\Filament\Resources\Jenistagihans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class JenistagihanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('sekolah_id')
                    ->relationship('sekolah', 'nama')
                    ->required(),
                Select::make('tahunajaran_id')
                    ->relationship('tahunajaran', 'nama')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Toggle::make('periodik')
                    ->required(),
                Select::make('jenis_periodik')
                    ->options(['bulan' => 'Bulan', 'tahun_ajaran' => 'Tahun Ajaran'])
                    ->default(null),
                Toggle::make('perlu_tagihan')
                    ->required(),
                TextInput::make('besaran')
                    ->required()
                    ->numeric(),
                DatePicker::make('tanggal_mulai')
                    ->required(),
                DatePicker::make('tanggal_selesai')
                    ->required(),
            ]);
    }
}

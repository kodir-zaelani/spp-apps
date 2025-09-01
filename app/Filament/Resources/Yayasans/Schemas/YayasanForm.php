<?php

namespace App\Filament\Resources\Yayasans\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;

class YayasanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            TextInput::make('nama')
            ->required(),
            TextInput::make('slug')
            ->required(),
            TextInput::make('alamat')
            ->default(null),
            TextInput::make('rt')
            ->default('00000'),
            TextInput::make('rw')
            ->default('00000'),
            TextInput::make('nama_dusun')
            ->default(null),
            // Select::make('province_code')
            // ->relationship('province', 'name')
            // ->required(),
            Select::make('province_code')
            ->relationship('province', 'name')
            // ->options(\Laravolt\Indonesia\Models\Province::orderBy('code')->pluck('name', 'code'))
            ->searchable()
            ->reactive() // Make this field reactive to trigger updates
            ->afterStateUpdated(fn (Get $get, callable $set) => $set('city_code', null)) // Clear dependent field on change
            ->afterStateUpdated(fn (Get $get, callable $set) => $set('district_code', null)), // Clear other dependent field
            Select::make('city_code')
            ->relationship('city', 'name')
            ->required(),
            Select::make('district_code')
            ->relationship('district', 'name')
            ->required(),
            Select::make('village_code')
            ->relationship('village', 'name')
            ->required(),
            TextInput::make('kode_pos')
            ->default(null),
            TextInput::make('lintang')
            ->default(null),
            TextInput::make('bujur')
            ->default(null),
            TextInput::make('no_telp')
            ->tel()
            ->default(null),
            TextInput::make('no_fax')
            ->default(null),
            TextInput::make('email')
            ->label('Email address')
            ->email()
            ->default(null),
            TextInput::make('website')
            ->default(null),
            Textarea::make('maps')
            ->default(null)
            ->columnSpanFull(),
            TextInput::make('no_pendirian_yayasan')
            ->default(null),
            DatePicker::make('tgl_pendirian_yayasan'),
            TextInput::make('nomor_pengesahan_pn_ln')
            ->default(null),
            TextInput::make('nomor_sk_bn')
            ->default(null),
            DatePicker::make('tanggal_sk_bn'),
            FileUpload::make('logo_yayasan')
            ->directory('logo_yayasan')
            ->columnSpanFull()
            ->default(null),
        ]);
    }
}

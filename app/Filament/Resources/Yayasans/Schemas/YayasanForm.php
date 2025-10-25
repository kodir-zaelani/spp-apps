<?php

namespace App\Filament\Resources\Yayasans\Schemas;

use App\Models\Yayasan;
use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Illuminate\Support\Collection;
use Laravolt\Indonesia\Models\City;
use Livewire\Component as Livewire;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Laravolt\Indonesia\Models\Village;
use Filament\Forms\Components\Textarea;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;

class YayasanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            TextInput::make('nama')
            ->live(onBlur: true) // Updates the slug when the title field loses focus
            ->afterStateUpdated(function (Set $set, $state) {
                $set('slug', Str::slug($state));
            })
            ->required(),
            TextInput::make('slug')
            ->readOnly()
            ->required(),
            TextInput::make('alamat')
            ->default(null),
            TextInput::make('rt')
            ->default('00000'),
            TextInput::make('rw')
            ->default('00000'),
            TextInput::make('nama_dusun')
            ->default(null),
            Select::make('province_code')
            ->live()
            ->label('Province')
            ->searchable()
            ->preload()
            ->options(Province::query()->pluck('name', 'code'))
            ->reactive() // Make this field reactive to trigger updates
            ->afterStateUpdated(fn (Get $get, callable $set) => $set('city_code', null)) // Clear dependent field on change
            ->afterStateUpdated(fn (Get $get, callable $set) => $set('district_code', null)) // Clear other dependent field
            ->afterStateUpdated(fn (Get $get, callable $set) => $set('village_code', null)) // Clear other dependent field
            ->required(),

            Select::make('city_code')
            ->relationship('city', 'name')
            ->options(fn (Get $get): Collection => City::query()
            ->where('province_code', $get('province_code'))
            ->pluck('name', 'code'))
            ->live()
            ->preload()
            ->reactive() // Make this field reactive to trigger updates
            ->afterStateUpdated(fn (Set $set) => $set('district_code', null)) // Clear other dependent field
            ->afterStateUpdated(fn (Get $get, callable $set) => $set('village_code', null)) // Clear other dependent field
            ->required(),

            Select::make('district_code')
            ->relationship('district', 'name')
            ->options(fn (Get $get): Collection => District::query()
            ->where('city_code', $get('city_code'))
            ->pluck('name', 'code'))
            ->live()
            ->reactive() // Make this field reactive to trigger updates
            ->afterStateUpdated(fn (Get $get, callable $set) => $set('village_code', null)) // Clear other dependent field
            ->required(),

            Select::make('village_code')
            ->relationship('village', 'name')
            ->options(fn (Get $get): Collection => Village::query()
            ->where('district_code', $get('district_code'))
            ->pluck('name', 'code'))
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
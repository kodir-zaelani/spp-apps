<?php

namespace App\Filament\Resources\Jenistagihans;

use App\Filament\Resources\Jenistagihans\Pages\CreateJenistagihan;
use App\Filament\Resources\Jenistagihans\Pages\EditJenistagihan;
use App\Filament\Resources\Jenistagihans\Pages\ListJenistagihans;
use App\Filament\Resources\Jenistagihans\Schemas\JenistagihanForm;
use App\Filament\Resources\Jenistagihans\Tables\JenistagihansTable;
use App\Models\Jenistagihan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenistagihanResource extends Resource
{
    protected static ?string $model = Jenistagihan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Jenis Tagihan';

    public static function form(Schema $schema): Schema
    {
        return JenistagihanForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JenistagihansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJenistagihans::route('/'),
            'create' => CreateJenistagihan::route('/create'),
            'edit' => EditJenistagihan::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
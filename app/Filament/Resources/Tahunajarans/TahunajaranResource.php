<?php

namespace App\Filament\Resources\Tahunajarans;

use App\Filament\Resources\Tahunajarans\Pages\CreateTahunajaran;
use App\Filament\Resources\Tahunajarans\Pages\EditTahunajaran;
use App\Filament\Resources\Tahunajarans\Pages\ListTahunajarans;
use App\Filament\Resources\Tahunajarans\Schemas\TahunajaranForm;
use App\Filament\Resources\Tahunajarans\Tables\TahunajaransTable;
use App\Models\Tahunajaran;
use UnitEnum;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TahunajaranResource extends Resource
{


    protected static ?string $model = Tahunajaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Tahun Ajaran';
    protected static string | UnitEnum | null $navigationGroup = 'Master';
    protected static ?string $recordTitleAttribute = 'Tahun Ajaran';


    public static function form(Schema $schema): Schema
    {
        return TahunajaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TahunajaransTable::configure($table);
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
            'index' => ListTahunajarans::route('/'),
            'create' => CreateTahunajaran::route('/create'),
            'edit' => EditTahunajaran::route('/{record}/edit'),
        ];
    }
}
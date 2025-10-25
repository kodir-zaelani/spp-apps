<?php

namespace App\Filament\Resources\Tahunajarans\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Contracts\Support\Htmlable;

class TahunajaransTable
{


    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('tahun_ajaran_id')
            ->sortable(),
            TextColumn::make('nama')
            ->searchable(),
            // TextColumn::make('periode_aktif')
            // ->label('Status')
            // ->numeric()
            // ->badge()
            // ->color(fn (string $state): string => match ($state) {
            //     '0' => 'gray',
            //     '1' => 'success',
            // })
            // ->sortable(),
            TextColumn::make('periodef')
            ->label('Status')
            ->badge()
            ->color(fn (string $state): string => match ($state) {
                '0' => 'gray',
                'Aktif' => 'success',
            })
            ->sortable(),
            TextColumn::make('tanggal_mulai')
            ->date('j M Y')
            ->sortable(),
            TextColumn::make('tanggal_selesai')
            ->date('j M Y')
            ->sortable(),
            TextColumn::make('created_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true),
            ])->defaultSort('tahun_ajaran_id', direction: 'desc')
            ->filters([
                //
                ])
                ->recordActions([
                    EditAction::make(),
                    ])
                    ->toolbarActions([
                        BulkActionGroup::make([
                            DeleteBulkAction::make(),
                        ]),
                    ]);
                }
            }
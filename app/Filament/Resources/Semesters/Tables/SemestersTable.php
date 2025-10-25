<?php

namespace App\Filament\Resources\Semesters\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SemestersTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('tahunajaran.nama')
            ->searchable(),
            TextColumn::make('semesterid')
            ->searchable(),
            TextColumn::make('nama')
            ->searchable(),
            TextColumn::make('semester')
            ->numeric()
            ->sortable(),
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
            ])
            ->defaultSort('semesterid', direction: 'desc')
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

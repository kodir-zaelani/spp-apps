<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DateTimePicker;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
            FileUpload::make('image')
            ->columnSpanFull()
            ->image(),
            TextInput::make('name')
            ->required(),
            TextInput::make('email')
            ->label('Email address')
            ->email()
            ->required() // Make it required for new records
            ->hiddenOn('edit'),
            TextInput::make('username')
            ->default(null),
            TextInput::make('displayname')
            ->default(null),
            TextInput::make('celuller_no')
            ->label('Phone Number')
            ->tel()
            ->default(null),
            TextInput::make('password')
            ->password()
            ->helperText('Minimum 8 characters')
            ->required() // Make it required for new records
            ->minLength(8) // Make it required for new records
            ->maxLength(255) // Make it required for new records
            ->hiddenOn('edit'),
            CheckboxList::make('roles')
            ->label('Role')
            ->required()
            ->columnSpanFull()
            ->columns(5)
            ->relationship(titleAttribute: 'name'),
            Textarea::make('bio')
            ->default(null)
            ->columnSpanFull(),
            Toggle::make('status')
            ->required(),
        ]);
    }
}

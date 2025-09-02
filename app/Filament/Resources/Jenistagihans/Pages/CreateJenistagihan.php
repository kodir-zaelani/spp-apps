<?php

namespace App\Filament\Resources\Jenistagihans\Pages;

use App\Filament\Resources\Jenistagihans\JenistagihanResource;
use Filament\Resources\Pages\CreateRecord;

class CreateJenistagihan extends CreateRecord
{
    protected static string $resource = JenistagihanResource::class;
      protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

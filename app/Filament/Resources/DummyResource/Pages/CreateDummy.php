<?php

namespace App\Filament\Resources\DummyResource\Pages;

use App\Filament\Resources\DummyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDummy extends CreateRecord
{
    protected static string $resource = DummyResource::class;
}

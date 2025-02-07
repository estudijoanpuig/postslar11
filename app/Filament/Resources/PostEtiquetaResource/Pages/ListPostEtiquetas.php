<?php

namespace App\Filament\Resources\PostEtiquetaResource\Pages;

use App\Filament\Resources\PostEtiquetaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostEtiquetas extends ListRecords
{
    protected static string $resource = PostEtiquetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

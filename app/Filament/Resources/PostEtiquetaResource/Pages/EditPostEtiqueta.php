<?php

namespace App\Filament\Resources\PostEtiquetaResource\Pages;

use App\Filament\Resources\PostEtiquetaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPostEtiqueta extends EditRecord
{
    protected static string $resource = PostEtiquetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
	
	protected function getRedirectUrl(): string
    {
        // Redirige a la lista de posts después de editar
        return $this->getResource()::getUrl('index');
    }
}

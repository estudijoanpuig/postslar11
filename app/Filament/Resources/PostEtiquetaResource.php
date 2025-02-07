<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostEtiquetaResource\Pages;
use App\Filament\Resources\PostEtiquetaResource\RelationManagers;
use App\Models\PostEtiqueta;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostEtiquetaResource extends Resource
{
    protected static ?string $model = PostEtiqueta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('post_id')
                    ->relationship(name: 'post', titleAttribute: 'title'),
                    
                    Select::make('etiqueta_id')				
                    ->relationship(name: 'etiqueta', titleAttribute: 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('post_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('etiqueta_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPostEtiquetas::route('/'),
            'create' => Pages\CreatePostEtiqueta::route('/create'),
            'edit' => Pages\EditPostEtiqueta::route('/{record}/edit'),
        ];
    }
    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}

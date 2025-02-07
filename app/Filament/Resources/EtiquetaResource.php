<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EtiquetaResource\Pages;
use App\Filament\Resources\EtiquetaResource\RelationManagers;
use App\Models\Etiqueta;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EtiquetaResource extends Resource
{
    protected static ?string $model = Etiqueta::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('svg')                   
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
				Tables\Columns\TextColumn::make('id')
                    ->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()->sortable(),
				Tables\Columns\TextColumn::make('svg')
                    ->limit(80)
					->searchable()
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
            'index' => Pages\ListEtiquetas::route('/'),
            'create' => Pages\CreateEtiqueta::route('/create'),
            'edit' => Pages\EditEtiqueta::route('/{record}/edit'),
        ];
    }
	
	protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}

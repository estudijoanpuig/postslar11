<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\BelongsToManyCheckboxList;
use Filament\Tables\Columns\TextColumn;


use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\EditRecord;


class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category_id')				
                    ->relationship(name: 'category', titleAttribute: 'name'),
					
				BelongsToManyCheckboxList::make('etiquetas')
            ->relationship('etiquetas', 'name')->columnSpanFull()->columns(4), 
			
			Forms\Components\Select::make('books')
    ->label('Llibres Associats')
    ->relationship('books', 'title') // Agafa els llibres disponibles
    ->multiple() // Permet seleccionar múltiples llibres
    ->searchable(), // Permet buscar llibres

	
	
                Forms\Components\TextInput::make('excerpt')
                    ->required()
                    ->maxLength(500),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->maxLength(16777215)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('img')                    
                    ->preserveFilenames(),
                Forms\Components\TextInput::make('url')                    
                    ->nullable(),
                Forms\Components\TextInput::make('ins')                    
                    ->nullable(),
                Forms\Components\TextInput::make('face')                    
                    ->nullable(),
                Forms\Components\TextInput::make('youtube')                    
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
				Tables\Columns\TextColumn::make('id')
                    ->searchable()->sortable()->limit(4),
				Tables\Columns\ImageColumn::make('img')->width(75),	
                Tables\Columns\TextColumn::make('title')
                    ->searchable()->sortable()->limit(50),
					
				TextColumn::make('category.name')
    ->label('Category')
    ->sortable()
    ->searchable()
	->toggleable(isToggledHiddenByDefault: true)
    ->limit(10),
                
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
	
	protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}




}
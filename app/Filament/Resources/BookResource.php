<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                // Pujada d'imatge
                Forms\Components\FileUpload::make('img')
                    ->image() // Indica que és una imatge
                    ->preserveFilenames()
                    ->required(),

                // Pujada d'arxiu PDF
                Forms\Components\FileUpload::make('pdf_url')
                    ->acceptedFileTypes(['application/pdf']) // Només permet PDFs
                    ->preserveFilenames()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                // Mostrar la imatge com a miniatura
                Tables\Columns\ImageColumn::make('img')
                    ->disk('public') // Indica que està a storage/app/public/
                    ->height(50),

                // Enllaç al PDF
                Tables\Columns\TextColumn::make('pdf_url')
                    ->formatStateUsing(fn ($state) => "<a href='/storage/{$state}' target='_blank'>📄 Veure PDF</a>")
                    ->html(),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}

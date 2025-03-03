<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeySectorResource\Pages;
use App\Filament\Resources\KeySectorResource\RelationManagers;
use App\Models\KeySector;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Nette\Utils\ImageColor;

class KeySectorResource extends Resource
{
    protected static ?string $model = KeySector::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Business's info")
                    ->description("Please fill the information for your business. Don't upload large image file (Maximun image size is 2MB)")
                    ->aside()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        Textarea::make('intro')
                            ->required()
                            ->rows(5),
                        FileUpload::make('image')
                            ->disk('public')
                            ->directory('key-sectors')
                            ->nullable()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->width(80),
                TextColumn::make('title')
                    ->wrap()
                    ->lineClamp(2)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('intro')
                    ->width(300)
                    ->wrap()
                    ->lineClamp(2)
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKeySectors::route('/'),
            'create' => Pages\CreateKeySector::route('/create'),
            'edit' => Pages\EditKeySector::route('/{record}/edit'),
        ];
    }
}

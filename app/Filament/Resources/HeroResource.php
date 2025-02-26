<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroResource\Pages;
use App\Filament\Resources\HeroResource\RelationManagers;
use App\Models\Hero;
use Doctrine\DBAL\Schema\Schema;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-2-stack';
    protected static ?string $navigationLabel = 'Sliders';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Slider Information')
                    ->description('Please fill the information for your slider. You can select content position at position selector')
                    ->aside()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        Textarea::make('intro')
                            ->required()
                            ->rows(5),
                        Select::make('position')
                            ->label('Position')
                            ->options([
                                'left' => 'Left',
                                'center' => 'Center',
                                'right' => 'Right'
                            ])
                            ->default('right')
                            ->native(false),
                        FileUpload::make('image')
                            ->label('Background Image')
                            ->required()
                            ->disk('public')
                            ->directory('hero-image'),
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
                        ->lineClamp(2),
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
            'index' => Pages\ListHeroes::route('/'),
            'create' => Pages\CreateHero::route('/create'),
            'edit' => Pages\EditHero::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecordResource\Pages;
use App\Filament\Resources\RecordResource\RelationManagers;
use App\Models\Record;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class RecordResource extends Resource
{
    protected static ?string $model = Record::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tab::make('Record Info')
                            ->icon('heroicon-o-bars-3-center-left')
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->string(),
                                Textarea::make('intro')
                                    ->rows(3)
                                    ->columnSpanFull(),
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->disk('public')
                                    ->directory('track-record'),
                            ]),
                        Tab::make('Record Images')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                Section::make("Record Images")
                                    ->description("Don't upload large files. Maximum image size is 2MB.")
                                    ->aside()
                                    ->schema([
                                        Repeater::make('images')
                                            ->relationship()
                                            ->schema([
                                                FileUpload::make('image')
                                                    ->label('Upload Image')
                                                    ->image()
                                                    ->disk('public')
                                                    ->directory('track-record-images'),
                                            ])
                                    ])
                            ])->columnSpanFull()
                    ])->columnSpanFull()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')
                    ->width(80),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->lineClamp(2),
                TextColumn::make('intro')
                    ->width(200)
                    ->wrap()
                    ->lineClamp(2),
                TextColumn::make('images_count')
                    ->counts('images')
                    ->alignCenter()
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
            'index' => Pages\ListRecords::route('/'),
            'create' => Pages\CreateRecord::route('/create'),
            'edit' => Pages\EditRecord::route('/{record}/edit'),
        ];
    }
}

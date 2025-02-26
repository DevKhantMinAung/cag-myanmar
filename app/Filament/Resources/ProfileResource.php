<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
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

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->description('Please fill the profile information. You can leave blank for title 2 and 3')
                    ->aside()
                    ->schema([
                        TextInput::make('name')
                            ->string()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('title1')
                            ->label('Title 1')
                            ->nullable(),
                        TextInput::make('title2')
                            ->label('Title 2')
                            ->nullable()
                            ->placeholder('Optional'),
                        TextInput::make('title3')
                            ->label('Title 3')
                            ->nullable()
                            ->placeholder('Optional'),
                        Textarea::make('desc')
                            ->label('Description')
                            ->rows(5)
                            ->columnSpanFull(),
                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('profile-images')
                            ->previewable()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->circular()
                    ->size(40),
                TextColumn::make('name')
                    ->wrap()
                    ->lineClamp(2)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('title1')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('desc')
                    ->label('Info')
                    ->wrap()
                    ->lineClamp(2)
                    ->width(250)
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}

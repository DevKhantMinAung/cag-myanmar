<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Service\Attribute\Required;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Primary')
                    ->description('Please fill all primary input boxes')
                    ->aside()
                    ->schema([
                        FileUpload::make('logo')
                            ->disk('public')
                            ->directory('setting-logo')
                            ->image()
                            ->columnSpan(1),
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('sub-title')
                            ->required(),
                    ]),
                Section::make('Additional')
                    ->collapsible()
                    ->schema([
                        TextInput::make('phone1')
                        ->label('Phone 1')
                        ->tel(),
                        TextInput::make('phone2')
                            ->label('Phone 2 (Optional)')
                            ->tel(),
                            TextInput::make('email')
                                ->email()
                                ->nullable(),
                                TextInput::make('address-url')
                                    ->label('Map Url'),
                        Textarea::make('address')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
        $setting = Setting::first();
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}

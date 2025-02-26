<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Setting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingResource::class;

    public function mount(): void
    {
        $setting = Setting::query()->first();

        if($setting) {
            $this->redirect(route('filament.admin.resources.settings.edit', $setting));
        }
    }
}

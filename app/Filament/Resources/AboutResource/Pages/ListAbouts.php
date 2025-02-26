<?php

namespace App\Filament\Resources\AboutResource\Pages;

use App\Filament\Resources\AboutResource;
use App\Models\About;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Http\RedirectResponse;

class ListAbouts extends ListRecords
{
    protected static string $resource = AboutResource::class;

    public function mount(): void
    {
        $about = About::query()->first();

        if($about) {
            $this->redirect(route('filament.admin.resources.abouts.edit', $about));
        }
    }
}

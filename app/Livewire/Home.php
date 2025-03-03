<?php

namespace App\Livewire;

use App\Models\About;
use App\Models\Company;
use App\Models\Hero;
use App\Models\KeySector;
use App\Models\profile;
use App\Models\Record;
use App\Models\Service;
use Livewire\Component;


class Home extends Component
{

    public $companies;
    public $sliders;
    public $about;
    public $services;
    public $excutive_profile;
    public $key_sectors;
    public $records;


    public function placeholder()
    {
        return view('livewire.placeholder');
    }

    public function render()
    {
        $this->records = Record::with('images:id,record_id,image')->get(['id', 'title', 'intro', 'thumbnail']);
        return view('livewire.home', [
            $this->about = About::first(['title', 'desc', 'image']),
            $this->companies = Company::all(),
            $this->sliders = Hero::all(['image']),
            $this->services = Service::all(['name', 'intro', 'icon']),
            $this->excutive_profile = profile::first(['name', 'title1', 'title2', 'title3', 'desc', 'image']),
            $this->key_sectors = KeySector::all(['title', 'intro', 'image']),
            'records' => $this->records
        ]);
    }
}

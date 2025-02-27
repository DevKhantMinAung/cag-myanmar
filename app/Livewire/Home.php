<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;


class Home extends Component
{

    public $companies;

    public function placeholder()
    {
        return view('livewire.placeholder');
    }

    public function render()
    {
        

        return view('livewire.home', [
            $this->companies = Company::all()
        ]);
    }
}

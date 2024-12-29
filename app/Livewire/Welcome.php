<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public $count = 0;
    
    public function plus()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.welcome');
    }
}

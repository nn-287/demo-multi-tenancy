<?php

namespace App\Livewire;
use Livewire\Component;

class UserPanel extends Component
{
    public $toggle = false;
    public function toggleRequests()
    {   
        $this->toggle = !$this->toggle;
    }
    public function render()
    {
        return view('livewire.user-panel');
    }
}

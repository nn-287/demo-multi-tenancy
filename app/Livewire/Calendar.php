<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class Calendar extends Component
{
    public $events = [];
    public $title;
    public $start;
    public $end;
    
    
    public function render()
    {
        
        return view('livewire.calendar');
    }
}

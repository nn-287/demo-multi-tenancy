<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Calendar extends Component
{
    public $events = [];
    public $title;
    public $start;
    public $end;

    public function mount(){
        if(Auth::user()){
            $this->listEvents();
        }
    }
    public function listEvents(){
        $this->events = Event::all();
    }
    
    
    public function render()
    {
        
        return view('livewire.calendar');
    }
}

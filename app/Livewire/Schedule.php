<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Schedule extends Component
{   
    public $tabTitle = 'schedule';
    public $currentTab = '';

    public function handleTabSwitch($currentTab)
    {
        $this->currentTab = $currentTab;
        if($currentTab == $this->tabTitle && Auth::user()){
            $this->index();
        }
    }

    public function index(){
        dd($this->currentTab,'Alo ana el index!');
    }

    public function render()
    {
        return view('livewire.schedule');
    }
}

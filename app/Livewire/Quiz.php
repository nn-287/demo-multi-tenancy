<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Quiz extends Component
{
    public $currentTab = '';
    public $tabTitle = 'quiz';


    public function handleTabSwitch($currentTab){
        $this->currentTab = $currentTab;
        if($currentTab == $this->tabTitle && Auth::user()){
            $this->index();
        }
    }

    public function index(){
        dd('Alo ana el index mn el quiz!!!');
    }

    public function render()
    {
        return view('livewire.quiz');
    }
}

<?php
namespace App\Livewire;
use Livewire\Component;

class UserPanel extends Component
{
    public $showCourses = false;
    public $activeTab= '';
    public function toggleButton(){   
        $this->showCourses = !$this->showCourses;
    }

    public function switchTab($currentTab){
        $this->activeTab = $currentTab;
        $this->showCourses = ($currentTab === 'courses');
    }
    public function render()
    {
        return view('livewire.user-panel',['activeTab'=>$this->activeTab]);
    }
}

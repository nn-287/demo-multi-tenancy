<?php
namespace App\Livewire;
use Livewire\Component;

class UserPanel extends Component
{
    public $showCourses = false;
    public function toggleButton()
    {   
        $this->showCourses = !$this->showCourses;
    }
    public function render()
    {
        return view('livewire.user-panel');
    }
}

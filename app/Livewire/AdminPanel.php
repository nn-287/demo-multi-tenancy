<?php
namespace App\Livewire;
use Livewire\Component;

class AdminPanel extends Component
{
    public $toggle = false;
    public $tenancyrequest = null;

    public function toggleRequests()
    {   
        $this->toggle = !$this->toggle;
    }
    public function render()
    {
        return view('livewire.admin-panel');
    }
}

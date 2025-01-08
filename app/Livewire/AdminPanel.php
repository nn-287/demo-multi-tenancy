<?php
namespace App\Livewire;
use Livewire\Component;

class AdminPanel extends Component
{
    public $toggle = false;
    public $tenancyrequest = null;
    public $page = 'hero';

    public function toggleRequests()
    {   
        $this->toggle = !$this->toggle;
    }

    public function setPage(string $page)
    {
        $this->page = $page;
    }

    public function render()
    {
        return view('livewire.admin-panel');
    }
}

<?php
namespace App\Livewire;
use Livewire\Component;

class Notification extends Component
{
    public $message;
    public $type;
    protected $listeners = ['showNotification'];

    public function showNotification($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
        $this->dispatch('notification:hide', ['time' => 50000]);
    }
    public function render()
    {
        return view('livewire.notification');
    }
}

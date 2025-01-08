<?php
namespace App\Livewire;
use App\Models\TenancyRequest as ModelsTenancyRequest;
use Livewire\Component;

class TenancyRequest extends Component
{
    public $name = '';
    public $description= '';
    public $email= '';
    public $phone_number= '';
    public $slug= '';

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'description' => 'required|min:10',
            'email' => 'required|email',
            'phone_number' => 'required|min:11',
            'slug' => 'required|min:3',
        ];
       
    }
    public function submitTenancyRequest()
    {//TODO - Add toaster message
        $validatedData = $this->validate();
        ModelsTenancyRequest::create($validatedData);
        $this->reset();
        $this->redirect('tenancyrequest');
    }
    public function render()
    {
        return view('livewire.tenancy-request');
    }
}

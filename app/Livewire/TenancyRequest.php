<?php
namespace App\Livewire;
use App\Models\TenancyRequest as ModelsTenancyRequest;
use Livewire\Component;
use Livewire\Attributes\Validate;

class TenancyRequest extends Component
{
    #[Validate]
    public $name;
    public $description;
    public $email;
    public $phone_number;
    public $slug;

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
    {
        $validatedData = $this->validate();
        ModelsTenancyRequest::create($validatedData);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.tenancy-request');
    }
}

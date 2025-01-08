<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLoginForm extends Component
{
    public $email = '';
    public $password = '';

    public function rules(){
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    public function login()
    {
       $validatedData = $this->validate();
        if($validatedData){

            if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
                return redirect('admin-dashboard');
            }
            return redirect('/');
        }
        return redirect('/');
    }
    
    public function render()
    {
        return view('livewire.admin-login-form');
    }
}

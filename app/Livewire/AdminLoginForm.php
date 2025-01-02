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
        //TODO - Add toaster message
       $validatedData = $this->validate();
        if($validatedData){

            if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
                return redirect('admin-dashboard');
            }
            // session()->flash('error', 'Login failed. Please check your email and password.');
            return redirect('/');
        }

        // session()->flash('error', 'There was an issue with the data you provided. Please try again.');
        return redirect('/');

        
        
    }
    public function render()
    {
        return view('livewire.admin-login-form');
    }
}

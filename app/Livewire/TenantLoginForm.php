<?php
namespace App\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TenantLoginForm extends Component
{
    public $email = '';
    public $password = '';
    public $user;

    public function rules(){
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }
    
    public function mount()
    {
        if (session()->has('errors')) {
            $this->addError('email', session('errors')->first('email'));
        }
    }

    public function submit()
    { 
        $validated = $this->validate();

        try {
            if (Auth::attempt([
                'email' => $this->email,
                'password' => $this->password
            ])) {
                session()->regenerate();
                return redirect()->intended(route('tenant.dashboard'));
            }
            
            $this->addError('email', 'Invalid credentials');
            
        } catch (\Exception $e) {
            logger()->error('Login error: ' . $e->getMessage());
            $this->addError('email', 'An error occurred during login');
        }

    }
    public function render()
    {
        return view('livewire.tenant-login-form');
    }
}

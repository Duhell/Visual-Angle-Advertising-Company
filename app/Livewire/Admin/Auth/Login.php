<?php

namespace App\Livewire\Admin\Auth;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Administrator Login')]
#[Layout('/livewire/layout/app')]

class Login extends Component
{
    #[Rule('required|email')]
    public string $email;

    #[Rule('required|min:8')]
    public string $password;

    public function login()
    {
        $this->validate();

        try{
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                $this->reset();
                return $this->redirect('@dashboard', navigate: true);
            } else {
                return session()->flash('error', 'Wrong email or password.');
            }
        }catch(Exception $error){
            Log::error('Not Connected To Database.',[
                'reason'=>$error->getMessage()
            ]);
            return session()->flash('error', 'Something went wrong.');
        }

    }
    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}

<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Services\Contracts\AuthServiceInterface;

class SignIn extends Component
{
    protected AuthServiceInterface $authService;
    
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.pages.sign-in')
            ->layout('livewire.layouts.app');
    }

    public function boot(AuthServiceInterface $authService)
    {
        $this->authService = $authService;
    }

    public function redirectToSignUp()
    {
        return $this->redirect('/signup', navigate: true);
    }

    public function authenticateUser()
    {
        $this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $this->only(['email', 'password']);

        if ($this->authService->authUser($credentials)) {
            return $this->redirect('/dashboard/myfiles', navigate: true);
        }

        $this->addError('failAuthentication', 'Credenciais inválidas. Por favor, tente novamente.');
    }
}

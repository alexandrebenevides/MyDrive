<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Services\Contracts\UserServiceInterface;

class SignUp extends Component
{
    protected UserServiceInterface $userService;
    
    public $name;
    public $email;
    public $password;
    public $confirmPassword;

    public function render()
    {
        return view('livewire.pages.sign-up')
            ->layout('livewire.layouts.app');
    }

    public function boot(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function redirectToSignIn()
    {
        return $this->redirect('/', navigate: true);
    }

    public function registerUser()
    {
        $this->validate([ 
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|same:password',
        ]);

        $userData = $this->only(['name', 'email', 'password']);
        $this->userService->createUser($userData);

        $this->name = $this->email = $this->password = $this->confirmPassword = '';
        session()->flash('successRegisterUser', 'Seu usuário foi cadastrado com sucesso. Acesse sua conta.');
    }
}

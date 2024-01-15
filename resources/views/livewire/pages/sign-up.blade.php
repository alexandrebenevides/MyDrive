<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
  <div
    class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800"
  >
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img
          aria-hidden="true"
          class="object-cover w-full h-full dark:hidden"
          src="{{ asset('assets/images/signup-background.jpg') }}"
          alt="Mail"
        />
        <img
          aria-hidden="true"
          class="hidden object-cover w-full h-full dark:block"
          src="{{ asset('assets/images/signup-background.jpg') }}"
          alt="Mail"
        />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1
            class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200"
          >
            Crie sua conta
          </h1>

          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nome completo</span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="Seu nome"
              wire:model="name"
            />
          </label>
          <p class="text-red-700 dark:text-red-400 text-sm">@error('name') {{ $message }} @enderror</p>

          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">E-mail</span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="email@email.com"
              wire:model="email"
            />
          </label>
          <p class="text-red-700 dark:text-red-400 text-sm">@error('email') {{ $message }} @enderror</p>

          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Senha</span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="********"
              type="password"
              wire:model="password"
            />
          </label>
          <p class="text-red-700 dark:text-red-400 text-sm">@error('password') {{ $message }} @enderror</p>

          <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
              Confirme sua senha
            </span>
            <input
              class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
              placeholder="********"
              type="password"
              wire:model="confirmPassword"
            />
          </label>
          <p class="text-red-700 dark:text-red-400 text-sm">@error('confirmPassword') {{ $message }} @enderror</p>

          <button
            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            wire:click="registerUser"
          >
            Criar conta
          </button>

          <p class="mt-4 text-green-700 text-sm">@if(session()->has('successRegisterUser')) {{ session('successRegisterUser') }} @endif</p>

          <hr class="my-8" />

          <p class="mt-4">
            <button
              class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
              wire:click="redirectToSignIn"
            >
              Já possui uma conta? Acesse sua conta
            </button>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
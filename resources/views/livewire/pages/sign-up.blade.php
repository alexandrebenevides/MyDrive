<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="row g-0">
          <div class="col-md-5">
            <img 
              src="{{ asset('assets/images/signup-background.jpg') }}" 
              alt="Drive" 
              class="img-fluid rounded-start img-fit-cover">
          </div>
          <div class="col-md-7">
            <div class="card-body px-5 py-5">
              <h5 class="card-title mb-4 fw-bold">Crie sua conta</h5>

              <form>
                <div class="mb-3">
                  <label class="form-label">Nome completo</label>
                  <input 
                    type="text" 
                    class="form-control" 
                    placeholder="Seu nome completo"
                    wire:model="name">
                  <p class="text-danger">@error('name') {{ $message }} @enderror</p>
                </div>

                <div class="mb-3">
                  <label class="form-label">E-mail</label>
                  <input 
                    type="email" 
                    class="form-control" 
                    placeholder="exemplo@email.com"
                    wire:model="email">
                  <p class="text-danger">@error('email') {{ $message }} @enderror</p>
                </div>

                <div class="mb-3">
                  <label class="form-label">Senha</label>
                  <input 
                    type="password" 
                    class="form-control" 
                    placeholder="********"
                    wire:model="password">
                  <p class="text-danger">@error('password') {{ $message }} @enderror</p>
                </div>

                <div class="mb-3">
                  <label class="form-label">Confirme sua senha</label>
                  <input 
                    type="password" 
                    class="form-control" 
                    placeholder="********"
                    wire:model="confirmPassword">
                  <p class="text-danger">@error('confirmPassword') {{ $message }} @enderror</p>
                </div>

                <div class="d-grid">
                  <button 
                    type="button" 
                    class="btn btn-primary"
                    wire:click="registerUser">
                      Criar conta
                  </button>
                </div>

                <p class="mt-4 text-success">@if(session()->has('successRegisterUser')) {{ session('successRegisterUser') }} @endif</p>
              </form>

              <hr class="my-4">

              <button 
                type="button" 
                class="btn btn-link text-decoration-none"
                wire:click="redirectToSignIn">
                Já possui uma conta? Acesse sua conta
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
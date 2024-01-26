<!DOCTYPE html>
<html lang="pt-br">
  <head>
    @include('livewire.components.head')
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">
  </head>

  <body>
    <div class="wrapper">
      @include('livewire.components.sidebar')

      <div class="main">
        @include('livewire.components.navbar')
        
        <main class="content px-3 py-2 bg-light">
          {{ $slot }}
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ea516d5852.js" crossorigin="anonymous"></script>
  </body>
</html>
<nav class="navbar navbar-expand px-3 border-bottom">
  <div class="input-group w-25">
    <input type="text" class="form-control" placeholder="Buscar arquivo...">
    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
  </div>
  
  <div class="navbar-collapse navbar">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
          <img src="{{ asset('assets/images/profile.png') }}" class="avatar img-fluid rounded" alt="">
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          <a href="#" class="dropdown-item">Perfil</a>
          <a href="#" class="dropdown-item">Configurações</a>
          <a href="#" class="dropdown-item">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
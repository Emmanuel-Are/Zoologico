<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    
    <!-- Marca -->
    <a class="navbar-brand fw-bold fs-4" href="index.php">
      <i class="bi bi-tree-fill"></i> Zoológico
    </a>

    <!-- Botón responsive -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Contenido -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <!-- Menú -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <!-- Inicio -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">
            <i class="bi bi-house"></i> Inicio
          </a>
        </li>

        <!-- Animal -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" 
             data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bug"></i> Animal
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="registrarAnimal.php">Registro</a></li>
            <li><a class="dropdown-item" href="consultarAnimal.php">Consulta</a></li>
          </ul>
        </li>

        <!-- Atracción -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" 
             data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-stars"></i> Atracción
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="registrarAtraccion.php">Registro</a></li>
            <li><a class="dropdown-item" href="consultarAtraccion.php">Consulta</a></li>
          </ul>
        </li>

        <!-- Cuidador -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" 
             data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-badge"></i> Cuidador
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="registrarCuidador.php">Registro</a></li>
            <li><a class="dropdown-item" href="consultarCuidador.php">Consulta</a></li>
          </ul>
        </li>

      </ul>

    </div>
  </div>
</nav>

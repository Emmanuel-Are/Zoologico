<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal Zoologico</title>
    <?php include('cabecera.php'); ?>
    <style>
  .img-card {
    height: 300px;        
    object-fit: cover;   
  }

   body {
    /* Imagen de fondo */
    background-image: url('img/Fondo.jpg'); 
    background-size: cover; 
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-position: center; 
  }

  .img-card {
    height: 300px;        
    object-fit: cover;   
  }
</style>
</head>
<body>
    <?php include('menu.php'); ?>
<br><br>
<!-- Tarjetas -->
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="img/Animales.webp" class="card-img-top img-card" alt="zariguella">
      <div class="card-body">
        <h5 class="card-title">Zarigüeya</h5>
        <p class="card-text">
            <strong>Nombre </strong> Zarigueya. <br>
            <strong>Habitat: </strong> Bosques tropicales y matorrales hasta zonas áridas y urbanas. <br>
            <strong>Alimentación:</strong> Insectos, carroña y frutas. <br>
            <strong>Peso promedio:</strong> 0.8 - 6.4 Kg. <br>
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/tucan.jpg" class="card-img-top img-card" alt="tucan">
      <div class="card-body">
        <h5 class="card-title">Tucan</h5>
        <p class="card-text">
            <strong>Nombre </strong> Tucan. <br>
            <strong>Habitat: </strong> Principalmente en selvas tropicales y bosques húmedos. <br>
            <strong>Alimentación:</strong> es principalmente frugívora, es decir, se basa en frutas como higos, bayas y frutos tropicales.<br>
            <strong>Peso promedio:</strong> 130-680 gramos. <br>
        </p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="img/elefante.jpg" class="card-img-top img-card" alt="elefante">
      <div class="card-body">
        <h5 class="card-title">Elefante</h5>
        <p class="card-text">
            <strong>Nombre </strong> Elefante. <br>
            <strong>Habitat: </strong> Abarca desde las sabanas y pastizales hasta selvas tropicales densas, bosques (mopane, miombo, secos) y hasta zonas de matorrales y desiertos. <br>
            <strong>Alimentación:</strong> Principalmente vegetación, como hierbas, hojas, cortezas de árboles, raíces, frutas y semillas. <br>
            <strong>Peso promedio:</strong> 2000 - 6000 Kg. <br>
        </p>
      </div>
    </div>
  </div>
</div>
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; 2025 Zoologico - Todos los derechos reservados
</footer>
</body>
</html> 
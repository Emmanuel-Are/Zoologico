<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Atracciones</title>
    <?php include('cabecera.php'); ?>
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="container-fluid mt-4">
        <form action="registrarAtraccion.php" method="post" class="w-50 mx-auto">
            <div class="mb-4">
                <label for="nombre">Nombre de la Atracción</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required />
            </div>
            <div class="mb-4">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required />
            </div>
            <div class="mb-4">
                <label for="ubicacion">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required />
            </div>
            <div class="mb-4">
                <label for="horario">Horario</label>
                <input type="text" class="form-control" id="horario" name="horario" required />
            </div>
            <div class="mb-4">
                <label for="edad_minima">Edad minima</label>
                <input type="number" class="form-control" id="edad_minima" name="edad_minima" min="0" required />
            </div>
            <div class="mb-4">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Educativa">Educativa</option>
                    <option value="Recreativa">Recreativa</option>
                    <option value="Interactiva">Interactiva</option>
                </select>
            </div>
            <div class="mb-4" style="text-align: right; margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

        <?php
        if (
            isset($_POST['nombre']) && isset($_POST['descripcion']) &&
            isset($_POST['ubicacion']) && isset($_POST['horario']) &&
            isset($_POST['edad_minima']) && isset($_POST['tipo'])
        ) {
            require_once('conexion.php');
            $c = new Conexion();

            $r = $c->insertarAtraccion(
                $_POST['nombre'],
                $_POST['descripcion'],
                $_POST['ubicacion'],
                $_POST['horario'],
                $_POST['edad_minima'],
                $_POST['tipo']
            );

            if ($r) {
                echo '<div class="alert alert-success w-50 mx-auto text-center">Inserción correcta</div>';
            } else {
                echo '<div class="alert alert-danger w-50 mx-auto text-center">No se pudo realizar la inserción</div>';
            }
        }
        ?>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cuidadores</title>
    <?php include('cabecera.php'); ?>
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="container-fluid mt-4">
        <form action="registrarCuidador.php" method="post" class="w-50 mx-auto">
            <div class="mb-4">
                <label for="nombre">Nombre del Cuidador</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required />
            </div>
            <div class="mb-4">
                <label for="especialidad">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" required />
            </div>
            <div class="mb-4">
                <label for="turno">Turno</label>
                <select class="form-control" id="turno" name="turno" required>
                    <option value="" disabled selected>Selecciona un turno</option>
                    <option value="Mañana">Mañana</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noche">Noche</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required />
            </div>

            <!-- Botón alineado a la derecha -->
            <div class="mb-4" style="text-align: right;">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

        <?php
        if (
            isset($_POST['nombre']) && isset($_POST['especialidad']) &&
            isset($_POST['turno']) && isset($_POST['telefono'])
        ) {
            require_once('Conexion.php');
            $c = new Conexion();

            $r = $c->insertarCuidador(
                $_POST['nombre'],
                $_POST['especialidad'],
                $_POST['turno'],
                $_POST['telefono']
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
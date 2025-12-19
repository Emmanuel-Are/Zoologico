<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Animales</title>
    <?php include('cabecera.php'); ?>
</head>

<body>
    <?php include('menu.php'); ?>
    <div class="container-fluid mt-4">
        <form action="registrarAnimal.php" method="post" class="w-50 mx-auto">
            <div class="mb-4">
                <label for="nombre">Nombre del Animal</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required />
            </div>
            <div class="mb-4">
                <label for="especie">Especie</label>
                <input type="text" class="form-control" id="especie" name="especie" required />
            </div>
            <div class="mb-4">
                <label for="origen">Origen</label>
                <input type="text" class="form-control" id="origen" name="origen" required />
            </div>
            <div class="mb-4">
                <label for="alimentacion">Alimentación</label>
                <select class="form-control" id="alimentacion" name="alimentacion" required>
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Herbívoro">Herbívoro</option>
                    <option value="Carnívoro">Carnívoro</option>
                    <option value="Omnívoro">Omnívoro</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="peso_aproximado">Peso Aproximado (kg)</label>
                <input type="number" step="0.01" class="form-control" id="peso_aproximado" name="peso_aproximado" required />
            </div>
            <div class="mb-4">
                <label for="peligrosidad">Peligrosidad</label>
                <select class="form-control" id="peligrosidad" name="peligrosidad" required>
                    <option value="" disabled selected>Selecciona una opción</option>
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div class="mb-4" style="text-align: right; margin-top: 10px;">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>

        <?php
        if (
            isset($_POST['nombre']) && isset($_POST['especie']) &&
            isset($_POST['origen']) && isset($_POST['alimentacion']) &&
            isset($_POST['peso_aproximado']) && isset($_POST['peligrosidad'])
        ) {
            require_once('Conexion.php');
            $c = new Conexion();

            // Asegúrate que el método insertarAnimal reciba estos parámetros en ese orden
            $r = $c->insertarAnimal(
                $_POST['nombre'],
                $_POST['especie'],
                $_POST['origen'],
                $_POST['alimentacion'],
                $_POST['peso_aproximado'],
                $_POST['peligrosidad']
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
    <?php include('cabecera.php'); ?>
</head>

<body>
    <?php include('menu.php'); ?>

    <?php
    if (
        isset($_POST['idAnimal']) &&
        isset($_POST['nombre']) &&
        isset($_POST['especie']) &&
        isset($_POST['origen']) &&
        isset($_POST['alimentacion']) &&
        isset($_POST['peso_aproximado']) &&
        isset($_POST['peligrosidad'])
    ) {
        require_once('Conexion.php');
        $c = new Conexion();
        $r = $c->actualizarAnimal(
            $_POST['idAnimal'],
            $_POST['nombre'],
            $_POST['especie'],
            $_POST['origen'],
            $_POST['alimentacion'],
            $_POST['peso_aproximado'],
            $_POST['peligrosidad']
        );
        if ($r) {
            header('Location: consultarAnimal.php?m=1');
        } else {
            header('Location: consultarAnimal.php?m=0');
        }
    }
    ?>

    <div class="container-fluid mt-4">
        <form action="editarAnimal.php" method="post" class="w-50 mx-auto">
            <div class="mb-4">
                <label for="idAnimal">ID del animal</label>
                <input type="text" class="form-control" id="idAnimal" name="idAnimal" value="<?php echo $_GET['idAnimal']; ?>" readonly>
            </div>
            <div class="mb-4">
                <label for="nombre">Nombre del animal</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_GET['nombre']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="especie">Especie</label>
                <input type="text" class="form-control" id="especie" name="especie" value="<?php echo $_GET['especie']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="origen">Origen</label>
                <input type="text" class="form-control" id="origen" name="origen" value="<?php echo $_GET['origen']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="alimentacion">Alimentación</label>
                <select class="form-control" id="alimentacion" name="alimentacion" required>
                    <option value="">Seleccione una opción</option>
                    <option value="Herbívoro" <?php if ($_GET['alimentacion'] == 'Herbívoro') echo 'selected'; ?>>Herbívoro</option>
                    <option value="Carnívoro" <?php if ($_GET['alimentacion'] == 'Carnívoro') echo 'selected'; ?>>Carnívoro</option>
                    <option value="Omnívoro" <?php if ($_GET['alimentacion'] == 'Omnívoro') echo 'selected'; ?>>Omnívoro</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="peso_aproximado">Peso aproximado (kg)</label>
                <input type="number" step="0.01" class="form-control" id="peso_aproximado" name="peso_aproximado" value="<?php echo $_GET['peso_aproximado']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="peligrosidad">Peligrosidad</label>
                <select class="form-control" id="peligrosidad" name="peligrosidad" required>
                    <option value="">Seleccione una opción</option>
                    <option value="Baja" <?php if ($_GET['peligrosidad'] == 'Baja') echo 'selected'; ?>>Baja</option>
                    <option value="Media" <?php if ($_GET['peligrosidad'] == 'Media') echo 'selected'; ?>>Media</option>
                    <option value="Alta" <?php if ($_GET['peligrosidad'] == 'Alta') echo 'selected'; ?>>Alta</option>
                </select>
            </div>
            <div class="mb-4" style="text-align: right; margin-top: 10px;">
                <button class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</body>

</html>
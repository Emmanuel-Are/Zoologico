<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cuidador</title>
    <?php include('cabecera.php'); ?>
</head>

<body>
    <?php include('menu.php'); ?>

    <?php
    if (
        isset($_POST['idCuidador']) &&
        isset($_POST['nombre']) &&
        isset($_POST['especialidad']) &&
        isset($_POST['turno']) &&
        isset($_POST['telefono'])
    ) {
        require_once('Conexion.php');
        $c = new Conexion();
        $r = $c->actualizarCuidador(
            $_POST['idCuidador'],
            $_POST['nombre'],
            $_POST['especialidad'],
            $_POST['turno'],
            $_POST['telefono']
        );
        if ($r) {
            header('Location: consultarCuidador.php?m=1');
        } else {
            header('Location: consultarCuidador.php?m=0');
        }
    }
    ?>

    <div class="container-fluid mt-4">
        <form action="editarCuidador.php" method="post" class="w-50 mx-auto">
            <div class="mb-4">
                <label for="idCuidador">ID del Cuidador</label>
                <input type="text" class="form-control" id="idCuidador" name="idCuidador" value="<?php echo $_GET['idCuidador']; ?>" readonly>
            </div>
            <div class="mb-4">
                <label for="nombre">Nombre del Cuidador</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_GET['nombre']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="especialidad">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" value="<?php echo $_GET['especialidad']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="turno">Turno</label>
                <select class="form-control" id="turno" name="turno" required>
                    <option value="">Seleccione un turno</option>
                    <option value="Mañana" <?php if ($_GET['turno'] == 'Mañana') echo 'selected'; ?>>Mañana</option>
                    <option value="Tarde" <?php if ($_GET['turno'] == 'Tarde') echo 'selected'; ?>>Tarde</option>
                    <option value="Noche" <?php if ($_GET['turno'] == 'Noche') echo 'selected'; ?>>Noche</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $_GET['telefono']; ?>" required>
            </div>
            <div class="mb-4" style="text-align: right; margin-top: 10px;">
                <button class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</body>

</html>
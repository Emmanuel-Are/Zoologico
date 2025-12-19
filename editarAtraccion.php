<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Atraccion</title>
    <?php include('cabecera.php'); ?>
</head>

<body>
    <?php include('menu.php'); ?>

    <?php
    if (
        isset($_POST['idAtraccion']) &&
        isset($_POST['nombre']) &&
        isset($_POST['descripcion']) &&
        isset($_POST['ubicacion']) &&
        isset($_POST['horario']) &&
        isset($_POST['edad_minima']) &&
        isset($_POST['tipo'])
    ) {
        require_once('Conexion.php');
        $c = new Conexion();
        $r = $c->actualizarAtraccion(
            $_POST['idAtraccion'],
            $_POST['nombre'],
            $_POST['descripcion'],
            $_POST['ubicacion'],
            $_POST['horario'],
            $_POST['edad_minima'],
            $_POST['tipo']
        );
        if ($r) {
            header('Location: consultarAtraccion.php?m=1');
        } else {
            header('Location: consultarAtraccion.php?m=0');
        }
    }
    ?>

    <div class="container-fluid mt-4">
        <form action="editarAtraccion.php" method="post" class="w-50 mx-auto">
            <div class="mb-4">
                <label for="idAtraccion">ID de la atraccion</label>
                <input type="text" class="form-control" id="idAtraccion" name="idAtraccion" value="<?php echo $_GET['idAtraccion']; ?>" readonly>
            </div>
            <div class="mb-4">
                <label for="nombre">Nombre de la atraccion</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $_GET['nombre']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="descripcion">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $_GET['descripcion']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="ubicacion">Ubicacion</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo $_GET['ubicacion']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="horario">Horario</label>
                <input type="text" class="form-control" id="horario" name="horario" value="<?php echo $_GET['horario']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="edad_minima">Edad mínima</label>
                <input type="number" class="form-control" id="edad_minima" name="edad_minima" value="<?php echo $_GET['edad_minima']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Seleccione una opción</option>
                    <option value="Educativa" <?php if ($_GET['tipo'] == 'Educativa') echo 'selected'; ?>>Educativa</option>
                    <option value="Recreativa" <?php if ($_GET['tipo'] == 'Recreativa') echo 'selected'; ?>>Recreativa</option>
                    <option value="Interactiva" <?php if ($_GET['tipo'] == 'Interactiva') echo 'selected'; ?>>Interactiva</option>
                </select>
            </div>
            <div class="mb-4" style="text-align: right; margin-top: 10px;">
                <button class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Cuidadores</title>
    <?php include('cabecera.php'); ?>
    <!-- Bootstrap CSS -->
</head>

<body>
    <?php include('menu.php'); ?>

    <script>
        function eliminar(id) {
            bootbox.confirm({
                message: "¿Estás seguro de eliminar al cuidador con ID " + id + "?",
                buttons: {
                    confirm: {
                        label: 'Sí',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function(result) {
                    if (result) {
                        let formulario = document.createElement('form');
                        formulario.action = 'eliminarCuidador.php';
                        formulario.method = 'post';

                        let input = document.createElement('input');
                        input.name = 'idCuidador';
                        input.value = id;

                        formulario.appendChild(input);
                        document.body.appendChild(formulario);
                        formulario.submit();
                    }
                }
            });
        }
    </script>
    <div class="container mt-4">
        <div>
            <form action="consultarCuidador.php" method="post" class="row align-items-center mb-4">
                <div class="col-9 mt-2">
                    <input type="text" placeholder="Filtrar por Nombre, Especialidad, Turno" name="filtro" class="form-control" required>
                </div>
                <div class="col-md-3 mt-2 text-right">
                    <button class="btn btn-primary w-100" type="submit">Filtrar</button>
                </div>
            </form>
        </div>

        <?php
        if (isset($_POST['filtro'])) {
            echo '<div class="alert alert-info">Filtro aplicado: ' . $_POST['filtro'] . '</div>';
        ?>
            <a href="consultarCuidador.php" class="btn btn-info mb-3">Limpiar filtro</a>
        <?php
        }
        ?>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 6%;">ID</th>
                    <th style="width: 25%;">Nombre</th>
                    <th style="width: 20%;">Especialidad</th>
                    <th style="width: 15%;">Turno</th>
                    <th style="width: 20%;">Teléfono</th>
                    <th style="width: 14%;">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('conexion.php');
                $c = new Conexion();

                if (isset($_POST['filtro'])) {
                    $filtro = $_POST['filtro'];

                    $condicion = "
        nombre = '$filtro' OR
        especialidad = '$filtro' OR
        turno = '$filtro'
    ";
                    $res = $c->consultarCuidador($condicion);
                } else {
                    $res = $c->consultarCuidador();
                }

                while ($fila = $res->fetch_array(MYSQLI_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $fila['idCuidador']; ?></td>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['especialidad']; ?></td>
                        <td><?php echo $fila['turno']; ?></td>
                        <td><?php echo $fila['telefono']; ?></td>
                        <td>
                            <a href="editarCuidador.php?
                                <?php echo "idCuidador={$fila['idCuidador']}&nombre={$fila['nombre']}&especialidad={$fila['especialidad']}&turno={$fila['turno']}&telefono={$fila['telefono']}"; ?>"
                                class="btn btn-warning">
                                <span class="fa fa-edit"></span>
                            </a>
                            <button class="btn btn-danger" onclick="eliminar('<?php echo $fila['idCuidador']; ?>')">
                                <span class="fa fa-trash"></span>
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        if (isset($_GET['m'])) {
            switch ($_GET['m']) {
                case 0:
                    echo '<div class="alert alert-danger">No se pudo actualizar el cuidador</div>';
                    break;
                case 1:
                    echo '<div class="alert alert-success">El cuidador se actualizó correctamente</div>';
                    break;
                case 3:
                    echo '<div class="alert alert-danger">No se pudo eliminar el cuidador</div>';
                    break;
                case 2:
                    echo '<div class="alert alert-success">El cuidador se eliminó correctamente</div>';
                    break;
            }
        }
        ?>
    </div>
</body>

</html>
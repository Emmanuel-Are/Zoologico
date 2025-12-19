<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Atracciones</title>
        <?php include('cabecera.php'); ?>
</head>

<body>
    <?php include('menu.php'); ?>

    <script>
        function eliminar(id) {
            bootbox.confirm({
                message: "¿Estás seguro de eliminar la atracción con ID " + id + "?",
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
                        formulario.action = 'eliminarAtraccion.php';
                        formulario.method = 'post';

                        let input = document.createElement('input');
                        input.name = 'idAtraccion';
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
            <!-- Formulario de búsqueda -->
            <form action="consultarAtraccion.php" method="post" class="row align-items-center mb-2">
                <div class="col-9 mt-2">
                    <input type="text" placeholder="Buscar..." name="busqueda" class="form-control" required>
                </div>
                <div class="col-md-3 mt-2 text-right">
                    <button class="btn btn-success w-100" type="submit">Buscar</button>
                </div>
            </form>

            <!-- Formulario de filtrado -->
            <form action="consultarAtraccion.php" method="post" class="row align-items-center mb-4">
                <div class="col-9 mt-2">
                    <input type="text" placeholder="Filtrar por Nombre, Ubicación, Edad Mínima, Tipo" name="filtro" class="form-control" required>
                </div>
                <div class="col-md-3 mt-2 text-right">
                    <button class="btn btn-primary w-100" type="submit">Filtrar</button>
                </div>
            </form>
        </div>

        <?php
        require_once('conexion.php');
        $c = new Conexion();

        if (isset($_POST['busqueda'])) {
            $busqueda = trim($_POST['busqueda']);
            echo '<div class="alert alert-info">Búsqueda aplicada: ' . $busqueda . '</div>';
            echo '<a href="consultarAtraccion.php" class="btn btn-info mb-3">Limpiar búsqueda</a>';
            $condicion = "
        idAtraccion LIKE '%$busqueda%' OR
        nombre LIKE '%$busqueda%' OR
        descripcion LIKE '%$busqueda%' OR
        ubicacion LIKE '%$busqueda%' OR
        horario LIKE '%$busqueda%' OR
        edad_minima LIKE '%$busqueda%' OR
        tipo LIKE '%$busqueda%'
    ";
            $res = $c->consultarAtraccion($condicion);
        } elseif (isset($_POST['filtro'])) {
            $filtro = $_POST['filtro'];
            echo '<div class="alert alert-info">Filtro aplicado: ' . $filtro . '</div>';
            echo '<a href="consultarAtraccion.php" class="btn btn-info mb-3">Limpiar filtro</a>';
            $condicion = "
        nombre = '$filtro' OR
        ubicacion = '$filtro' OR
        edad_minima = '$filtro' OR
        tipo = '$filtro'
    ";
            $res = $c->consultarAtraccion($condicion);
        } else {
            $res = $c->consultarAtraccion();
        }
        ?>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style="width: 6%;">ID</th>
                    <th style="width: 14%;">Nombre</th>
                    <th style="width: 18%;">Descripción</th>
                    <th style="width: 14%;">Ubicación</th>
                    <th style="width: 12%;">Horario</th>
                    <th style="width: 12%;">Edad mínima</th>
                    <th style="width: 12%;">Tipo</th>
                    <th style="width: 12%;">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($fila = $res->fetch_array(MYSQLI_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $fila['idAtraccion'] ?></td>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['descripcion'] ?></td>
                        <td><?php echo $fila['ubicacion'] ?></td>
                        <td><?php echo $fila['horario'] ?></td>
                        <td><?php echo $fila['edad_minima'] ?></td>
                        <td><?php echo $fila['tipo'] ?></td>
                        <td>
                            <a href="editarAtraccion.php?<?php
                                                            echo "idAtraccion=$fila[idAtraccion]&
                                nombre=$fila[nombre]&
                                descripcion=$fila[descripcion]&
                                ubicacion=$fila[ubicacion]&
                                horario=$fila[horario]&
                                edad_minima=$fila[edad_minima]&
                                tipo=$fila[tipo]"
                                                            ?>" class="btn btn-warning">
                                <span class="fa fa-edit"></span>
                            </a>
                            <button class="btn btn-danger" onclick="eliminar('<?php echo $fila['idAtraccion']; ?>')">
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
                    echo '<div class="alert alert-danger">No se pudo actualizar la atracción</div>';
                    break;
                case 1:
                    echo '<div class="alert alert-success">La atracción se actualizó correctamente</div>';
                    break;
                case 3:
                    echo '<div class="alert alert-danger">No se pudo eliminar la atracción</div>';
                    break;
                case 2:
                    echo '<div class="alert alert-success">La atracción se eliminó correctamente</div>';
                    break;
            }
        }
        ?>
    </div>
</body>

</html>
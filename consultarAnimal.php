<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Animales</title>
        <?php include('cabecera.php'); ?>
</head>

<body>
    <!-- <body class="container mt-2"> -->
    <?php include('menu.php'); ?>

    <script>
        function eliminar(id) {
            bootbox.confirm({
                message: "¿Estás seguro de eliminar el animal con ID " + id + "?",
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
                        formulario.action = 'eliminarAnimal.php';
                        formulario.method = 'post';

                        let input = document.createElement('input');
                        input.name = 'idAnimal';
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
            <form action="consultarAnimal.php" method="post" class="row align-items-center mb-4">
                <div class="col-md-9 mt-2">
                    <input type="text" placeholder="Filtrar por Nombre, Especie, Origen, Alimentación, Peligrosidad" name="filtro" class="form-control" required>
                </div>
                <div class="col-md-3 mt-2 text-right">
                    <button class="btn btn-primary w-100" type="submit">Filtrar</button>
                </div>
            </form>
        </div>

        <?php
        if (isset($_POST['filtro'])) {
            echo '<div class="alert alert-info">Filtro nombre: ' . $_POST['filtro'] . '</div>';
        ?>
            <a href="consultarAnimal.php" class="btn btn-info mb-3">Limpiar filtro</a>
        <?php
        }
        ?>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <thead>
                        <tr>
                            <th style="width: 6%;">Id Animal</th>
                            <th style="width: 14%;">Nombre</th>
                            <th style="width: 18%;">Especie</th>
                            <th style="width: 14%;">Origen</th>
                            <th style="width: 12%;">Alimentación</th>
                            <th style="width: 12%;">Peso Aproximado (kg)</th>
                            <th style="width: 12%;">Peligrosidad</th>
                            <th style="width: 12%;">Operaciones</th>
                        </tr>
                    </thead>

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
        especie = '$filtro' OR
        origen = '$filtro' OR
        alimentacion = '$filtro' OR
        peligrosidad = '$filtro'
    ";

                    $res = $c->consultarAnimal($condicion);
                } else {
                    $res = $c->consultarAnimal();
                }

                while ($fila = $res->fetch_array(MYSQLI_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $fila['idAnimal'] ?></td>
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['especie'] ?></td>
                        <td><?php echo $fila['origen'] ?></td>
                        <td><?php echo $fila['alimentacion'] ?></td>
                        <td><?php echo $fila['peso_aproximado'] ?></td>
                        <td><?php echo $fila['peligrosidad'] ?></td>
                        <td>
                            <a href="editarAnimal.php?<?php
                                                        echo "idAnimal=$fila[idAnimal]&
                            nombre=$fila[nombre]&
                            especie=$fila[especie]&
                            origen=$fila[origen]&
                            alimentacion=$fila[alimentacion]&
                            peso_aproximado=$fila[peso_aproximado]&
                            peligrosidad=$fila[peligrosidad]"
                                                        ?>" class="btn btn-warning">
                                <span class="fa fa-edit"></span>
                            </a>
                            <button class="btn btn-danger" onclick="eliminar('<?php echo $fila['idAnimal']; ?>')">
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
                    echo '<div class="alert alert-danger">No se pudo actualizar el animal</div>';
                    break;
                case 1:
                    echo '<div class="alert alert-success">El animal se actualizó correctamente</div>';
                    break;
                case 3:
                    echo '<div class="alert alert-danger">No se pudo eliminar el animal</div>';
                    break;
                case 2:
                    echo '<div class="alert alert-success">El animal se eliminó correctamente</div>';
                    break;
            }
        }
        ?>
    </div>
</body>

</html>
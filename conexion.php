<?php
class Conexion
{
    private $servidor = "127.0.0.1";
    private $base = "zoologico";
    private $usuario = "root";
    private $pass = "root";
    private $enlace = null;

    // Conexión
    public function conectar()
    {
        $this->enlace = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->base);
        if (!$this->enlace) {
            die('No se pudo conectar a la base de datos');
        }
    }

    // ----------------------------- Animal -----------------------------

    // Insertar Animal
    public function insertarAnimal($nombre, $especie, $origen, $alimentacion, $peso_aproximado, $peligrosidad)
    {
        if ($this->enlace == null) $this->conectar();

        $ins = $this->enlace->prepare(
            'INSERT INTO animal (nombre, especie, origen, alimentacion, peso_aproximado, peligrosidad) 
         VALUES (?, ?, ?, ?, ?, ?)'
        );
        $ins->bind_param('ssssds', $nombre, $especie, $origen, $alimentacion, $peso_aproximado, $peligrosidad);
        $res = $ins->execute();

        return $res > 0;
    }

    // Consultar Animal
    public function consultarAnimal($condicion = null)
    {
        if ($this->enlace == null) $this->conectar();

        $condicion = $condicion != null ? " WHERE " . $condicion : "";
        $consulta = mysqli_query($this->enlace, "SELECT * FROM animal $condicion");

        return $consulta;
    }

    // Actualizar Animal
    public function actualizarAnimal($id, $nombre, $especie, $origen, $alimentacion, $peso_aproximado, $peligrosidad)
    {
        if ($this->enlace == null) $this->conectar();

        $ins = $this->enlace->prepare(
            'UPDATE animal 
             SET nombre = ?, especie = ?, origen = ?, alimentacion = ?, peso_aproximado = ?, peligrosidad = ? 
             WHERE idAnimal = ?'
        );

        if ($ins === false) return false;

        $ins->bind_param('ssssssi', $nombre, $especie, $origen, $alimentacion, $peso_aproximado, $peligrosidad, $id);
        $res = $ins->execute();

        return $res;
    }

    // Eliminar Animal
    public function eliminarAnimal($id)
    {
        if ($this->enlace == null) $this->conectar();

        $id = $this->enlace->real_escape_string($id);
        $sql = "DELETE FROM animal WHERE idAnimal = '$id'";

        return $this->enlace->query($sql);
    }



    // ----------------------------- Atracciones -----------------------------

    // Insertar Atraccion
    public function insertarAtraccion($nombre, $descripcion, $ubicacion, $horario, $edad_minima, $tipo)
    {
        if ($this->enlace == null) $this->conectar();

        $ins = $this->enlace->prepare(
            'INSERT INTO atracciones (nombre, descripcion, ubicacion, horario, edad_minima, tipo) 
         VALUES (?, ?, ?, ?, ?, ?)'
        );
        $ins->bind_param('ssssis', $nombre, $descripcion, $ubicacion, $horario, $edad_minima, $tipo);
        $res = $ins->execute();

        return $res > 0;
    }

    // Consultar Atraccion
    public function consultarAtraccion($condicion = null)
    {
        if ($this->enlace == null) $this->conectar();

        $condicion = $condicion != null ? " WHERE " . $condicion : "";
        $consulta = mysqli_query($this->enlace, "SELECT * FROM atracciones $condicion");

        return $consulta;
    }

    // Actualizar Atraccion
    public function actualizarAtraccion($id, $nombre, $descripcion, $ubicacion, $horario, $edad_minima, $tipo)
    {
        if ($this->enlace == null) $this->conectar();

        $ins = $this->enlace->prepare(
            'UPDATE atracciones 
         SET nombre = ?, descripcion = ?, ubicacion = ?, horario = ?, edad_minima = ?, tipo = ? 
         WHERE idAtraccion = ?'
        );

        if ($ins === false) return false;

        $ins->bind_param('ssssssi', $nombre, $descripcion, $ubicacion, $horario, $edad_minima, $tipo, $id);
        $res = $ins->execute();

        return $res;
    }

    // Eliminar Atraccion
    public function eliminarAtraccion($id)
    {
        if ($this->enlace == null) $this->conectar();

        $id = $this->enlace->real_escape_string($id);
        $sql = "DELETE FROM atracciones WHERE idAtraccion = '$id'";

        return $this->enlace->query($sql);
    }

    

    // ----------------------------- Cuidador -----------------------------

    // Insertar Cuidador
    public function insertarCuidador($nombre, $especialidad, $turno, $telefono)
    {
        if ($this->enlace == null) $this->conectar();

        $ins = $this->enlace->prepare(
            'INSERT INTO cuidador (nombre, especialidad, turno, telefono) 
         VALUES (?, ?, ?, ?)'
        );
        $ins->bind_param('ssss', $nombre, $especialidad, $turno, $telefono);
        $res = $ins->execute();

        return $res > 0;
    }


    // Consultar Cuidador
    public function consultarCuidador($condicion = null)
    {
        if ($this->enlace == null) $this->conectar();

        $condicion = $condicion != null ? " WHERE " . $condicion : "";
        $consulta = mysqli_query($this->enlace, "SELECT * FROM cuidador $condicion");

        return $consulta;
    }

    // Actualizar Cuidador
    public function actualizarCuidador($id, $nombre, $especialidad, $turno, $telefono)
    {
        if ($this->enlace == null) $this->conectar();

        $ins = $this->enlace->prepare(
            'UPDATE cuidador 
         SET nombre = ?, especialidad = ?, turno = ?, telefono = ? 
         WHERE idCuidador = ?'
        );

        if ($ins === false) return false;

        $ins->bind_param('ssssi', $nombre, $especialidad, $turno, $telefono, $id);
        $res = $ins->execute();

        return $res;
    }

    // Eliminar Cuidador
    public function eliminarCuidador($id)
    {
        if ($this->enlace == null) $this->conectar();

        $id = $this->enlace->real_escape_string($id);
        $sql = "DELETE FROM cuidador WHERE idCuidador = '$id'";

        return $this->enlace->query($sql);
    }
}

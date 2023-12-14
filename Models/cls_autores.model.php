<?php
require_once('cls_conexion.model.php');
class Clase_autores
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `autores`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($id_autor)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `autores` WHERE id_autor=$id_autor";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
   
    public function insertar($nombre, $nacionalidad, $fecha_nacimiento)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `autores`(`nombre`, `nacionalidad`, `fecha_nacimiento`) VALUES ('$nombre','$nacionalidad','$fecha_nacimiento')";
           
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar( $id_autor, $nombre, $nacionalidad, $fecha_nacimiento)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `autores` SET `nombre`='$nombre',`nacionalidad`='$nacionalidad',`fecha_nacimiento`='$fecha_nacimiento' WHERE `id_autor`='$id_autor'";
            $result = mysqli_query($con, $cadena);
            return "ok";
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function tieneLibrosAsociados($id_autor)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        
        $sql = "SELECT COUNT(*) FROM `libros` WHERE id_autor = $id_autor";
        $result = mysqli_query($con, $sql);
        $num_libros = mysqli_fetch_array($result)[0];

        return $num_libros > 0;
    } catch (Throwable $th) {
        return false; // Maneja el error según tus necesidades
    } finally {
        $con->close();
    }
}

public function eliminar($id_autor)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        
        $sql = "DELETE FROM `autores` WHERE id_autor = $id_autor";
        $result = mysqli_query($con, $sql);

        return 'ok';
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}
    
public function nombre_nacionalidad_repetidos($nombre, $nacionalidad)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT count(*) as repetidos FROM `autores` WHERE nombre = '$nombre' AND nacionalidad = '$nacionalidad'";
        $result = mysqli_query($con, $cadena);
        return $result;
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}

    
    
   
   
}

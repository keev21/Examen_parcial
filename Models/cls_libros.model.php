<?php
require_once('cls_conexion.model.php');
class Clase_libros
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT libros.id_libro, libros.titulo, autores.nombre AS nombre_autor, autores.nacionalidad, libros.genero, libros.fecha_publicacion, libros.id_autor
            FROM libros
            INNER JOIN autores ON libros.id_autor = autores.id_autor;";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($id_libro)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `libros` WHERE id_libro=$id_libro";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($titulo, $id_autor, $genero, $fecha_publicacion)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `libros`( `titulo`, `id_autor`, `genero`, `fecha_publicacion`) VALUES ('$titulo','$id_autor','$genero','$fecha_publicacion')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($id_libro, $titulo, $id_autor, $genero, $fecha_publicacion){
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `libros` SET `titulo`='$titulo',`id_autor`='$id_autor',`genero`='$genero',`fecha_publicacion`='$fecha_publicacion' WHERE id_libro=$id_libro";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    
    }
    public function eliminar($id_libro)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `libros` WHERE id_libro=$id_libro";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function titulo_autor_repetidos($titulo, $id_autor)
{
    try {
        $con = new Clase_Conectar_Base_Datos();
        $con = $con->ProcedimientoConectar();
        $cadena = "SELECT count(*) as repetidos FROM `libros` WHERE titulo = '$titulo' AND id_autor = '$id_autor'";
        $result = mysqli_query($con, $cadena);
        return $result;
    } catch (Throwable $th) {
        return $th->getMessage();
    } finally {
        $con->close();
    }
}
   
   
}

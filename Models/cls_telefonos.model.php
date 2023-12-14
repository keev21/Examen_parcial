<?php
require_once('cls_conexion.model.php');
class Clase_Telefonos
{
    public function todos()
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `telefonos`";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function uno($id_telefono)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "SELECT * FROM `telefonos` WHERE id_telefono=$id_telefono";
            $result = mysqli_query($con, $cadena);
            return $result;
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function insertar($marca, $modelo, $ram, $almacenamiento, $costo)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "INSERT INTO `telefonos`( `marca`, `modelo`, `ram`, `almacenamiento`, `costo`) VALUES ('$marca','$modelo','$ram','$almacenamiento','$costo')";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    public function actualizar($id_telefono, $marca, $modelo, $ram, $almacenamiento, $costo){
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "UPDATE `telefonos` SET `marca`='$marca',`modelo`='$modelo',`ram`='$ram',`almacenamiento`='$almacenamiento',`costo`='$costo' WHERE id_telefono=$id_telefono";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    
    }
    public function eliminar($id_telefono)
    {
        try {
            $con = new Clase_Conectar_Base_Datos();
            $con = $con->ProcedimientoConectar();
            $cadena = "DELETE FROM `telefonos` WHERE id_telefono=$id_telefono";
            $result = mysqli_query($con, $cadena);
            return 'ok';
        } catch (Throwable $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
    
    
   
   
}

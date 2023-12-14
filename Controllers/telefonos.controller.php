<?php
require_once('../Models/cls_telefonos.model.php');
$telefonos = new Clase_Telefonos;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $telefonos->todos(); //llamo al modelo de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $id_telefono = $_POST["id_telefono"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $telefonos->uno($id_telefono); //llamo al modelo de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $marca=$_POST["marca"];
        $modelo=$_POST["modelo"];   
        $ram=$_POST["ram"];
        $almacenamiento=$_POST["almacenamiento"];
        $costo=$_POST["costo"];

        $datos = array(); //defino un arreglo
        $datos = $telefonos->insertar($marca, $modelo, $ram, $almacenamiento, $costo); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_telefono = $_POST["id_telefono"];
        $marca=$_POST["marca"];
        $modelo=$_POST["modelo"];
        $ram=$_POST["ram"];
        $almacenamiento=$_POST["almacenamiento"];
        $costo=$_POST["costo"];
        $datos = array(); //defino un arreglo
        $datos = $telefonos->actualizar($id_telefono, $marca, $modelo, $ram, $almacenamiento, $costo); //llamo al modelo de usuarios e invoco al procedimiento actualizar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;

    case 'eliminar':
        $id_telefono = $_POST["id_telefono"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $telefonos->eliminar($id_telefono); //llamo al modelo de usuarios e invoco al procedimiento eliminar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    
}

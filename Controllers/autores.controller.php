<?php
require_once('../Models/cls_autores.model.php');
$autores = new Clase_autores;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $autores->todos(); //llamo al modelo de autores e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
        
        case "uno":
        $id_autor = $_POST["id_autor"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $autores->uno($id_autor); //llamo al modelo de autores e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $nombre = $_POST["nombre"];
        $nacionalidad=$_POST["nacionalidad"];
        $fecha_nacimiento=$_POST["fecha_nacimiento"];

        $datos = array(); //defino un arreglo
        $datos = $autores->insertar($nombre, $nacionalidad, $fecha_nacimiento); //llamo al modelo de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_autor = $_POST["id_autor"];
        $nombre = $_POST["nombre"];
        $nacionalidad=$_POST["nacionalidad"];
        $fecha_nacimiento=$_POST["fecha_nacimiento"];

        $datos = array(); //defino un arreglo
        $datos = $autores->actualizar($id_autor, $nombre, $nacionalidad, $fecha_nacimiento); //llamo al modelo de usuarios e invoco al procedimiento actualizar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;

        case 'eliminar':
            $id_autor = $_POST["id_autor"];
            $datos = array();
    
            // Verifica si el autor tiene libros asociados
            $tiene_libros = $autores->tieneLibrosAsociados($id_autor);
    
            if ($tiene_libros) {
                $datos['error'] = "No se puede borrar porque el autor tiene un libro registrado";
            } else {
                $datos = $autores->eliminar($id_autor);
            }
    
            echo json_encode($datos);
            break;

            case 'nombre_nacionalidad_repetidos':
                $nombre = $_POST["nombre"];
                $nacionalidad = $_POST["nacionalidad"];
                $datos_repetidos = $autores->nombre_nacionalidad_repetidos($nombre, $nacionalidad);
                $repetidos = mysqli_fetch_assoc($datos_repetidos);
                echo json_encode($repetidos);
                break;

    
}

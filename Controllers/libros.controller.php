<?php
require_once('../Models/cls_libros.model.php');
$libros = new Clase_libros;
switch ($_GET["op"]) {
    case 'todos':
        $datos = array(); //defino un arreglo
        $datos = $libros->todos(); //llamo al id_autor de usuarios e invoco al procedimiento todos y almaceno en una variable
        while ($fila = mysqli_fetch_assoc($datos)) { //recorro el arreglo de datos
            $todos[] = $fila;
        }
        echo json_encode($todos); //devuelvo el arreglo en formato json
        break;
    case "uno":
        $id_libro = $_POST["id_libro"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $libros->uno($id_libro); //llamo al id_autor de usuarios e invoco al procedimiento uno y almaceno en una variable
        $uno = mysqli_fetch_assoc($datos); //recorro el arreglo de datos
        echo json_encode($uno); //devuelvo el arreglo en formato json
        break;
    case 'insertar':
        $titulo=$_POST["titulo"];
        $id_autor=$_POST["id_autor"];   
        $genero=$_POST["genero"];
        $fecha_publicacion=$_POST["fecha_publicacion"];
        

        $datos = array(); //defino un arreglo
        $datos = $libros->insertar($titulo, $id_autor, $genero, $fecha_publicacion); //llamo al id_autor de usuarios e invoco al procedimiento insertar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;
    case 'actualizar':
        $id_libro = $_POST["id_libro"];
        $titulo=$_POST["titulo"];
        $id_autor=$_POST["id_autor"];
        $genero=$_POST["genero"];
        $fecha_publicacion=$_POST["fecha_publicacion"];
        
        $datos = array(); //defino un arreglo
        $datos = $libros->actualizar($id_libro, $titulo, $id_autor, $genero, $fecha_publicacion); //llamo al id_autor de usuarios e invoco al procedimiento actualizar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;

    case 'eliminar':
        $id_libro = $_POST["id_libro"]; //defino una variable para almacenar el id del usuario, la variable se obtiene mediante POST
        $datos = array(); //defino un arreglo
        $datos = $libros->eliminar($id_libro); //llamo al id_autor de usuarios e invoco al procedimiento eliminar
        echo json_encode($datos); //devuelvo el arreglo en formato json
        break;

        case 'titulo_autor_repetidos':
            $titulo = $_POST["titulo"];
            $id_autor = $_POST["id_autor"];
            $datos_titulo_autor = $libros->titulo_autor_repetidos($titulo, $id_autor);
            $repetidos = mysqli_fetch_assoc($datos_titulo_autor);
            echo json_encode($repetidos);
            break;
    
}

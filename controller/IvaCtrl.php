<?php
require_once('../models/Iva.php');

$iva = new Iva();

switch ($_GET["op"]){
//TODO: operaciones de productos
    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $iva->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idIVA = $_POST["idIVA"];
        $datos = array();
        $datos = $iva->uno($idIVA);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $Valor = $_POST["Valor"];
        $datos = array();
        $datos = $iva->insertar($Detalle,$Estado,$Valor);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idIVA = $_POST["idIVA"];
        $Detalle = $_POST["Detalle"];
        $Estado = $_POST["Estado"];
        $Valor = $_POST["Valor"];
        $datos = array();
        $datos = $iva->actualizar($idIVA,$Detalle,$Estado,$Valor);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idIVA = $_POST["idIVA"];
        $datos = array();
        $datos = $iva->eliminar($idIVA);
        echo json_encode($datos);
        break;
}

?>
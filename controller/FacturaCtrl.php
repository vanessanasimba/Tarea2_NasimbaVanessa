<?php
require_once('../models/Factura.php');

$factura = new Factura();

switch ($_GET["op"]){
//TODO: operaciones de productos
    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $factura->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idFactura = $_POST["idFactura"];
        $datos = array();
        $datos = $factura->uno($idFactura);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $Fecha = $_POST["Fecha"];
        $Sub_total = $_POST["Sub_total"];
        $Sub_total_iva = $_POST["Sub_total_iva"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $idCliente = $_POST["idCliente"];
        $datos = array();
        $datos = $factura->insertar($Fecha,$Sub_total,$Sub_total_iva,$Valor_IVA,$idClientes);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idFactura = $_POST["idFactura"];
        $Fecha = $_POST["Fecha"];
        $Sub_total = $_POST["Sub_total"];
        $Sub_total_iva = $_POST["Sub_total_iva"];
        $Valor_IVA = $_POST["Valor_IVA"];
        $idCliente = $_POST["idCliente"];
        $datos = array();
        $datos = $factura->actualizar($idFactura,$Fecha,$Sub_total,$Sub_total_iva,$Valor_IVA,$idCliente);
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idFactura = $_POST["idFactura"];
        $datos = array();
        $datos = $factura->eliminar($idFactura);
        echo json_encode($datos);
        break;
}

?>
<?php
require_once('../models/Kardex.php');

$kardex = new Kardex();

switch ($_GET["op"]){
//TODO: operaciones de proveedores 
    case 'todos': //TODO: Procedimeinto para cargar todos las datos de los proveedores
        $datos = array(); // Defino un arreglo para almacenar los valores que vienen de la clase proveedores.model.php
        $datos = $kardex->todos(); // Llamo al metodo todos de la clase proveedores.model.php
        while ($row = mysqli_fetch_assoc($datos)) //Ciclo de repeticon para asociar los valor almancenados en la variable $datos
        {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
        //TODO: procedimeinto para obtener un registro de la base de datos
    case 'uno':
        $idKardex = $_POST["idKardex"];
        $datos = array();
        $datos = $kardex->uno($idKardex);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;
        //TODO: Procedimeinto para insertar un proveedor en la base de datos
    case 'insertar':
        $Estado = $_POST["Estado"];
        $Fecha_Transaccion = $_POST["Fecha_Transaccion"];   
        $Cantidad = $_POST["Cantidad"];
        $Valor_Compra = $_POST["Valor_Compra"]; 
        $Valor_Venta = $_POST["Valor_Venta"];
        $Unidad_Medida_idUnidad_Medida = $_POST["Unidad_Medida_idUnidad_Medida"];
        $Unidad_Medida_idUnidad_Medida1 = $_POST["Unidad_Medida_idUnidad_Medida1"];
        $Unidad_Medida_idUnidad_Medida2 = $_POST["Unidad_Medida_idUnidad_Medida2"];
        $Valor_Ganacia = $_POST["Valor_Ganacia"];   
        $IVA = $_POST["IVA"];   
        $IVA_idIVA == $_POST["IVA_idIVA"];  
        $Proveedores_idProveedores = $_POST["Proveedores_idProveedores"];   
        $Productos_idProductos = $_POST["Productos_idProductos"];
        $Tipo_Transaccion = $_POST["Tipo_Transaccion"];

        $datos = array();
        $datos = $kardex->insertar($Estado,
                                    $Fecha_Transaccion,
                                    $Cantidad,
                                    $Valor_Compra,
                                    $Valor_Venta,
                                    $Unidad_Medida_idUnidad_Medida,
                                    $Unidad_Medida_idUnidad_Medida1,
                                    $Unidad_Medida_idUnidad_Medida2,
                                    $Valor_Ganacia,
                                    $IVA,
                                    $IVA_idIVA,
                                    $Proveedores_idProveedores,
                                    $Productos_idProductos,
                                    $Tipo_Transaccion );
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para actualziar un proveedor en la base de datos
    case 'actualizar':
        $idKardex = $_POST["idKardex"];
        $Estado = $_POST["Estado"];
        $Fecha_Transaccion = $_POST["Fecha_Transaccion"];   
        $Cantidad = $_POST["Cantidad"];
        $Valor_Compra = $_POST["Valor_Compra"]; 
        $Valor_Venta = $_POST["Valor_Venta"];
        $Unidad_Medida_idUnidad_Medida = $_POST["Unidad_Medida_idUnidad_Medida"];
        $Unidad_Medida_idUnidad_Medida1 = $_POST["Unidad_Medida_idUnidad_Medida1"];
        $Unidad_Medida_idUnidad_Medida2 = $_POST["Unidad_Medida_idUnidad_Medida2"];
        $Valor_Ganacia = $_POST["Valor_Ganacia"];   
        $IVA = $_POST["IVA"];   
        $IVA_idIVA == $_POST["IVA_idIVA"];  
        $Proveedores_idProveedores = $_POST["Proveedores_idProveedores"];   
        $Productos_idProductos = $_POST["Productos_idProductos"];
        $Tipo_Transaccion = $_POST["Tipo_Transaccion"];

        $datos = array();
        $datos = $kardex->actualizar(
            $idKardex,
            $Estado,
            $Fecha_Transaccion,
            $Cantidad,
            $Valor_Compra,
            $Valor_Venta,
            $Unidad_Medida_idUnidad_Medida,
            $Unidad_Medida_idUnidad_Medida1,
            $Unidad_Medida_idUnidad_Medida2,
            $Valor_Ganacia,
            $IVA,
            $IVA_idIVA,
            $Proveedores_idProveedores,
            $Productos_idProductos,
            $Tipo_Transaccion
        );
        echo json_encode($datos);
        break;
        //TODO: Procedimeinto para eliminar un proveedor en la base de datos
    case 'eliminar':
        $idKardex = $_POST["idKardex"];
        $datos = array();
        $datos = $kardex->eliminar($idKardex);
        echo json_encode($datos);
        break;
}

?>
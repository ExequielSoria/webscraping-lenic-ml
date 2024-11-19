<?php
#Incluyo la conexion a la Base de datos
include "./dbMethods.php";

#Indico que la pagina respondera en formato Json
header('Content-Type: application/json');

#Consultamos el metodo que se esta recibiendo
$currentMethod = $_SERVER['REQUEST_METHOD'];

#Evaluo los metodos
switch ( $currentMethod ) {
    case "GET":
        echo json_encode( getProducts() );
    break;

    case "PUT":
        echo "PUT";
    break;

    default:
        echo "Metodo no soportado";
    break;

    
}


function getProducts($code){

    if ($code === null){

        $query = 'SELECT * FROM `products`';
    
        $stmt = connect()->prepare($query);
        
        if($stmt->execute([$code])) {		
            return [ "products" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
        } else { 
            return $result = [ "state" => false, "error" => $stmt->errorInfo()];
        }
        
        $stmt = null;

    }

    $query = 'SELECT * FROM `products`';
    
    $stmt = connect()->prepare($query);
    
    if($stmt->execute([$code])) {		
        return [ "products" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    } else { 
        return $result = [ "state" => false, "error" => $stmt->errorInfo()];
    }
    
    $stmt = null;


}

function getProduct($code){

    #Armo la consulta sql
    $query = 'SELECT * FROM products WHERE code_product = :code ;' ;
    
    #Hago la conexion a la Base de datos
    $stmt = connect()->prepare($query);
    
    #Introduzco los parametros de forma segura
    $stmt->bindValue(':code', $code, PDO::PARAM_STR);

    #Ejecuto y evaluo la peticion sql
    if ( $stmt->execute() ) {
        return [
            "products" => $stmt->fetchAll(PDO::FETCH_ASSOC)
        ];
    } else {
        return [
            "state" => false,
            "error" => $stmt->errorInfo()
        ];
    }


}


?>

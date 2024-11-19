<?php
#Incluyo la conexion a la Base de datos
include "./dbMethods.php";

#Indico que la pagina respondera en formato Json
header('Content-Type: application/json');

#Consultamos el metodo que se esta recibiendo
$currentMethod = $_SERVER['REQUEST_METHOD'];

#Recojo la info que viene de la URL
$info = explode( "/" , $_SERVER['REQUEST_URI'] );
$info = $info[2]; 

#Evaluo los metodos
switch ( $currentMethod ) {
    case "GET":
       
        if ( $info === null ){
            echo json_encode( getProducts() );
        } else {
            echo json_encode( getProduct( $info ) );
        }

    break;

    default:
        echo "Metodo no soportado";
    break;

    
}

function getProducts(){
    
    $query = 'SELECT * FROM `products`';
    
    $stmt = connect()->prepare($query);
    
    if($stmt->execute([$code])) {		
        return [ "products" => $stmt->fetchAll(PDO::FETCH_ASSOC)]['products'];
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
        $response = [
            "products" => $stmt->fetchAll(PDO::FETCH_ASSOC),
        ];

        if( $response['products'] == null ){
            return "No se encontro el producto";
        }
        return $response['products'];
    }
}

?>

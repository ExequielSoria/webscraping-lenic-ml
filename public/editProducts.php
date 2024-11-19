<?php
#Api que consultara la base de datos, Minimo 2 endpoints

#Incluyo la conexion a la Base de datos
include "../dbMethods.php";

#Indico que la pagina respondera en formato Json
header('Content-Type: application/json');

$query = 'SELECT * FROM `products`';

$stmt = connect()->prepare($query);

if($stmt->execute([$code])) {		
    $result = [ "state" => true, "products" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
} else { 
    $result = [ "state" => false, "error" => $stmt->errorInfo()];
}

$stmt = null;



echo json_encode($result['products']);



?>

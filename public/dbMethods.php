<?php
//Aca se crean las conexiones a la base de datos y sus metodos para guardar y traer info

//Traigo las funciones de webScraping
include './webScrapingFunctions.php';

//Creo la funcion de conexion
function connect() {
	$link = new PDO("mysql:host=" . $_ENV["SQL_SERVER"] . "; dbname=".$_ENV["DB_NAME"],$_ENV["SQL_USER"], $_ENV["SQL_PASS"]);
	$link->exec("set names utf8");

	return $link;
}

//Funcion para scrapear el catalogo y actualizar la base de datos
function updateProducts($password) {

    //Scrapeo y guardo en $html
    $html = getCatalog($password);
    $products = getAllProducts($html);

//    var_dump($products);
    
    //Aca voy a guardar los datos de los productos acomodados para meter en la base de datos
    $valores = [];
    foreach ($products as $product) {
        $valores[] = "('" . $product['productName'] . "', '" . $product['productCode'] . "', " . $product['productPrice'] . ")";
    }

//    var_dump($valores[0]);
    
    //Consulta preparada
    $sql = "INSERT INTO products (name_product, code_product, price_product) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE name_product = VALUES(name_product), price_product = VALUES(price_product)";

    $stmt = connect()->prepare($sql);

    //Metemos todo a la base de datos en un bucle
    foreach ($products as $product) {
        $stmt->execute([$product['productName'], $product['productCode'], $product['productPrice']]);
    }

}

//updateProducts('ab24');

//Esta funcion trae la info del producto basandose en su Codigo
function getProductByCode($code){
    $query = '
        SELECT * FROM `products` where code_product = (?)
    ';
    $stmt = connect()->prepare($query);

    if($stmt->execute([$code])) {		
        return $result = [ "state" => true, "products" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    } else { 
        return $result = [ "state" => false, "error" => $stmt->errorInfo()];
    }

    $stmt = null;

}

var_dump( getProductByCode("10190") ); 

?>
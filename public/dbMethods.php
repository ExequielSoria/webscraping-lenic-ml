<?php
#Aca se crean las conexiones a la base de datos y sus metodos para guardar y traer info

#Incluyo las funciones de webScraping
include './scrapingFunctions.php';

#Creo la funcion de conexion
function connect() {
	$link = new PDO("mysql:host=" . $_ENV["MYSQL_HOST"] . "; dbname=".$_ENV["DATABASE_NAME"],$_ENV["MYSQL_USER"], $_ENV["MYSQL_PASS"]);
	$link->exec("set names utf8");

	return $link;
}

#Funcion que scrapea el catalogo y actualiza la Base de datos
function updateProducts() {

    #Scrapeo y guardo el $html
    $html = scrapCatalog();
    $products = getAllProducts($html);
    #var_dump($products);
    
    #Creo el array donde voy a meter los valores de los productos
    $values = [];

    #Recorro los productos y los meto ordenados en $values
    foreach ($products as $product) {
        $values[] = "(" . $product['productName'] . "," . $product['productCode'] . ", " . $product['productPrice'] . ", " . $product['productImage'] . ")";
    }
    #var_dump($values);
    
    #Preparo la consulta para meter los datos mediante el array $values
    $sql = "INSERT INTO products (name_product, code_product, price_product , img_product) VALUES (?, ?, ?, ?) ON DUPLICATE KEY UPDATE name_product = VALUES(name_product), price_product = VALUES(price_product)";

    #Ejecuto la consulta ya preparada
    $stmt = connect()->prepare($sql);

    #Metemos todo a la base de datos en un bucle
    foreach ($products as $product) {
        $stmt->execute([$product['productName'], $product['productCode'], $product['productPrice'], $product['productImage']]);
    }

    if($stmt == true){
        echo "<h3>¡Catalogo actualizado!</h3>";
    } else {
        echo "<h3>El catalogo no pudo actualizarse.</h3>";
    }
}
#updateProducts('ab24');


#Esta funcion trae el producto desde la Base de datos segun su codigo
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
#var_dump( getProductByCode("10190") ); 

?>
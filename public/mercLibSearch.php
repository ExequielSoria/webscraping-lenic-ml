<?php
//include './dbMethods.php';
//Aca buscamos en mercado libre


//Esta funcion retorna el html de la busqueda de mercado libre
function searchForProductML($productCode){
    $product = getProductByCode($productCode);
    //var_dump($product);
    $name = $product["products"][0]['name_product'];
    $code = $product["products"][0]['code_product'];
    $price = $product["products"][0]['price_product'];


    //Aca damos forma a la url de la busqueda
    $urlName1 = $name;
    $urlName1 = str_replace(" ","-",$urlName1);
    $urlName1 = strtolower($urlName1);
    $urlName1 = preg_replace('/-+$/', '', $urlName1);
    $urlName1 = str_replace('/', '%2F', $urlName1);


    $urlName2 = $name;
    $urlName2 = str_replace(" ","%20",$urlName2);


    $searchLink = "https://listado.mercadolibre.com.ar/".$urlName1."#D[A:".$urlName2."]";  

	// Iniciamos curl
	$ch = curl_init($searchLink);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//Ejecutamos la solicitud
	$html = curl_exec($ch);
	//cerramos la conexion
	curl_close($ch);
    //echo $html;
	return $html;

}

//var_dump (searchForProductML("15907"));





?>
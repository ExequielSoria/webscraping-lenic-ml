<?php

#Esta funcion busca el producto en Mercado Libre y retorna el html
function searchProductML($productCode){

    #Traigo el producto y ordeno su info
    $product = getProductByCode($productCode);
    #var_dump($product);

    $name = $product["products"][0]['name_product'];
    $code = $product["products"][0]['code_product'];
    $price = $product["products"][0]['price_product'];

    #Aca formo la url de la busqueda
    $urlName1 = $name;
    $urlName1 = str_replace(" - ","",$urlName1);
    $urlName1 = str_replace("- ","-",$urlName1);

    $urlName1 = str_replace(" ","-",$urlName1);
    $urlName1 = str_replace("+","%C3%BE",$urlName1);
    $urlName1 = str_replace('/', '%2F', $urlName1);
    $urlName1 = preg_replace('/-+$/', '', $urlName1);
    $urlName1 = strtolower($urlName1);

    $urlName2 = $name;
    $urlName2 = str_replace(" ","%20",$urlName2);

    #URL de ejemplo
    #https://listado.mercadolibre.com.ar/remera-de-boca#D[A:Remera%20de%20boca]
    
    #Busqueda final
    $searchLink = "https://listado.mercadolibre.com.ar/".$urlName1."#D[A:".$urlName2."]";  
    #echo $searchLink;

	#Iniciamos la sesion curl
	$ch = curl_init($searchLink);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	#Ejecutamos la sesion
	$html = curl_exec($ch);

	#Cerramos la conexion
	curl_close($ch);
    #echo $html;
    
	return $html;
}

#searchProductML("15907");





?>
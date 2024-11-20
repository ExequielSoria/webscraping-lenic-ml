<?php

#Scrapea el catalogo para recuperar sus productos:
function scrapCatalog(){
	$login_url = 'https://www.redlenic.uno';
	$catalog_url = 'https://www.redlenic.uno/catalogo2024.php?rub=99999#products';

	#El dato del formulario
	#A veces falla y el campo 'password' debe cambiar de productName a 'clave' y luego a 'password' otra vez
	$post_data = [
		'password' => 'ab24'
	];

	#Inicio una sesion de CURL 
	$ch = curl_init();

	#Configuracion para el "inicio de sesion"
	curl_setopt($ch, CURLOPT_URL, $login_url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	#Guardar cookies en un archivo
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	#Reutilizar cookies
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); 

	#Ejecutar el curl y guardamos el resultado en $loginResponse
	$loginResponse = curl_exec($ch);

	#Verfifico el login porlas. Sí falla muere
	if ( !($loginResponse) ) {
		die('Error al superar el login' . curl_error($ch));
	}

	#Bajamos el catalogHtml del catalogo
	curl_setopt($ch, CURLOPT_URL, $catalog_url);
	curl_setopt($ch, CURLOPT_POST, false);

	#Guardamos el resultado
	$catalogHtml = curl_exec($ch);

	#Verifico
	if ($catalogHtml) {
		#var_dump($catalogHtml);
	} else {
		echo 'Error al acceder al catalogo' . curl_error($ch);
	}
	#Cierro la sesion curl
	curl_close($ch);

	return $catalogHtml;
}

#Funcion que trae los productos al pasarle el html del catalogo como parametro
function getAllProducts($catalogHtml){

	$htmlContent = $catalogHtml;

	#Creo el DOM y cargo el HTML
	$dom = new DOMDocument();
	@$dom->loadHTML($htmlContent);
	
	#creo el XPath para navegar el DOM
	$xpath = new DOMXPath($dom);
	
	#Creo un array vacio en donde meter los productos
	$products = [];
	
	#Aca selecciono todos los contenedores de los productos segun el criterio
	$productsNodes = $xpath->query("//div[contains(@class, 'caja_producto')]");
	
	#Recorro el arreglo de productos anidados
	foreach ($productsNodes as $productoNode) {

		#Extraigo el nombre del producto
		$productName = $xpath->query(".//h1", $productoNode)->item(0)->nodeValue ?? '';
		
		#Extraigo el codigo del producto
		$codeNode = $xpath->query(".//p[contains(@class, 'datos1') and strong[contains(text(), 'Cód.')]]", $productoNode);

		#Hago algunas validaciones al codigo del producto
		$productCode = '';
		if ($codeNode->length > 0) {
			$productCode = trim($codeNode->item(0)->nodeValue);
			$productCode = str_replace('Cód.:', '', $productCode);
		}
	
		#Extraigo el precio del producto
		$priceNode = $xpath->query(".//div[contains(@class, 'row') and contains(., '$')]//p[@class='datos']/strong", $productoNode);
		$productPrice = $priceNode->length > 0 ? trim($priceNode->item(0)->nodeValue) : '';

		
		#Extraigo la URL de la imagen del producto
		$imageNode = $xpath->query(".//div[@class='carousel-inner']//img", $productoNode);
		$productImage = $imageNode->length > 0 ? $imageNode->item(0)->getAttribute('src') : '';


		#Guardo los datos de los productos en el array products
		$products[] = [
			'productName' => trim($productName),
			'productCode' => trim($productCode),
			'productPrice' => trim($productPrice),
			'productImage' => $productImage
		];
	}
	return $products;
}

#$productos = getAllProducts($htmlContent);

?>

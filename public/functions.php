<?php

function getCatalog(){
	$login_url = 'https://www.redlenic.uno';
	$catalog_url = 'https://www.redlenic.uno/catalogo2024.php?rub=99999#products';

	//El dato del formulario
	//A veces falla y el campo 'password' debe cambiar de productName a 'clave' y luego a 'password' otra vez
	$post_data = [
		'password' => 'ab24'
	];

	// Inicio una sesion de CURL 
	$ch = curl_init();

	// Configuracion para el "inicio de sesion"
	curl_setopt($ch, CURLOPT_URL, $login_url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Guardar cookies en un archivo
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	// Reutilizar cookies
	curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); 

	// Ejecutar el curl y guardamos el resultado en $response
	$response = curl_exec($ch);

	// Verfifico el login porlas. Sí falla muere
	if ( !($response) ) {
		die('Error al superar el login' . curl_error($ch));
	}

	//Bajamos el html del catalogo
	curl_setopt($ch, CURLOPT_URL, $catalog_url);
	curl_setopt($ch, CURLOPT_POST, false);

	//Guardamos el resultado
	$catalogHtml = curl_exec($ch);

	//Verifico
	if ($catalogHtml) {
//		var_dump($catalogHtml);
	} else {
		echo 'Error al acceder al catalogo' . curl_error($ch);
	}

	// Cierro la sesion curl
	curl_close($ch);

	return $catalogHtml;

}

$htmlContent = getCatalog();


//Creo el DOM y cargo el HTML
$dom = new DOMDocument();
@$dom->loadHTML($htmlContent);

//creo el XPath para navegar el DOM
$xpath = new DOMXPath($dom);

//Aca guardo los productos
$products = [];

// Seleccionar todos los contenedores de producto
$productsNodes = $xpath->query("//div[contains(@class, 'caja_producto')]");

foreach ($productsNodes as $productoNode) {
    // Extraer el nombre del producto
    $productName = $xpath->query(".//h1", $productoNode)->item(0)->nodeValue ?? '';
    
    // Extraer el código del producto
    $codeNode = $xpath->query(".//p[contains(@class, 'datos1') and strong[contains(text(), 'Cód.')]]", $productoNode);
    $productCode = '';
    if ($codeNode->length > 0) {
        $productCode = trim($codeNode->item(0)->nodeValue);
        $productCode = str_replace('Cód.:', '', $productCode);
    }

    // Extraer el productPrice del producto
    $priceNode = $xpath->query(".//div[contains(@class, 'row') and contains(., '$')]//p[@class='datos']/strong", $productoNode);
    $productPrice = $priceNode->length > 0 ? trim($priceNode->item(0)->nodeValue) : '';

    // Guardar los datos del producto en el array
    $products[] = [
        'productName' => trim($productName),
        'productCode' => trim($productCode),
        'productPrice' => trim($productPrice),
    ];
}

// Imprimir los products obtenidos
print_r($products[247]['productName']);
print_r($products[247]['productCode']);
print_r($products[247]['productPrice']);









?>

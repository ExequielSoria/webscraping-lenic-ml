<?php
include './dbMethods.php';
include './mercLibSearch.php';

//Recibir el form y consultar la base de datos
$codeProduct = $_POST['codeProduct'];
$updateProducts = $_POST['updateProducts'];

if ($updateProducts == true){
    updateProducts();
}

$productFromDB = getProductByCode($codeProduct);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Resultados</title>
</head>
<body style="text-align:center;" class="bg-dark text-light">
    
    <h1>Resultados</h1>
    <br>

    <div class="p-4 shadow container col-6 bg-light text-dark rounded border border-3">
        <h4>Producto del catalogo:</h4>
        <h4 style="text-align:left;">Producto: <?php echo $productFromDB["products"][0]['name_product']; ?> </h4>
        <h4 style="text-align:left;">Precio: <mark class="shadow bg-dark rounded text-light"><?php echo $productFromDB["products"][0]['price_product']; ?> </mark> </h4>
    </div>
    <br>
    <br>

    <a href="./index.php" class="btn btn-light">Volver</a>

    <br>
    <br>


<?php

$html = searchForProductML($codeProduct);

// Extraemos el JSON del HTML usando expresiones regulares
preg_match('/<script type="application\/ld\+json">(.*?)<\/script>/', $html, $matches);
$jsonData = json_decode($matches[1], true);

// Verificar y mostrar los productos
if (isset($jsonData['@graph'])) {
    foreach ($jsonData['@graph'] as $product) {

        ?> 
        
        <div style="text-align:center;" class=" p-3 m-3 border border-2 rounded">
            <?php
                echo "<h3>Producto: " . $product['name'] . "</h3>  <br>";
                echo "Marca: " . $product['brand']['name'] . "<br>";
                echo "<img src='" . $product['image'] . "'class='col-2 rounded' alt='Imagen del producto'><br><br>";
            ?> <mark class="rounded"> <?php   echo "Precio: " . $product['offers']['price'] . " " . $product['offers']['priceCurrency'] ."</mark>"."<br>"."<br>";
                echo "<a class='btn bg-light' href='" . $product['offers']['url'] . "'>Ver producto</a><br><br>";
            ?>
       </div> <?php
    }
}

?>

</body>
</html>
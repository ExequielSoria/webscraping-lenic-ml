<?php
include './dbMethods.php';
include './searchML.php';

#Guardo la info del formulario
$codeProduct = $_POST['codeProduct'];
$updateProducts = $_POST['updateProducts'];

#Verifico el checkbox para llamar la funcion
if ($updateProducts == true){
    updateProducts();
}

#Consulto por el producto en la Base de datos
$databaseProduct = getProductByCode($codeProduct);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--- Linkeamos los estilos de bootstrap ---->
    <link rel="icon" href="./faviconResults.png" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Resultados</title>
</head>
<body style="text-align:center;" class="bg-dark text-light">
    <br>
    <h1 style="text-align:center;">Resultados</h1>
    <br>

    <h4>Producto del catalogo:</h4>


    <div style="min-width: 270px;" class="col-md-6  shadow container col-5 bg-light text-dark rounded border border-3">


        <h5 style="text-align:center;"><?php echo $databaseProduct["products"][0]['name_product'];?></h5>

        <br>


        <img class="rounded col-5" src="https://www.redlenic.uno/<?php echo $databaseProduct["products"][0]['img_product'];?>">
        

        <h4 style="text-align:center;"> <br> <mark class="shadow bg-dark rounded text-light">
            <?php echo $databaseProduct["products"][0]['price_product']; ?> </mark> 
        </h4>
        
    </div>
    
    <br>
    <br>

    <a href="./priceComparer.php" class="btn btn-light">Comparar otro producto</a>

    <br>
    <br>


    <?php

        $html = searchProductML($codeProduct);

        // Extraemos el JSON del HTML usando expresiones regulares
        preg_match('/<script type="application\/ld\+json">(.*?)<\/script>/', $html, $matches);
        $jsonData = json_decode($matches[1], true);

        // Verifico y muestro los productos
        if (isset($jsonData['@graph'])) {
            foreach ($jsonData['@graph'] as $product) {

                ?>

                <div style="text-align:center; background-color:#1b1f22; margin-bottom:100px;">

                <?php
                    echo "<br><h4>" . $product['name'] . "</h4>";
                    echo "<img style='min-width: 200px;'' src='" . $product['image'] . "' class='col-2 rounded' alt='Imagen del producto'><br>";
                    echo "Marca: " . $product['brand']['name'] . "<br>";
                ?> 

                <mark class="rounded">
                    <?php
                        echo "$".$product['offers']['price'] . " " . $product['offers']['priceCurrency'] ."</mark>" . "<br>" . "<br>";
                        echo "<a class='btn bg-warning' target='blank'href='" . $product['offers']['url'] . "'>Ver producto</a><br><br>";
                    ?>
                </div>
                
                <?php
            }
        }

                ?>

</body>
</html>
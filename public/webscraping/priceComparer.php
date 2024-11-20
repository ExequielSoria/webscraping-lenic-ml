<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comparador de precios</title>
        <link rel="icon" href="./faviconResults.png" type="image/x-icon">
        <link rel="icon" href="./favicon.png" type="image/x-icon">

        <!--- Linkeamos los estilos de bootstrap ---->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>


        <body class="container bg-dark text-light">

        <!--
            <p style="text-align: center;">Este proyecto de WebScraping consiste en analizar por completo la pagina web en donde se encuentra el catalogo de RED LENIC y por la fuerza extraer los datos de los productos y guardarlos de forma ordenada en una base de datos propia.</p>
        --!-->

            <br>

            <a class ="btn btn-light" href="../index.php">Atras</a>


            <h1 class="m-3" style="text-align: center;">COMPARADOR DE PRECIOS</h1>
            <h4 class="m-3" style="text-align: center;"> <mark class="shadow-lg rounded bg-primary text-light">Red Lenic</mark>  ×  <mark class="shadow-lg rounded bg-warning text-light">Mercado Libre</mark> </h3>
            
            <br>

            <p style="text-align: left;">Podes recoger el codigo de un producto del catalogo de <a href="https://www.redlenic.uno/" target="_blank">Red lenic</a> e introducirlo en el comparador de precios. El cual buscara en <a href="https://www.mercadolibre.com.ar/" target="_blank">Mercado Libre</a> y mostrara los productos que esten relacionados por nombre. La contraseña del catalogo actualmente es 'ab24'.</p>


            <form action="./results.php" method="post" class="row rounded bg-light text-dark shadow-lg">

                <h3 class="m-2">Selecciona un producto</h3>


                <div class="col-3 m-2">
                    <label for="codeProduct" class="form-label">Codigo del producto</label>
                    <input required name="codeProduct" id="codeProduct" type="text" placeholder="15518" class="form-control shadow border border-dark-subtle">
                </div>



                <div class="col-12 m-2">
                    <input name="updateProducts" id="updateProducts" type="checkbox" placeholder="15518">
                    <label for="updateProducts" class="form-label">Actualizar Base de datos</label>
                </div>

                <div class="col-6 m-2">
                    <button type="submit" class="btn btn-dark" >¡Comparar!</button>
                </div>

            </form>

            <br>

            <p style="text-align: left;">Podes consultar estos datos a traves de una pequeña API. Aca podes ver <a href="../api/api.php">como usarla.</a></p>


        </body>


        <a class ="btn btn-light" href="https://github.com/ExequielSoria/webscraping-lenic-ml/tree/main">Ir a Github!</a>  




</html>
        
        
<?php
?>
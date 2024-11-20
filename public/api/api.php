<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>API WEB</title>
        <link rel="icon" href="../favicon-index.png" type="image/x-icon">
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

            <h1 class="m-3" style="text-align: center;">API WEB</h1>
            <h4 class="m-3" style="text-align: center;"> <mark class="shadow-lg rounded bg-primary text-light">Red Lenic</mark></h3>
            
            <br>

            <p style="text-align: left;">Con esta API vas a poder consumir la informacion proveniente de nuestra Base de datos, la cual contiene productos del catalogo de <a href="https://www.redlenic.uno/" target="_blank">Red Lenic.</a></p>

            <br>

            <h4> <strong>Todos los productos</strong></h4>

            <p style="text-align: left;">Solamente tenes que pegarle al siguiente Endpoint mediante el metodo GET</p>

            <a href="../webscraping/apiProducts.php" target="blank"> <p class="fs-2 btn btn-outline-secondary" style="text-align: center;"> <strong>https://ExequielSoria.duckdns.org/webscraping/apiProducts.php</strong></p> </a>


            <br>

            <h4><strong>Producto por Codigo</strong></h4>

            <p style="text-align: left;">Tambien podes pasar un codigo de producto como parametro mediante el metodo GET al final de la URL</p>

            <a href="../webscraping/apiProducts.php/15712" target="blank"> <p class="fs-2 btn btn-outline-secondary" style="text-align: center;"> <strong>https://ExequielSoria.duckdns.org/webscraping/apiProducts.php/15712</strong></p> </a>



            <p style="text-align: left;">Tambien podes ver el <a href="../webscraping/priceComparer.php">Comparador de precios</a> con Mercado Libre.</p>

            <p>Recorda que podes ver el codigo en el repositorio entrando en mi Github!</p>

            <a class ="btn btn-light" href="https://github.com/ExequielSoria/webscraping-lenic-ml/tree/main">Ir a Github!</a>  

            <br>
            <br>


        </body>

</html>
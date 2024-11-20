<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WebScraping</title>
        <link rel="icon" href="./favicon-index.png" type="image/x-icon">

        <!--- Linkeamos los estilos de bootstrap ---->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

        <body class="container bg-dark text-light">

            <h1 class="m-3" style="text-align: center;"> <u> Practica WebScraping PHP </u></h1>

            <br>

            <h3> <strong> Web Scraping </strong></h3>

            <p style="text-align: left;">Es una tecnica que se utiliza para analizar datos de distintas paginas web alojadas en internet para poder extraer la informacion publica que estas muestran. Esta informacion puede estar destinada a muchas cosas, como crear estadisticas, comparativas, controles, alertas, etc</p>

            <br>

            <h3><strong> Red Lenic </strong></h3>

            <p style="text-align: left;">En este proyecto de WebScraping se analiza por completo la pagina web del catalogo de <a href="https://www.redlenic.uno/" target="_blank">RED LENIC</a> y por la fuerza se extrae la informacion de los productos, los cuales son guardados de forma ordenada en una Base de datos propia para ser comparados con los precios en <a href="https://www.mercadolibre.com.ar/" target="_blank">MERCADO LIBRE.</a></p>

            <a class ="btn btn-light" href="./webscraping/priceComparer.php">Comparador de precios</a>  

            <br>
            <br>

            <h3><strong> API </strong></h3>

            <p style="text-align: left;">Una practica muy comun en este tipo de proyectos es crear una pequeña API para facilitar el acceso a los datos para todo aquel que quiera utilizarlos.</p>

            <a class ="btn btn-light" href="./api/api.php">Ver API</a>  

            <br>
            <br>

            <h3><strong> Mercado Libre </strong></h3>

            <p style="text-align: left;">El analisis que se hace sobre Mercado Libre es minimo. Una vez seleccionado el producto en el comparador de precios, se forma un Link de busqueda personalizado para mercado libre basandose en el nombre del producto seleccionado del catalogo, luego se extrae la informacion de productos provenientes de Mercado Libre y se ordena.</p>

            <br>

            <h3><strong> Codigo </strong></h3>

            <p>Si te interesa, tambien podes ver como es que esta escrito todo el programa a traves del repositorio en Github</p>

            <a class ="btn btn-light" href="https://github.com/ExequielSoria/webscraping-lenic-ml/tree/main" target="blank">Ver Repositorio</a>  
           
            <br>
            <br>

        </body>

</html>
        
        
<?php
?>
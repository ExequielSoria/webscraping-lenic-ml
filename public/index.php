<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comparacion de precios</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

        <body class="container bg-dark text-light">

            <h1 class="m-3" style="text-align: center;">COMPARACION DE PRECIOS</h1>
            <h3 class="m-3" style="text-align: center;">RED LENIC × Mercado Libre</h3>

            <p>Proyecto institucional de WebScraping.</p>
            <p>Recoge un producto del catalogo LENIC basandose en el codigo del producto y realiza una busqueda en MercadoLibre.com para extraer informacion basica del producto en dicha web.</p>

            <form action="./formProcess.php" method="post" class="row border border-5 rounded bg-light text-dark shadow-lg">

                <h3 class="m-2">Seleccion de producto</h3>

                <div class="col-3 m-2">
                    <label for="password" class="form-label">Contraseña del Catalogo</label>
                    <input required name="password" id="password" type="password" placeholder="****" class="form-control shadow border-dark-subtle">
                </div>

                <div class="col-3 m-2">
                    <label for="codeProduct" class="form-label">Codigo del producto</label>
                    <input required name="codeProduct" id="codeProduct" type="text" placeholder="15518" class="form-control shadow border border-dark-subtle">
                </div>

                <div class="col-6 m-2">
                    <input name="updateProducts" id="updateProducts" type="checkbox" placeholder="15518">
                    <label for="updateProducts" class="form-label">Actualizar catalogo (NO RECOMENDADO)</label>
                </div>

                <div class="col-6 m-2">
                    <button type="submit" class="btn btn-dark" >¡Comparar!</button>
                </div>

            </form>

        </body>
</html>
        
        
<?php
?>
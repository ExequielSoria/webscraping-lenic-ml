# webscraping-lenic-ml
Pequeño proyecto de comparativa de precios entre pagina web local y Mercado libre. Fines únicamente educativos.

Este proyecto realiza un analisis del catalogo completo publico de RED LENIC y los aloja en una base de datos. Luego te da la posibilidad de seleccionar un producto basado en el codigo del producto y realiza automaticamente una busqueda en Mercado Libre donde analiza la pagina y trae los resultados filtrando los datos.

Para hacerlo funcionar es necesario clonar el docker y levantarlo con las siguientes variables de entorno.

El boton de actualizar catalogo suele fallar, esto debido a una variable la cual se le debe de cambiar el valor periodicamente, bastante curioso, pero cuando le cambio el valor y lo regreso a como estaba antes vuelve a funcionar, no tuve tiempo de corregir ese problema, pero suele pasar muy poco.


.ENV

#Al realizar cambios en el .env el Docker debera reiniciarse
MYSQL_PORT=3309
PHP_PORT=8085
PHPMYADMIN_PORT=8086
DOCKER_NETWORK=nginx_docker_web
SQL_SERVER=mysql 
PMA_HOST=mysql

MYSQL_HOST=mysql
MYSQL_USER=XXXX
MYSQL_PASS=XXXX
MYSQL_ROOT_PASSWORD=XXXX
DATABASE_NAME=web_scraping

TZ=America/Argentina/Buenos_Aires
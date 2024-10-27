<?php
include './dbMethods.php';
include './mercLibSearch.php';

//Recibir el form y consultar la base de datos
$catalogPassword = $_POST['password'];
$codeProduct = $_POST['codeProduct'];
$updateProducts = $_POST['updateProducts'];


searchForProductML($codeProduct);




?>
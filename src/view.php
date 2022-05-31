<?php 
// Iniciamos la sesión
session_start();

// Comprobamo si el usuario está logueado
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

// Incluimos el archivo de conexión a la bd
include_once("config.php");

// Hacemos una consulta a la bd
$result = $mysqli->query("SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");

// Guardamos el resultado de la consulta en un array
$products = array();
while($row = $result->fetch_array()) {
	$products [] = $row;
}

// Incluimos la vista
include_once("views/view.php");
?>
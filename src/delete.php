<?php 
session_start();

if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

// Incluimos la conexión a la bd
include("config.php");

// Obtenemos el id del producto que queremos eliminar y lo saneamos
$id = $mysqli->real_escape_string($_GET['id']);

// Eliminamos el producto de la bd
$result = $mysqli->query("DELETE FROM products WHERE id=$id");

// Redireccionamos a la página view.php
header("Location:view.php");
?>
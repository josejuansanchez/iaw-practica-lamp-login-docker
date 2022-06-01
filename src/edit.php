<?php 
session_start();

if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

include_once("views/header.php");

include_once("config.php");

if(!empty($_POST)) {
	// Saneamos los parámetros que recibimos del formulario
	$id = $mysqli->real_escape_string($_POST['id']);
	$name = $mysqli->real_escape_string($_POST['name']);
	$qty = $mysqli->real_escape_string($_POST['qty']);
	$price = $mysqli->real_escape_string($_POST['price']);
	
	// Comprobamos si los parámetros están vacíos
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		// Actualizamos le producto en la bd
		$result = $mysqli->query("UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");		
		
		// Redireccionamos a la página view.php
		header("Location: view.php");
	}
} 

// Recibimos el id del producto y lo saneamos
$id = $mysqli->real_escape_string($_GET['id']);

// Obtenemos el producto de la bd
$result = $mysqli->query("SELECT * FROM products WHERE id=$id");

$product = array();
while($row = $result->fetch_array())
{
	$product['id'] = $row['id'];
	$product['name'] = $row['name'];
	$product['qty'] = $row['qty'];
	$product['price'] = $row['price'];
}

include_once("views/edit.php");

include_once("views/footer.php");
?>
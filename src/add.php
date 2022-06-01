<?php 
session_start();

if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

include_once("views/header.php");

include_once("config.php");

if(!empty($_POST)) {
	// Saneamos los parámetros que recibimos del formulario
	$name = $mysqli->real_escape_string($_POST['name']);
	$qty = $mysqli->real_escape_string($_POST['qty']);
	$price = $mysqli->real_escape_string($_POST['price']);
	
	$loginId = $_SESSION['id'];
		
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
		
		// Mostramos un enlace a la página anterior
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// Si los parámetros del formulario no están vacíos
		// Los insertamos en la bd
		$result = $mysqli->query("INSERT INTO products(name, qty, price, login_id) VALUES('$name','$qty','$price', '$loginId')");
		
		// Mostramos un mensaje de éxito
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
} else {
	include_once("views/add.php");	
}

include_once("views/footer.php");
?>
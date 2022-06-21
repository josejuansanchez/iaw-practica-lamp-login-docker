<?php 
// Iniciamos la sesión
session_start();

// Comprobamos si el usuario está logueado
if(!isset($_SESSION['logged'])) {
	header('Location: login.php');
}

// Incluimos el archivo de conexión con la base de datos
include_once("config/config.php");

// Incluimos la cabecera
include_once("views/header.php");

if(!empty($_POST)) {
	// Saneamos los datos que se reciben del formulario
	$id = $mysqli->real_escape_string($_POST['id']);
	$name = $mysqli->real_escape_string($_POST['name']);
	$qty = $mysqli->real_escape_string($_POST['qty']);
	$price = $mysqli->real_escape_string($_POST['price']);
	$description = $mysqli->real_escape_string($_POST['description']);
	$image_name = $mysqli->real_escape_string($_POST['image_name']);

	// Recibimos el archivo del formulario con name = image
	if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
    	// Path donde vamos a guardar el archivo
    	$path_upload = "/var/www/html/assets/upload/";

		// Obtenemos la extensión del archivo
		$extension = explode(".", $_FILES['image']['name']);
		
		// Le asignamos un nombre a la imagen generando un id aleatorio
		//$image_name = basename($_FILES['image']['name']);
		$image_name = uniqid() . "." . $extension[1];

    	// Creamos el path completo donde vamos a guardar el archivo
    	$image_path = $path_upload . $image_name;

    	// Movemos el archivo del directorio temporal al directorio definitivo
    	move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
	}

	// Obtenemos el id del usuario de la sesión
	$id_login = $_SESSION['id_login'];

	// Comprobamos si los parámetros contienen datos
	if(empty($name) || empty($qty) || empty($price)) {	
		if(empty($name)) {
			$status = "error";
			$message = "Name field is empty.<br/>";
		}
		
		if(empty($qty)) {
			$status = "error";
			$message .= "Quantity field is empty.<br/>";
		}
		
		if(empty($price)) {
			$status = "error";
			$message .= "Price field is empty.<br/>";
		}		
	} else {	
		// Actualizamos el producto en la bd
		$result = $mysqli->query("UPDATE products SET name='$name', description='$description', qty='$qty', price='$price', image_name='$image_name' WHERE id=$id");
		
		// Redireccionamos a la página view.php
		header("Location: view.php");
	}
}

// Obtenemos el id del producto que vamos a editar
$id = $_GET['id'];

// Saneamos los datos que se reciben del formulario
$id = $mysqli->real_escape_string($_GET['id']);

// Obtenemos información del producto 
$result = $mysqli->query("SELECT * FROM products WHERE id=$id");

$producto = array();
while($row = $result->fetch_array())
{
	$producto['id'] = $row['id'];
	$producto['name'] = $row['name'];
	$producto['description'] = $row['description'];	
	$producto['qty'] = $row['qty'];
	$producto['price'] = $row['price'];
	$producto['image_name'] = $row['image_name'];
}

// Cerramos la conexión con la bd
$mysqli->close();

$status = "success";
$message = "Data edited successfully.";

// Incluimos la vista para editar productos
include_once("views/edit.php");

// Incluimos el pie de página
include_once("views/footer.php");
?>
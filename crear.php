<?php
session_start();
if(isset($_POST['submit'])){
	require 'config.php';
	$insertOneResult =$collection->insertOne([
		'CP' => $_POST['CP'],
		'FC' => $_POST['FC'],
		'Cantidad' => $_POST['Cantidad'],
		'Nombre' => $_POST['Nombre'],
		'Descripcion' => $_POST['Descripcion'],
		'PrecioC' => $_POST['PrecioC'],
		'PrecioV' => $_POST['PrecioV'],
	]);
	//$_SESSION['success'] = "Empleado Agregado Correctamente";
	header("Location: index.php");
}
if(isset($_POST['cancelar'])){
	$_SESSION = array();
	header ("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		
		<title>MongoDB & PHP </title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.4.1/lux/bootstrap.css">

		  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>

    	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

	</head>

	<body>
		<div class="container text-center">
			<br>
			<h1> -- AGREGAR PRODUCTOS --- </h1>
			<br>
		</div>

		<div class="container" style="max-width:600px">
			<form method="POST">
				<div class="form-row">
					<div class="col">
						<strong>Código Producto: </strong>
						<input type="text" name="CP" required="" class="form-control" placeholder="Código Producto">

						<strong>Fecha de compra: </strong>
						<input type="datetime-local" name="FC" required="" class="form-control" placeholder="Fecha Compra">

						<strong>Cantidad: </strong>
						<input type="number" name="Cantidad" required="" class="form-control" placeholder="Cantidad">

						<strong>Nombre: </strong>
						<input type="text" name="Nombre" required="" class="form-control" placeholder="Nombre">

						<strong>Descripción: </strong>
						<input type="text" name="Descripcion" required="" class="form-control" placeholder="Descripcion">
					
						<strong>Precio Compra: </strong>
						<input type="text" name="PrecioC" required="" class="form-control" placeholder="Precio Compra">

						<strong>Precio Venta: </strong>
						<input type="text" name="PrecioV" required="" class="form-control" placeholder="Precio Venta">

					</div>	

					<div class="form-group text-center" align="left"><br>
						<button type="submit" name="submit" class="btn btn-success">Guardar</button>
					</div> 							
			</form>

			<form method="POST"><br>
					<button type="submit" name= "cancelar" class = "btn btn-danger">Cancelar </button>
			</form>	
		</div>
		<br>
	</body>
</html>


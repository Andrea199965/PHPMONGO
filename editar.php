<?php
session_start();
require 'config.php';
if(isset($_GET['id'])){
	$producto = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
}
if(isset($_POST['submit'])){
	$collection->updateOne(
		['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
		['$set' => ['CP'=> $_POST['CP'],'Cantidad'=>$_POST['Cantidad'],'Nombre'=>$_POST['Nombre'],'Descripcion'=>$_POST['Descripcion'],'PrecioC'=>$_POST['PrecioC'],'PrecioV'=>$_POST['PrecioV'],]]
	);

	//$_SESSION['success'] ="Empleado Actualizado";
	header("Location: index.php");
}

if(isset($_POST['cancelar'])){
	$_SESSION = array();
	header("Location: index.php");
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
			<h1> Inventario</h1>
			<br>
			<h1> Editar Producto </h1>
			<br>			
		</div>

		<div>
			<div class="container" style="max-width:600px">
				<form method="POST">
					<div class="form-row">
						<div class="col">
							<strong>Código Producto: </strong>
							<input type="text" name="CP" required="" class="form-control" value="<?php echo $producto->CP; ?>">

							<strong>Fecha de Compra: </strong>
							<input type="datetime-local" name="FC" required="" class="form-control" value="<?php echo $producto->FC; ?>">


							<strong>Cantidad: </strong>
							<input type="number" name="Cantidad" required="" class="form-control" value="<?php echo $producto->Cantidad; ?>">

							<strong>Nombre: </strong>
							<input type="text" name="Nombre" required="" class="form-control" value="<?php echo $producto->Nombre; ?>">

							<strong>Descripcion: </strong>
							<input type="text" name="Descripcion" required="" class="form-control" value="<?php echo $producto->Descripcion; ?>">
						
							<strong>Precio Compra: </strong>
							<input type="text" name="PrecioC" required="" class="form-control" value="<?php echo $producto->PrecioC; ?>">

							<strong>Precio Venta: </strong>
							<input type="text" name="PrecioV" required="" class="form-control" value="<?php echo $producto->PrecioV; ?>">

						</div>
					</div>
					<br>
					<div class="form-group text-center">
						<button type="submit" name="submit" class="btn btn-success">Guardar</button>
						<button type="submit" name="cancelar" class="btn btn-success">Cancelar</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>


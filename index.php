<?php
session_start();
$CP= null;
$Nombre=null;
?>

<!DOCTYPE html>
<html>
	<head>

		<title> MongoDB & PHP </title>
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
		<img src="1.png" align="left" >	
		<br><br>
		<div class ="container text-center">
			<h1>Inventario</h1>		
			<br>
			<table class ="table table-hover" border="2">
				<tr>
					<th bgcolor="#16A085">Código Producto</th>

					<th bgcolor="D1F2EB">Fecha de Compra</th>

					<th bgcolor="D1F2EB">Cantidad</th>

					<th bgcolor="D1F2EB">Nombre</th>

					<th bgcolor="D1F2EB">Descripción</th>

					<th bgcolor="D1F2EB">Precio Compra</th>

					<th bgcolor="D1F2EB">Precio Venta</th>

					<th bgcolor="D1F2EB">Accion</th>
				</tr>
				<?php
				require 'config.php';
				$Productos = $collection->find([]);
				foreach($Productos as $producto) {
					echo "<tr>";
					echo "<td>".$producto->CP."</td>";
					echo "<td>".$producto->FC."</td>";
					echo "<td>".$producto->Cantidad."</td>";
					echo "<td>".$producto->Nombre."</td>";
					echo "<td>".$producto->Descripcion."</td>";
					echo "<td>".$producto->PrecioC."</td>";					
					echo "<td>".$producto->PrecioV."</td>";
					echo "<td>";
					echo "<a href='editar.php?id=".$producto->_id."' class ='btn btn-success'>Editar </a><br>";
					echo "<br>";
					echo "<a href='eliminar.php?id=".$producto->_id."' class ='btn btn-danger'>Eliminar </a>";
					echo "</td>";
					echo "</tr>";
				};
				?>
			</table>
			<a href="crear.php" class ="btn btn-primary .text-center"> Agregar Producto</a>
		</div>
	</body>
</html>
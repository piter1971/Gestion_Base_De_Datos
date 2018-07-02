<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="Stilo.css" />
</head>

<body>
	<h1 class = 'CabBuscar'>Insertar un registro</h1>
	<form action="cont_func.php" method="post">

		<table>
			<tr>
				<td><label>codigo</label></td>
				<td><input type="text" name="codigo"></td>
			</tr>
			<tr>
				<td><label>Seccion</label></td>
				<td><select name="Seccion">
						<option value="Deportes">Deportes</option>
						<option value="Ceramica">Ceramica</option>
						<option value="Jugueteria">Jugueteria</option>
						<option value="Ferreteria">Ferreteria</option>
						<option value="Confeccion">Confeccion</option>
				</select></td>
			</tr>
			<tr>
				<td><label>Nombre del Articulo</label></td>
				<td><input type="text" name="nombreArticulo"></td>
			</tr>
			<tr>
				<td><label>precio</label></td>
				<td><input type="text" name="precio"></td>
			</tr>
			<tr>
				<td><label>fecha</label></td>
				<td><input type="text" name="fecha"></td>
			</tr>
			<tr>
				<td><label>importado</label></td>
				<td><select name="importado">
						<option value="Si">Si</option>
						<option value="No">No</option>						
				</select></td>
			</tr>
			<tr>
				<td><label>pais</label></td>
				<td><input type="text" name="pais"></td>
			</tr>

			<tr>
				<td><input type="submit" value="Insertar" name="insertar" ></td>
				<td><input type="button" value="ver lista" onClick="location.href = 'PagPrincipal.php' "></td>
			</tr>

		</table>

		
	</form>
	
	
	
</body>


</html>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="Stilo.css" />
</head>

    <body>
    
    
    <form action="cont_func.php" method="post">
			<?php 
    $id = $_GET['id_actualizar'];
    $nom = $_GET['nomArt'];
    $sec = $_GET['Seccion'];
    $precio = $_GET['precio'];
    $fecha = $_GET['fecha'];
    $importado = $_GET['importado'];
    $pais = $_GET['pais'];
    echo "<h3>Codigo a actualizar es: $id  </h3>";
    ?>
    <input type="hidden" name="id" value='<?php echo "$id";?>' >
		<table>			
			<tr>
				<td><label>Seccion</label></td>
				<td><select name="Seccion" >
						<option value="<?php echo "$sec";?>"><?php echo "$sec";?></option>
						<option value="Deportes">Deportes</option>
						<option value="Ceramica">Ceramica</option>
						<option value="Jugueteria">Jugueteria</option>
						<option value="Ferreteria">Ferreteria</option>
						<option value="Confeccion">Confeccion</option>
				</select></td>
			</tr>
			<tr>
				<td><label>Nombre del Articulo</label></td>
				<td><input type="text" name="nombreArticulo" value='<?php echo "$nom";?>' ></td>
			</tr>
			<tr>
				<td><label>precio</label></td>
				<td><input type="text" name="precio" value='<?php echo "$precio";?>' ></td>
			</tr>
			<tr>
				<td><label>fecha</label></td>
				<td><input type="text" name="fecha" value='<?php echo "$fecha";?>' ></td>
			</tr>
			<tr>
				<td><label>importado</label></td>
				<td><select name="importado">
						<option value="<?php echo "$importado";?>"><?php echo "$importado";?></option>
						<option value="Si">Si</option>
						<option value="No">No</option>						
				</select></td>
			</tr>
			<tr>
				<td><label>pais</label></td>
				<td><input type="text" name="pais" value='<?php echo "$pais";?>' ></td>
			</tr>

			<tr>
				<td><input type="submit" value="actualizar" name="actualizar" ></td>
				<td><input type="button" value="ver lista" onClick="location.href = 'PagPrincipal.php' "></td>
			</tr>

		</table>

		
	</form>
    </body>
    
</html>
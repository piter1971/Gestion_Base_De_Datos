<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>

<link rel="stylesheet" type="text/css" href="Stilo.css" />
<?php 
    	include 'cont_func.php';
    	crear_BD();
    	
    	    crearTabla();
    	
    	?>

</head>

    <body>
    
    
    
    <br>
    <form action="cont_func.php" method="post">
    <div class="stilo">
    	
    	</div>
    	<div class="divcabecera">
    	<div class="stiloBuscar">
    	<label Buscar: ><input type="text" name="buscar"></label>
    	<br>
    	<br>
    	<input type="submit" name="Buscar" value="Buscar por nombre">
    	</div>
    	</div>
    	<br>
    	<br>
    	<div class="divlat">
    	<div class="stiloInsertar">
    	<input type="button" value="Insertar" onClick="location.href = 'Insertar.php' ">
    	<br>
    	<br>
     	</div>
     	</div>
    </form>
    
    <?php
    
  
    
  
   if (empty($_POST['buscar'])) {
       
      MostrarTabla();
   }
    
    
    else if (isset($_POST['Buscar'])) {
        $busqueda = $_POST['buscar'];
        
        buscarEnNombreArt($busqueda);
        
    }
    
	?>
	
	
    </body>
    
</html>
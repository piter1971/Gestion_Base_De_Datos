<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>

<link rel="stylesheet" type="text/css" href="Stilo.css" />

</head>

<body>

<?php
// Variables
$cod = "";
$resultado;
$TablaExiste=false;
$tablaExiste = FALSE;
// Datos conexion
$db_host = "localhost";
$db_nombre = "pruebas";
$db_usuario = "root";
$db_contra = "";
$tabla = "productos";

if (isset($_GET['id_eliminar'])) {
    
    eliminar($_GET['id_eliminar']);
}

if (isset($_POST['Buscar'])) {
    buscarEnNombreArt($_POST['buscar']);
}

function MostrarTabla()
{
    global $db_host, $db_usuario, $db_contra, $db_nombre;
    global $cod;
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    mysqli_set_charset($conexion, "utf8");
    
    if (mysqli_connect_errno()) {
        echo "Error en la conexion";
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die(mysqli_error($conexion). "tabla no existe");
    
    $consulta = "SELECT * FROM productos";
    
    $ejecucionConsulta = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    echo "<table><tr><th>Actualizar</th><th>Eliminar</th><th>codigo</th><th>Seccion</th><th>Nombre</th><th>Precio</th><th>Fecha</th><th>Importado</th><th>Pais</th></tr>";
    while ($fila = mysqli_fetch_row($ejecucionConsulta)) {
        
        echo "<tr><td><a name = 'eliminar' href='cont_func.php?id_eliminar=" . $fila[0] . "'>eliminar</a>,</td>";
        echo "<td><a href='Actualizar.php?id_actualizar=" . $fila[0] . "&Seccion=" . $fila[1] . "&nomArt=" . $fila[2] . "&precio=" . $fila[3] . "&fecha=" . $fila[4] . "&importado=" . $fila[5] . "&pais=" . $fila[6] . "'>actualizar</a>,</td>";
        echo "<td>$fila[0]</td>";
        echo "<td>$fila[1]</td>";
        echo "<td>$fila[2]</td>";
        echo "<td>$fila[3]</td>";
        echo "<td>$fila[4]</td>";
        echo "<td>$fila[5]</td>";
        echo "<td>$fila[6]</td></tr>";
    }
    echo "</table>";
    mysqli_close($conexion);
}

function buscarEnNombreArt($busqueda)
{
    global $db_host, $db_usuario, $db_contra, $db_nombre;
    
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    mysqli_set_charset($conexion, "utf8");
    if (mysqli_connect_errno()) {
        echo 'Error en la conexion a la base de datos';
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die('No se encuentra la tabla');
    
    $consulta = "SELECT * FROM productos WHERE NombreArt LIKE '%$busqueda%'";
    
    $ejecutarConsulta = mysqli_query($conexion, $consulta);
    
    echo "<h2 class = 'CabBuscar'>resultado de la busqueda $busqueda</h2>";
    
    echo "<table><tr><th>Actualizar</th><th>Eliminar</th><th>codigo</th><th>Seccion</th><th>Nombre</th><th>Precio</th><th>Fecha</th><th>Importado</th><th>Pais</th></tr>";
    
    while ($fila = mysqli_fetch_row($ejecutarConsulta)) {
        echo "<tr><td><a name = 'eliminar' href='cont_func.php?id_eliminar=" . $fila[0] . "'>eliminar</a>,</td>";
        echo "<td><a href='Actualizar.php?id_actualizar=" . $fila[0] . "&Seccion=" . $fila[1] . "&nomArt=" . $fila[2] . "&precio=" . $fila[3] . "&fecha=" . $fila[4] . "&importado=" . $fila[5] . "&pais=" . $fila[6] . "'>actualizar</a>,</td>";
        echo "<td>$fila[0]</td>";
        echo "<td>$fila[1]</td>";
        echo "<td>$fila[2]</td>";
        echo "<td>$fila[3]</td>";
        echo "<td>$fila[4]</td>";
        echo "<td>$fila[5]</td>";
        echo "<td>$fila[6]</td></tr>";
    }
    echo "</table>";
    echo "<br>";
    echo "<br>";
    
    mysqli_close($conexion);
    
    echo ("<button onclick= \"location.href='PagPrincipal.php'\">ir a pagina principal</button>");
}

function actualizar()
{
    $cod = $_POST['id'];
    $seccion = $_POST['Seccion'];
    $nomArt = $_POST['nombreArticulo'];
    $precio = $_POST['precio'];
    
    $fecha = $_POST['fecha'];
    $importado = $_POST['importado'];
    $pais = $_POST['pais'];
    
    global $db_host, $db_usuario, $db_contra, $db_nombre;
    global $resultado;
    
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    
    mysqli_set_charset($conexion, "utf8");
    if (mysqli_connect_errno()) {
        echo 'Error en la conexion a la base de datos';
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die('No se encuentra la tabla');
    
    $consulta1 = "UPDATE productos SET Seccion ='" . $seccion . "', NombreArt= '" . $nomArt . "',Precio='" . $precio . "' , Fecha='" . $fecha . "', Importado='" . $importado . "' , PaisOrigen = '" . $pais . "'  WHERE Codigo = '" . $cod . "' ";
    
    $resultado = mysqli_query($conexion, $consulta1);
    
    // header("Location: http://localhost/ConexionBD_Modo_Procedimiento/Busqueda_Resultado_Misma_Pagina/Insertar.php");
    if ($resultado) {
        echo "Actualizado con exito";
    } else {
        echo "No Actualizado";
    }
    mysqli_close($conexion);
    header("Refresh:3; url=PagPrincipal.php");
}
if (isset($_POST['actualizar'])) {
    actualizar();
}

function insertar()
{
    global $db_host, $db_usuario, $db_contra, $db_nombre;
    global $resultado;
    $cod = $_POST['codigo'];
    $seccion = $_POST['Seccion'];
    $nomArt = $_POST['nombreArticulo'];
    $precio = $_POST['precio'];
    $precioFloat = floatval($precio);
    $fecha = $_POST['fecha'];
    $importado = $_POST['importado'];
    $pais = $_POST['pais'];
    
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    
    mysqli_set_charset($conexion, "utf8");
    if (mysqli_connect_errno()) {
        echo 'Error en la conexion a la base de datos';
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die('No se encuentra la tabla');
    
    $consulta1 = "INSERT INTO productos (Codigo ,Seccion , NombreArt ,Precio , Fecha , Importado , PaisOrigen) VALUES ('$cod' ,'$seccion' , '$nomArt', '$precio', '$fecha' , '$importado' , '$pais')";
    
    $resultado = mysqli_query($conexion, $consulta1);
    
    // header("Location: http://localhost/ConexionBD_Modo_Procedimiento/Busqueda_Resultado_Misma_Pagina/Insertar.php");
    echo "<h2 class = 'CabBuscar'>resultado </h2>";
    
    if ($consulta1) {
        echo "<h3 >Insertado con exito</h3>";
    } else {
        echo "<h3 >No se ha insertado</h3>";
    }
    mysqli_close($conexion);
    header("Refresh:3; url=Insertar.php");
}

if (isset($_POST['insertar'])) {
    insertar();
}

function eliminar($cod)
{
    global $db_host, $db_usuario, $db_contra, $db_nombre;
    global $resultado;
    
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    
    mysqli_set_charset($conexion, "utf8");
    if (mysqli_connect_errno()) {
        echo 'Error en la conexion a la base de datos';
        exit();
    }
    
    mysqli_select_db($conexion, $db_nombre) or die('No se encuentra la tabla');
    
    $consulta1 = "DELETE  FROM productos WHERE Codigo = '$cod' ";
    
    $resultado = mysqli_query($conexion, $consulta1);
    echo "<h2 class = 'CabBuscar'>resultado de la eliminacion del codigo:  $cod</h2>";
    
    if ($consulta1) {
        echo "<h3 >eliminado con exito</h3>";
    } else {
        echo "<h3 >No se ha eliminado</h3>";
    }
    mysqli_close($conexion);
    header("Refresh:3; url=PagPrincipal.php");
}

function crear_BD()
{
    global $db_host, $db_usuario, $db_contra, $db_nombre;
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    
    mysqli_set_charset($conexion, "utf8");
    if (mysqli_connect_errno()) {
        echo 'Error en la conexion a la base de datos';
        exit();
    }
    
    $db_selected = mysqli_select_db($conexion, $db_nombre);
    
    if (! $db_selected) {
        // If we couldn't, then it either doesn't exist, or we can't see it.
        $sql = "CREATE DATABASE $db_nombre";
        
        mysqli_query($conexion, $sql);
           
    }
    
    mysqli_close($conexion);
}



function crearTabla()
{
    global $db_host, $db_usuario, $db_contra, $db_nombre,$tabla,$tablaExiste;
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra);
    mysqli_set_charset($conexion, "utf8");
    
    if (mysqli_connect_errno()) {
        echo "Error en la conexion";
        exit();
    }
    $sql = "SHOW TABLES FROM $db_nombre";
    $result = mysqli_query($conexion,$sql);
    
    
    
    while ($row = mysqli_fetch_row($result)) {
        
        
        if($row[0]==$tabla){
            $tablaExiste =TRUE;
            
        }
    }
    $result = mysqli_query($conexion,$sql);
    if(!$tablaExiste){
        mysqli_select_db($conexion, $db_nombre) or die('No se encuentra la tabla');
        $sql = "CREATE TABLE $tabla (
Codigo VARCHAR(4)  PRIMARY KEY,
Seccion VARCHAR(30) DEFAULT NULL,
NombreArt VARCHAR(30) DEFAULT NULL,
Precio  DOUBLE DEFAULT NULL,
Importado VARCHAR(30) DEFAULT NULL,
PaisOrigen VARCHAR(30) DEFAULT NULL,
Fecha date DEFAULT NULL
)";
        
        mysqli_query($conexion, $sql) ;
        
        
    }
    
    mysqli_close($conexion);
    
}
?>


</body>
</html>
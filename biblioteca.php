<!DOCTYPE html>
<html lang="en">
<head>
  <title>Biblioteca</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="estilos/index.css">
        <link rel="stylesheet" href="estilos/estiloAnalisis.css">
       
</head>
<body>
          
<header>
    <div class="container">
        <p class="logo"><a href="index.html"> Xakea</a></p>
        <nav>
            <a href="biblioteca.php">Biblioteca</a>
            <a href="registrarse.html">Registrarse</a>
            <a href="iniciarSesion.html">Iniciar sesión</a>
        </nav>
    </div>
</header><br><br><br><br><br><br>
<div class="contenedor">


        <?php
       
        $link = new PDO('mysql:host=localhost;dbname=xakea', 'root', ''); 
        ?>

        <table class="table table-striped">
            
                <thead>
                <tr>
                    <th>Jugador 1</th>
                    <th>Jugador 2</th>
                    <th>Campeonato</th>
                    <th>Año</th>
                    <th>Enlace</th>
                </tr>
                </thead>
        <?php foreach ($link->query('SELECT * from biblioteca') as $row){  ?> 
<tr>
	<td><?php echo $row['jugador1'] // aca te faltaba poner los echo para que se muestre el valor de la variable.  ?></td>
        <td><?php echo $row['jugador2'] ?></td>
        <td><?php echo $row['campeonato'] ?></td>
        <td><?php echo $row['anio'] ?></td>
        <td><a href="<?php echo $row['enlace'] ?>" download="<?php echo $row['jugador1'].'VS'.$row['jugador2']?>">Descargar</a></td>
        
 </tr>
<?php
	}
?>

</table>
</div>
</body>
</html>
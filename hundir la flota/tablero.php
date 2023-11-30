<?php 
session_start();
$mapaColores = $_SESSION["mapaColores"];
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hundir la flota</title>  
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>
        <h2>Hundir la flota</h2>
        <table class="tabla" border="1">
        <?php
        // Generar el tablero de 8x8
        for ($row = 1; $row <= 8; $row++) {
        echo "<tr>";
        for ($col = 1; $col <= 8; $col++) {
        // Crear botón para cada celda
        echo "<td>";
        ?>
        <a href="barcos.php?x=<?=$col?>&y=<?=$row?>">  <div class=<?=$mapaColores[$col][$row]?>> </div>    </a>
        <?php
        echo "</td>";
        }
        echo "</tr>";
        }
        ?>     

        </table>
        <form action="CerrarSesion.php">
                <input type="submit" value="REINICIAR"><br><br>
            </form>
        
            
        <?php
        //cuenta la ultima posicion seleccionada
            if(isset($_SESSION["y"]) && isset($_SESSION["x"])){
                echo "<h3>ULTIMA POPSICION SELECCIONADA</h3>";
                echo "linea: ".$_SESSION["y"].".<br>columna: ".$_SESSION["x"];
                echo "<br><br>Has acertado ".$_SESSION["tirosAcertados"]." veces.";
                echo "<br>Has fallado ".$_SESSION["tirosFallados"]." veces.";
            }
            
        //te va diciendo las oportunidades que te quedan
          //cuenta si has acertado las 5 posiciones o no
          //Valor que quieres contar las veces que sale, en este caso "hundido"
          
            if($_SESSION["disparos"]>0 && $_SESSION["disparos"]<>5){
                echo "<br><br><br>Tienes ".$_SESSION["disparos"]." disparos";
            }else echo "<br><br><br>No te quedan mas disparos y no se modificara el tablero";
        
      
        
        
        ?>

    </body>
</html>

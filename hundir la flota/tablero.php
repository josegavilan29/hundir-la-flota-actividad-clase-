<?php 
session_start();
require("funciones.php");

tableroHTML();

//cuenta la ultima posicion seleccionada
if(isset($_SESSION["y"]) && isset($_SESSION["x"])){
    //te va diciendo las oportunidades que te quedan
    //cuenta si has acertado las 5 posiciones o no
    if($_SESSION["tirosAcertados"]==5){
        echo "<br><br><br><h3>ENHORABUENA HAS GANADO EL JUEGO</h3>";
        ?>
            <br><br>
            <form action="CerrarSesion.php">
            <input type="submit" value="REINICIAR"><br><br>
            </form>
        <?php

        
    }elseif($_SESSION["disparos"]>0){
        /*en este elseif, ademas de ver si nos quedan disparos, 
        hay que ver q los disparos sean mas de los barcos que quedan*/

        echo "<h3>ÚLTIMA POSICION SELECCIONADA</h3>";
        echo "linea: ".$_SESSION["y"].".<br>columna: ".$_SESSION["x"];
        echo "<br><br>Has acertado ".$_SESSION["tirosAcertados"]." veces.";
        echo "<br>Has fallado ".$_SESSION["tirosFallados"]." veces.";

        echo "<br><br><br>Tienes ".$_SESSION["disparos"]." disparos";
        ?>
            <br><br>
            <form action="CerrarSesion.php">
            <input type="submit" value="REINICIAR"><br><br>
            </form>
        <?php


        }else {
        echo "<br><br>Has acertado ".$_SESSION["tirosAcertados"]." veces.";
        echo "<br>Has fallado ".$_SESSION["tirosFallados"]." veces.";

            echo "<br><br><br>No te quedan mas disparos y no se modificara el tablero";   
            ?>
            <br><br>
                <form action="CerrarSesion.php">
                    <input type="submit" value="REINICIAR"><br><br>
                </form>
            <?php
        }    
}else echo "<h3>¿DONDE QUIERES DISPARAR?</h3>";

?>




</body>
</html>

<?php

//FUNCION PARA DEJAR POR DEFECTO LOS VALORES QUE LO NECESITEN
function porDefecto(){
    $_SESSION["disparos"]=18;
    $_SESSION["tirosAcertados"]=0;
    $_SESSION["tirosFallados"]=0;

    $_SESSION["x"]=null;
    $_SESSION["y"]=null;
}

//CREAR MAPA DONDE SE ENCUENTRAN LOS BARCOS
function mapaBarcos(){
    $tableroBarcos = array();
    for($i=1;$i<=8;$i++){
        for($j=1;$j<=8;$j++){
            $tableroBarcos[$i][$j]=0;
        }
    }

    /*
      TE DEJO AQUI UN CODIGO DONDE LA PRIMERA COLUMNA SE QUEDA A UNOS PARA
      VEAS QUE ESTE APARTADO FUNCIONA CORRECTAMENTE YA QUE YO NUNCA ACERTABA 
      5 POSICIONES, SIMPLEMENTE CAMBIA ESTE FOR POR EL DE ABAJO QUE ES
      EL QUE CREA POSICIONES RANDOM

        for($j=1;$j<=5;$j++){
            $tableroBarcos[1][$i]=1;
        }

    */
        //-------->ESTE FOR CREA POSICIONES RANDOM

    for($i=1;$i<=5;$i++){
        $y = rand(1,8);
        $x = rand(1,8);
        if($tableroBarcos[$y][$x]==1){
            //si la posicion coincide con una dicha anteriormente se elimina a $i-1 
            //para que vuelva a hacer el for hasta que no se repita ninguna posicion
            $i--;
        }else $tableroBarcos[$y][$x]=1;
    }
    return $tableroBarcos;
}

//CREAR MAPA DONDE LE DIREMOS EL COLOR DEL FONDO
function mapaColores(){
    $tableroColores = array();
    for($i=1;$i<=8;$i++){
        for($j=1;$j<=8;$j++){
          $tableroColores[$i][$j]="agua";
        }
    }
    return $tableroColores;
}




//PARA LA PAGINA DONDE SE COMPRUEBAN LOS DISPAROS
//COMPROVACION DE DISPAROS
function  comprobacionDisparo($x, $y){
    if($_SESSION["mapaBarcos"][$x][$y]==1){
        $valor=true;
    }else $valor=false;

    return $valor;   

}

//FUNCION DEL HTML DEL TABLERO
function tableroHTML(){
    echo 
    '<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Hundir la flota</title>  
    <link rel="stylesheet" href="estilos.css">
    </head>
    <body class="tablero">

    <h2>Hundir la flota</h2>

    <table class="tabla" border="1">';
    
    // Generar el tablero de 8x8
    for ($row = 1; $row <= 8; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 8; $col++) {
    // Crear botón para cada celda
    echo "<td>";
    ?>
    <a href="barcos.php?x=<?=$col?>&y=<?=$row?>">
        <div class=<?=$_SESSION["mapaColores"][$col][$row]?>></div>   
    </a>
    <?php
    echo "</td>";
    }
    echo "</tr>";
    }
       

    echo '</table>';
}


//CERRAR JUEGO E INICIAR DE 0
function cerrarSesion(){
    $_SESSION = array();
    session_destroy();

    return header("Location:CrearPosicionBarcos.php");
}








?>
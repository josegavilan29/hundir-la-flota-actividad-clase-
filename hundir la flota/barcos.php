<?php
session_start();

//ahora voy a hacer un if para hacer una cuenta atras y contar los disparos
if($_SESSION["disparos"]>0 && $_SESSION["tirosAcertados"]<>5){
//variables para saber cual esla posición donde se ha clicado en el tablero
$x = $_GET["x"];
$y = $_GET["y"];
$_SESSION["x"]=$x;
$_SESSION["y"]=$y;

//ahora vamos a ver si la posicion que se clica y si hay barco no no

if($_SESSION["mapaBarcos"][$x][$y]==1){
    $valor=true;
}else $valor=false;


//ver registro de disparos a la vez que podemos guardar el color del mapa (par recordar si le damos o no)
//ver cuantas veces hemos hundidos o fallados



if($valor){
    $_SESSION["mapaColores"][$x][$y]="tocado";
    //sumamos las veces que acertamos
    $_SESSION["tirosAcertados"]++;
}else {
    $_SESSION["mapaColores"][$x][$y]="fallado";
    //sumamos las veces que fallamos
    $_SESSION["tirosFallados"]++;

}

//aqui cierro el if del principio y le resto 1 para ir quitando balas
$_SESSION["disparos"]--;
}else {}



//redirigimos a la pagina
header("Location:tablero.php");
?>
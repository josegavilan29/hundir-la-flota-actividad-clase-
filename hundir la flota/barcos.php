<?php
session_start();
require("funciones.php");
//ahora voy a hacer un if para hacer una cuenta atras y contar los disparos
if($_SESSION["disparos"]>0 && $_SESSION["tirosAcertados"]<>5){
//variables para saber cual esla posición donde se ha clicado en el tablero
$X = $_GET["x"];
$Y = $_GET["y"];

/*AQUI METO LA "X" Y LA "Y" EN UNA SESION PARA 
MOSTRAR LUEGO LO QUE HEMOS SELECCIONADO*/

$_SESSION["x"]=$X;
$_SESSION["y"]=$Y;

/*ahora vamos a ver si la posicion que se clica 
y si hay barco no no ver registro de disparos 
a la vez que podemos guardar 
el color del mapa (par recordar si le damos o no)
ver cuantas veces hemos hundidos o fallados*/

if(comprobacionDisparo($X, $Y) and $_SESSION["mapaColores"][$X][$Y]=="agua"){
    $_SESSION["mapaColores"][$X][$Y]="tocado";
    //sumamos las veces que acertamos
    $_SESSION["tirosAcertados"]++;
    //le resto 1 para ir quitando balas
    $_SESSION["disparos"]--;
}elseif(!comprobacionDisparo($X, $Y) and $_SESSION["mapaColores"][$X][$Y]=="agua"){
    $_SESSION["mapaColores"][$X][$Y]="fallado";
    //sumamos las veces que fallamos
    $_SESSION["tirosFallados"]++;
    //le resto 1 para ir quitando balas
    $_SESSION["disparos"]--;
}

//aqui cierro el if del principio
}else {}



//redirigimos a la pagina
header("Location:tablero.php");
?>
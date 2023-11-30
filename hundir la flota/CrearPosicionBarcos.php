<?php
session_start();
require("funciones.php");
/*creo el cargador de 18 disparos y las veces que fallamos 
o acertamos lo dejamos en 0 para luego contarlas, 
LO CREO EN ESTA PAGINA, YA QUE SOLO ENTRO AL PRINCIPIO
PARA QUE TENGAMOS 18 DISPAROS AL PRINCIPIO Y SE RESTEN EN OTRO LADO
PARA QUE NO ESTE TODO CON 18 DISPAROS*/

/*le digo que no existe las sesiones de "x, y" asi no me sale nada 
de texto, si he acertado hasta que clique en alguna posicion*/
porDefecto();

/*HAY QUE HACER DOS MAPAS, UNO PARA VER LA POSICION DE LOS BARCOS 
Y OTRO PARA MOSTRARLO QUE CAMBIARA DE COLOR DEPENDIENDO SI LE DAMOS O NO, 
ES DECIR MOSTRAREMOS ESTE MAPA Y SI LE DAMOS SE PONDRA DE UN COLOR U OTRO*/

//MAPA PARA CREAR LOS BARCOS
//creo el array todo a 0 con 5 posiciones random donde se ubican estos
//LO METEMOS EN UNA SESION PARA GUARDARLO
$_SESSION["mapaBarcos"] = mapaBarcos();

//MAPA PARA PONER UN COLOR U OTRO Y SABER SI LE HEMOS DADO O NO
$_SESSION["mapaColores"] = mapaColores();

header("Location:tablero.php");

?>
<?php
session_start();

//creo el cargador de 18 disparos y las veces que fallamos o acertamos lo dejamos en 0 para luego contarlas
$_SESSION["disparos"]=18;
$_SESSION["tirosAcertados"]=0;
$_SESSION["tirosFallados"]=0;

//HAY QUE HACER DOS MAPAS, UNO PARA VER LA POSICION DE LOS BARCOS Y OTRO PARA MOSTRARLO QUE CAMBIARA DE COLOR DEPENDIENDO SI LE DAMOS O NO, ES DECIR MOSTRAREMOS ESTE MAPA Y SI LE DAMOS SE PONDRA DE UN COLOR Y SINO SE PONDRA DE OTRO

//MAPA PARA CREAR LOS BARCOS

//creo el array todo a 0
$tableroConBarcos = array();
for($i=1;$i<=8;$i++){
    for($j=1;$j<=8;$j++){
        $tablero[$i][$j]=0;
    }
}
//vamos a decirle 5 posiciones random para que se ubiquen los barcos 
for($i=1;$i<=5;$i++){
    $y = rand(1,8);
    $x = rand(1,8);
    if($tableroConBarcos[$y][$x]===1){
        $y = rand(1,8);
        $x = rand(1,8);
    }else $tableroConBarcos[$y][$x]=1;
}
//LO METEMOS EN UNA SESION PARA GUARDARLO
$_SESSION["mapaBarcos"]=$tableroConBarcos;


//MAPA PARA PONER UN COLOR U OTRO Y SABER SI LE HEMOS DADO O NO
$tableroColores = array();
for($i=1;$i<=8;$i++){
    for($j=1;$j<=8;$j++){
        $tableroColores[$i][$j]="agua";
    }
}
print_r($tableroColores);



$_SESSION["mapaColores"]=$tableroColores;

header("Location:tablero.php");

?>
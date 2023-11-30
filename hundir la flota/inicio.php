<?php
require("funciones.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Hundir la flota</title>  
        <link rel="stylesheet" href="estilos.css">

    </head>
    <body class="inicio">
        

            <h1>Hundir la flota</h1>
            <h4>ACTIVIDAD-8 / SESIONES</h4>
            <h7>Jose Gavián Tortajada</h7><br><br>  


            <form action="CrearPosicionBarcos.php">
                <label for="dificultad">Dificultad:</label><br>
                <select name="dificultad" id="dificultad" required>
                    <option value="normal">Normal</option>
                    <option value="dificil">Difícil</option>
                    <option value="imposible">Imposible</option>
                </select><br><br>
                    <input type="submit" value="INICIAR"><br><br>
            </form>
            
        
    </body>
</html>

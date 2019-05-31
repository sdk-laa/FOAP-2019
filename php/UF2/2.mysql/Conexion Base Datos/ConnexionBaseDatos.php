<?php
    // dades de configuració
    $ip = 'localhost';
    $usuari = 'root';
    $password = '1234';
    $db_name = 'web';
    
    // connectem amb la db
    $con = mysqli_connect($ip,$usuari,$password,$db_name);
    if (!$con)  {
            echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno()
        echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
    }
    
    /*


        Codigo de consultas


    */


    //Cerrar conexion:
    mysqli_close($con);
 ?>
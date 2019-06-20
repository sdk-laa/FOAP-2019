<?php

    require("SpiritSocial_Functions.php");    //Incluir funciones

    if(isset($_REQUEST["change"])){
    // modificar la pass per lusuari vinculat al token
    $p1=$_REQUEST["Pass1"];
    $p2=$_REQUEST["Pass2"];
    $token=$_REQUEST["token"];

    if($p1==$p2){
        $con=ConnectDB();
        $sql = "  select * from tokens where token='$token' ";
        $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
    
        if($resultat->num_rows!=1){
             echo "S'ha detectat un problema.Contacta amb l'adminstrador.";
            die();

        }else{
            //mod el pass
            $registre = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
            $email=$registre["username"];
            $sqlupdate="  update usuarios set password='$p1' where email='$email'  ";
            $resultat = mysqli_query($con,$sqlupdate) or die('Consulta fallida: ' . mysqli_error($con));
                echo "password cambiado correctamente....";
        }
        CloseDB($con);
    }
    else{
        echo " les passwrds no coincideixen...";
    }


    }else{

    /*

    al formulari de mod passs:
        verificar el token (*verificar la caducitat)
        mostrar formulari per introduir nou password

    */

    $token=$_GET["token"];

    $sql = "  select * from tokens where token='$token' and DATE_ADD(hora, INTERVAL 5 MINUTE)>CURRENT_TIMESTAMP ";

    // dades de configuració
    $ip = 'localhost';
    $usuari = 'demoweb';
    $pass = 'LeH6TAoqCiQEGY1h';
    $db_name = 'demoweb';

        // connectem amb la db
        $con = mysqli_connect($ip,$usuari,$pass,$db_name);
        if (!$con)  {
            echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
                echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
        }

        $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));

        if($resultat->num_rows!=1){


            echo "S'ha detectat un problema.Contacta amb l'adminstrador.";
            die();

        }

        mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <form  method="post">
            
            Password: <input type="password" name="Pass1" id=""><br>
            Repeat Password: <input type="password" name="Pass2" id=""><br>
            <input type="hidden" name="token" value="<?=$token?>">
            <input type="submit" name="change" value="Save">
            
        </form>
    </body>
</html>

<?php

}

?>
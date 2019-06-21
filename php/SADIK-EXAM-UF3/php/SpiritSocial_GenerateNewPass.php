
<?php
    require("SpiritSocial_Functions.php");    //Incluir funciones

    $Login=false;
    $ErrorPass=false;

    if (isset($_REQUEST["GoToLogin"])){  //Si se clica "login" vuelve a la pagina principal
        header('Location:SpiritSocial.php');
    }

    if(isset($_REQUEST["change"])){
        // modificar la pass per lusuari vinculat al token
        $Pass1=$_REQUEST["Pass1"];
        $Pass2=$_REQUEST["Pass2"];
        $token=$_REQUEST["token"];

        if($Pass1==$Pass2){
            $con=ConnectDB();
            $SqlToken = "SELECT * FROM tokens WHERE token='$token' ";
            $ResultatToken = mysqli_query($con,$SqlToken) or die('Consulta fallida: ' . mysqli_error($con));
        
            if($ResultatToken->num_rows!=1){
                echo "S'ha detectat un problema.Contacta amb l'adminstrador.";
                die();

            }else{
                //mod el pass
                $registre = mysqli_fetch_array($ResultatToken, MYSQLI_ASSOC);
                $id=$registre["id_usuarios"];
                $SqlUpdate="update usuarios set Password=md5('$Pass1') where id='$id'  ";
                $ResultatUpdate = mysqli_query($con,$SqlUpdate) or die('Consulta fallida: ' . mysqli_error($con));
                $Login=true;
            }
            CloseDB($con);
        }
        else{
            $ErrorPass=true;
        }
    }

    /*
        al formulari de mod passs:
            verificar el token (*verificar la caducitat)
            mostrar formulari per introduir nou password
    */
    $token=$_GET["token"];
    $con=ConnectDB();
    $SqlTokens = "SELECT * fROM tokens wHERE token='$token' and DATE_ADD(hora, INTERVAL 5 MINUTE)>CURRENT_TIMESTAMP ";
    $ResultatTokens = mysqli_query($con,$SqlTokens) or die('Consulta fallida: ' . mysqli_error($con));
    if($ResultatTokens->num_rows!=1){
        echo "Se ha detectado un problema.Contacta con el adminstrador.";
        die();
        echo "ResultatTokens2= ".$ResultatTokens->num_rows;
    }
    CloseDB($con);  
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
    </head>

    <body>
        <div id="wrapper">
            <header> <!-- Encabezado -->
                <div class='define'>
                <div style= "width:200px"> <h2> Spirit Social </h2></div> 
                </div>
            </header>
            <section>  <!-- Contenido de la pagina -->
                <div class='define'>
                    <div style="float:left"> <img src= "../imgs/SpiritSocial-2.jpg" alt="Logo" height="200px" width="960px"></div>
                    <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="300px" width="500px"></div>
                        <br><br>
                        <br><br>
                        <form  method="post">
                            <br><br>
                            <br><br>
                            <?php
                                if ($Login==false){                                
                            ?>
                                    Password: <input type="password" name="Pass1" id=""><br>
                                    <br><br>
                                    Repeat Password: <input type="password" name="Pass2" id=""><br>
                                    <br>
                                    <?php
                                        if ($ErrorPass==true){                                
                                    ?>          
                                            <span class="error">* las contraseñas no coinciden</span>
                                    <?php
                                        }
                                    ?>
                                    <br><br>
                                    <input type="hidden" name="token" value="<?=$token?>">
                                    <input type="submit" name="change" value="Save">
                            <?php
                                }
                            ?>
                            <br><br>
                            <?php
                                if ($Login==true){     
                            ?>
                                    <br><br>
                                    Password changed correctly
                                    <br><br>
                                    Clik in "Login" to start:
                                    <br><br>
                                    <input type="submit" name="GoToLogin" value="Login">
                            <?php
                                }
                            ?>
                        </form>
                </div>
            </section>
        </div>

        <footer>  <!-- Pie de pagina -->
            <div class='define'>
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>
    </body>
</html>

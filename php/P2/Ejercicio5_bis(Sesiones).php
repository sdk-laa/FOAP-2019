<?php
session_start();
?>

<?php
    $Usuario = $Contraseña="";
    $ErrorUsuario = $ErrorContraseña=$Error="";
    $MostarF=false;
    if ($_SESSION["login"]==true){
        header('Location:Ejercicio5_bis(Sesiones)_OK.php');
    }
    if(isset($_REQUEST['submit'])){
            if (empty($_REQUEST["username"])) {
                $ErrorUsuario = "Rellena el usuario.";
            }
            else{
                $Usuario = test_input($_REQUEST["username"]);
            }

            if (empty($_REQUEST["password"])) {
                $ErrorContraseña = "Rellena la contraseña.";
            }
            else{
                $Contraseña = test_input($_REQUEST["password"]);
            }

            if(($_REQUEST["username"]=="sdk") && ($_REQUEST["password"]=="1234")) {
                $_SESSION["login"]=true;
                $_SESSION["nombre"]=$_REQUEST["username"];      
                header('Location:Ejercicio5_bis(Sesiones)_OK.php');
                // Código para usuarios autorizados
                $MostarF=false;
            }    
            else{
                $MostarF=true;
                //$Error="Usuario o contraseña incorrecta.";
                // Mensaje de acceso no autorizado
            }

        
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
            .error {color: #FF0000;}
        </style>
    <title>Document</title>
</head> 
    <body>
        <h2>Ejemplo de validación de Usuario PHP</h2>
        <?php
            if ($MostarF==true){     
        ?>
        <p> <span class="error">* Usuario o contraseña incorrecta </span></p>
        <?php
        }
        ?>
        <?=$Error?>
        

        <form action="Ejercicio5_bis(Sesiones).php" method="POST">
                <label>Usuario:</label>     
                <input type="text" name="username" value="<?php echo $Usuario;?>">
                <span class="error">* <?php echo $ErrorUsuario;?></span>
                <br><br>
                
                <label>Contraseña:</label> 
                <input type="password" name="password" value="<?php echo $Contraseña;?>">
                <span class="error">* <?php echo $ErrorContraseña;?></span>
                <br><br> 

                <input type="submit" name="submit" value="Login">
        </form>
    </body>
</html>
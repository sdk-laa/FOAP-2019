<?php
   $nameError=$emailError=$ApellidoError=$EdadError=$UserError=$PasswordError=$RPasswordError="";
   $name=$email=$Apellido=$Edad =$User=$Password=$RPassword="";
   if(isset($_REQUEST['submit'])){
        if (empty($_POST["name"])) {
                $nameError = "Name is required";
        } 
        else {
                $name = test_input($_POST["name"]);
                /* if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameError = "Only letters and white space allowed"; 
                } */
        }

        if (empty($_POST["Apellido"])) {
            $ApellidoError ="";
        } 
        else {
            $Apellido= test_input($_POST["Apellido"]);
            /* if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $ApellidoError = "Only letters and white space allowed"; 
            } */
        }
        
        if (empty($_POST["email"])) {
                $emailError = "E-mail is required";
        } 
        else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Invalid email format"; 
                }
        }

        if (!empty($_POST["Edad"])){
            if (is_numeric($_POST["Edad"])) {
                $Edad = test_input($_REQUEST["Edad"]);
                if ($Edad<=18){
                    $EdadError = "Error en la edad introducida tiene que ser mayor que 18 años ";
                }
            }
            else{
                $EdadError = "Error en la edad introducida tiene que ser un valor numerico ";
            } 
        }


        if (empty($_POST["User"])) {
            $UserError = "User is required";
        } 
        else {
                $User = test_input($_POST["User"]);
        }
        if (empty($_POST["Password"])) {
            $PasswordError = "Password is required";
        } 
        else {
                $Password = test_input($_POST["Password"]);
        }
        if (empty($_POST["RPasswerd"])) {
            $RPasswordError = "Repeat Password is required";
        } 
        else {
                $RPassword = test_input($_POST["RPassword"]);
        }

        if ((!empty($_POST["Password"])) && (!empty($_POST["RPassword"]))){
            $Password = $_POST["Password"];
            //echo ($Password);
            $RPassword = $_POST["RPassword"];
            //echo ($RPassword);
            if($Password != $RPassword){
                $MostrarF=true;
                $Registar=false;
                //echo "Las contraseñas no coinciden";
            }
            else{
                $MostrarF=false;
                $Registar=true;
                //echo "Todo correcto";
            }
        } 

        if (empty($nameError) && empty($emailError) && empty($EdadError) && empty($UserError) && empty($PasswordError) && empty($RPasswordError)){
            header('Location:Login_OK_EX.php');
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
            <!--<style>
                .error {color: #FF0000;}
            </style> -->
        <link rel="stylesheet" type="text/css" href="../../CSS/estiloT.css" />
        <title>Registrar nueva cuenta</title>
    </head>
    
    <body>
        <h2><p><span class="Titulo"> Registrar nueva cuenta</span></p></h2>
        
        <p><span class="error">* Campo obligatorio</span></p>

        <form action="Registro_EX.php" method="POST">

            Nombre:     <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameError;?></span>
            <br><br>
            Apellido: <input type="text" name="Apellido" value="<?php echo $Apellido;?>">
            <br><br>
            Edad:     <input type="number" name="Edad" value="<?php echo $Edad;?>">
            <span class="error">* <?php echo $EdadError;?></span>
            <br><br>
            E-mail:   <input type="email" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailError;?></span>
            <br><br>
            Usuario:     <input type="text" name="User" value="<?php echo $User;?>">
            <span class="error">* <?php echo $UserError;?></span>
            <br><br>
            Contraseña:     <input type="password" name="Password" value="<?php echo $Password;?>">
            <span class="error">* <?php echo $PasswordError;?></span>
            <br><br>
            Repetir Contraseña:     <input type="password" name="RPassword" value="<?php echo $RPassword;?>">
            <span class="error">* <?php echo $RPasswordError;?></span>
            <br><br>
            <input type="submit" name="submit" value="Registrar">
        </form>
    </body>
</html>
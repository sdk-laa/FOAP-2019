<?php
    session_start();
?>

<?php
    // Declaracion de variables:
   $nameError=$emailError=$ApellidoError=$fechaError=$UserError=$PasswordError=$RPasswordError="";
   $name=$email=$Apellido=$fecha=$Edad=$User=$Password=$RPassword=$Errores="";
   $Registar=true;
   $Rcorrecto=false;
   $ValidDate=true;

   require("SpiritSocial_Functions.php");

   if (isset($_REQUEST["login"])){
    header('Location:SpiritSocial.php');
    } 
   
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
            $ApellidoError ="Surname is required";
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

        if (!empty($_POST["FechaNacimiento"])){
            $fecha = $_POST["FechaNacimiento"];
            if ((validateDate($fecha)) == true) {
                $Edad=calcularEdad($fecha);
                if ($Edad<=18){
                    $fechaError = "Error en la fecha introducida, la edad tiene que ser mayor que 18 años ";
                }
            }
            else{
                $fechaError = "Error en la efecha introducida tiene que ser un formato de fechas ";
            } 
        }
        else{
            $fechaError="Birthdate is required";
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
        if (empty($_POST["RPassword"])) {
            $RPasswordError = "Password is required";
        } 
        else {
                $RPassword = test_input($_POST["RPassword"]);
        }

        if ((empty($PasswordError)) && (empty($RPasswordError)) ){
            if($Password != $RPassword){
                $Registar=false;
                $Errores="";
                //echo "Las contraseñas no coinciden";
            }
            else{
                $Errores=valida_contrasena($Password,$Errores);
                $Registar=true;
                //echo "Todo correcto";
            }
        }
        
        if(($_REQUEST["name"]=="sdk") && ($_REQUEST["Password"]=="Sdk1234!")) { // Si U o C son correctos enviar a la pagina restringida
            $_SESSION["login"]=true;
            $_SESSION["ValidUser"]="sdk";
            $_SESSION["ValidPassword"]=md5("Sdk1234!");
        }    
        else{

        }

        if (empty($nameError) && empty($ApellidoError) && empty($emailError) && empty($EdadError) && empty($UserError) && empty($PasswordError) && empty($RPasswordError) && empty($Errores) && $Registar==true){
            $Rcorrecto=true;
        }
        else{
            $Rcorrecto=false;
        }
 
    }

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
            <header>
                <div class='define'>
                    <div style= "width:200px"> <h2> Spirit Social </h2></div> 
                </div>
            </header>

            <section>
                <div class='define'>
                    <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="500px" width="500px"></div>
                    <h2><p><span class="Titulo"> Register new account</span></p></h2>
                    <p><span class="error">* Obligatory field</span></p>

                    <form action="SpiritSocial_SignUp.php" method="POST">
                        Name:     <input type="text" name="name" value="<?php echo $name;?>">
                        <span class="error">* <?php echo $nameError;?></span>
                        <br><br>
                        Surname: <input type="text" name="Apellido" value="<?php echo $Apellido;?>">
                        <span class="error">* <?php echo $ApellidoError;?></span>
                        <br><br>
                        Birthdate:
                        <input type="date" name="FechaNacimiento" format='Y-m-d' min="1950-01-01" max="2019-06-01" step="" value="<?php echo $fecha;?>">
                        <span class="error">* <?php echo $fechaError;?></span>
                        <br><br>
                        E-mail:   <input type="email" name="email" value="<?php echo $email;?>">
                        <span class="error">* <?php echo $emailError;?></span>
                        <br><br>
                        User:     <input type="text" name="User" value="<?php echo $User;?>">
                        <span class="error">* <?php echo $UserError;?></span>
                        <br><br>
                        Password:     <input type="password" name="Password" value="<?php echo $Password;?>">
                        <span class="error">* <?php echo $PasswordError;?></span>
                        <br><br>
                        Repeat Password:     <input type="password" name="RPassword" value="<?php echo $RPassword;?>">
                        <span class="error">* <?php echo $RPasswordError;?></span>
                        <br><br>
                        <input type="submit" name="submit" value="Registrar">
                    
                        <?php
                            if($Registar==false){
                        ?>
                                <p><span class="error">* Las contraseñas no coinciden</span></p>
                        <?php   
                            }
                            
                            if ($Errores !=""){
                        ?>
                                <p><span class="N">Errores en la contraseña</span></p>
                                <?php echo $Errores;?>
                                <br>
                                <?php
                            
                            }
                                ?>
                        <?php    
                            if ($Rcorrecto==true && $Registar==true && $Errores==""){
                        ?>
                                <p><span class="nota">* Account registered correctly in Spirit Social</span></p>
                                <br><br>
                                <p><span class="correcto"> "Spirit Social helps you communicate and share</span></p>
                                <br>
                                <p><span class="correcto"> with the people who are part of your life"</span></p>
                                <br><br>
                                <p><span class="nota"> Click in Login to start</span></p>
                                <br>
                                <input type="submit" name="login" value="Login">
                        <?php    
                            
                            }
                        ?>        
                        <!--<div style="float:left"> <img src= "../imgs/redesS.png" alt="Logo" height="750px" width="400px"></div>-->
                    </form>    
                </div>
            </section>
        </div>
    
        <footer>
            <div class='define'>
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>
    </body>
</html>
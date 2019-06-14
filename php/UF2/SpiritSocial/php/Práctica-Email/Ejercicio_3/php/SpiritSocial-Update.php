<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
   $nameError=$emailError=$ApellidoError=$fechaError=$UserError=$PasswordError=$RPasswordError="";
   $name=$email=$Apellido=$fecha=$Edad=$User=$Password=$RPassword=$Errores="";
   $Registar=true;
   $ValidDate=true;

   require("SpiritSocial_Functions.php");  //Incluir funciones
   
    if (isset($_REQUEST["Table"])){  //Si se clica "Table" vuelve a la tabla actualizada
        header('Location:../SpiritSocial-Usuarios.php');
    }

// Codigo para editar el registro:
    $Update=True;
    $Ucorrecto=false;
    $id=$_GET["id"];
    if (!empty($id)){
        $con=connectDB();
        $select = "SELECT * FROM usuarios where id='$id'";
        $resultat = mysqli_query($con,$select) or die('Consulta fallida: ' . mysqli_error($con));
        $u = $resultat->fetch_assoc();
        $name=$u['Name'];
        $Apellido=$u['Surname'];
        $fecha=$u['Birthdate'];
        $email=$u['Email'];
        $User=$u['User'];
        

        if(isset($_REQUEST['Edit'])){  //Si se clica en "Edit" verifica que todo es correcto y modifica el registro
            if (empty($_POST["name"])) {
                $nameError = "Name is required";
            } 
            else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameError = "Only letters and white space allowed"; 
                }
            }

            if (empty($_POST["Apellido"])) {
            $ApellidoError ="Surname is required";
            } 
            else {
                $Apellido= test_input($_POST["Apellido"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$Apellido)) {
                    $ApellidoError = "Only letters and white space allowed"; 
                }
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

            if (!empty($_POST["FechaNacimiento"])){ // Si "FechaNacimiento" no esta vacia valida la fecha y calcula edad
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
            else{  // Si esta vacia muestra error
            $fechaError="Birthdate is required";
            }

            if (empty($_POST["User"])) {
                $UserError = "User is required";
            } 
            else {
                $User = test_input($_POST["User"]);
            } 

            if (empty($nameError) && empty($ApellidoError) && empty($emailError) && empty($fechaError) && empty($UserError) && empty($Errores) && $Update==true){
                $Ucorrecto=true;
            }
            else{
                $Ucorrecto=false;
            }
        }  
    }    

?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css" />
    </head>
 
    <body>
        <div id="wrapper">
            <header>  <!-- Encabezado -->
                <div class='define'>
                    <div style= "width:200px"> <h2> Spirit Social </h2></div> 
                </div>
            </header>

            <section>  <!-- Contenido de la pagina -->
                <div class='define'>
                    <div id ="logo"> <img src= "../../imgs/SpiritSocial.jpg" alt="Logo" height="500px" width="500px"></div>
                    <h2><p> Register new account</span></p></h2>
                    <p><span class="error">* Obligatory field</span></p>

                    <form action="../SpiritSocial-Update.php/?id=<?= $_GET['id'];?>" method="POST">
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
                        <br><br>
                        <input type="submit" name="Edit" value="Update">
                        
                        <!-- Codigo para Editar -->
                        <?php

                            if ($Ucorrecto==true && $Update==true && $Errores==""){  //Si todo es correcto muetra el mensage.
                                // Si se ha creado el usuario correctamente pasarlo a base de datos
                                UpdateUser($name, $Apellido, $fecha, $email, $User, $id);
                                    
                        ?>
                                <br>
                                <p><b><span class="nota">* User Update correctly in Spirit Social</span></b></p>
                                <br><br>
                                <br><br>
                                <p><b><span class="nota"> Click in Table to return to the table users </span></b></p>
                                <br>
                                <input type="submit" name="Table" value="Table"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="submit" name="Table" value="Table">
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
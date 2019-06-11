<?php
require("SpiritSocial_Functions.php");    //Incluir funciones


$con=connectDB();
$select = 'SELECT * FROM usuarios';
$resultat = mysqli_query($con,$select) or die('Consulta fallida: ' . mysqli_error($con));

if(isset($_REQUEST['AddUser'])){ //Si se clica en "Add New User" se envia a otra pagina del furmulario para añadir el nuevo usuario
    header('Location:SpiritSocial_SignUp.php');
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
        <header> <!-- Encabezado -->
            <div class='define'>
            <div style= "width:200px"> <h2> Spirit Social </h2></div> 
            </div>
        </header>

        <section>  <!-- Contenido de la pagina -->
            <div class='define'>
                <div style="float:left"> <img src= "../imgs/SpiritSocial-2.jpg" alt="Logo" height="150px" width="960px"></div>
                <!--<div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="300px" width="500px"></div> -->
                <div id ="contenido">
                <form action="SpiritSocial-Usuarios.php" method="POST">
                    <input type="submit" name="AddUser" value="Add New User">
                    <br><br>
                
                    <table >
                        <tr>
                            <td>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>Birthdate &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>User</td>
                        </tr>
                        <?php while($u = $resultat->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $u['Name']; ?></td>
                                <td><?php echo $u['Surname']; ?></td>
                                <td><?php echo $u['Birthdate']; ?></td>
                                <td><?php echo $u['Email']; ?></td>
                                <td><?php echo $u['User']; ?></td>
                                <td><input type="submit" name="EditUser" value="Edit User"></td>
                                <?php
                    ?>
                                <!-- <td><input type="submit" name="DeleteUser" value="Delete User"></td> -->
                                <td><a href="SpiritSocial-Delete.php/?id='<?php $u['id'];?>'">Delete User</a></td>
                            </tr>
                        <?php
                            }
                        CloseDB($con);
                        ?>
                    </table>
                </form>
                </div>
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

<?php
    require("SpiritSocial_Functions.php");    //Incluir funciones

    $con=connectDB();
    $id=$_GET['id'];
    echo $_id;
    if (isset($_REQUEST['Si'])){
        $delete = 'DELETE FROM usuarios WHERE id="$_GET['id']"';
        $resultat2 = mysqli_query($con,$delete) or die('Consulta fallida: ' . mysqli_error($con));
    
        header('Location:SpiritSocial-Usuarios.php');
    }

    if (isset($_REQUEST['No'])){
        header('Location:SpiritSocial-Usuarios.php');
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
                <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="300px" width="500px"></div> 
                <div id ="contenido">
                <form action="SpiritSocial-Usuarios.php" method="POST">
                    <div>
                        <h2>Eliminar un registro</h2>
                    </div>
                    <div>
                        <p>Seguro que quiere eliminar este registro?</p><br>
                        <p>
                            <input type="submit" name = "Si" value="Si" >
                            <input type="submit" name = "No" value="No" >
                        </p>
                    </div>
                    <?php
                        CloseDB($con);
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

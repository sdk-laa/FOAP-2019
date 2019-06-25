<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>
<?php
    require("SpiritSocial_Functions.php");    //Incluir funciones
    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){ //si se ha hecho login verifica se U. y C. son correctos 
        $id_noticia=$_GET["id_noticia"]; 
        $con=connectDB();
        $SqlNoticias = "SELECT * FROM noticias where id_noticia='$id_noticia'";
        $ResultatNoticias = mysqli_query($con,$SqlNoticias) or die('Consulta fallida: ' . mysqli_error($con));
        CloseDB($con);
        $Noticias = $ResultatNoticias->fetch_assoc();
        $Titulo=$Noticias['Titulo'];
        $Descripcion=$Noticias['Descripcion'];
        $RutaImagen="../".$Noticias['RutaImagen'];

        if (isset($_REQUEST['Si'])){
            $con=connectDB();
            $delete = "DELETE FROM noticias WHERE id_noticia='$id_noticia'";
            $resultat2 = mysqli_query($con,$delete) or die('Consulta fallida: ' . mysqli_error($con));
            CloseDB($con);
            header('Location:../SpiritSocial_CheckNews.php');
        }

        if (isset($_REQUEST['No'])){
            CloseDB($con);
            header('Location:../SpiritSocial_CheckNews.php');
        }
        
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../css/Prueba1.css" />
</head>
 
<body>
<div id="wrapper">
        <header> <!-- Encabezado -->
            <div class='define'>
            <div style= "width:200px"> <h2> Spirit Social </h2></div> 
            </div>
        </header>

        <section>  <!-- Contenido de la pagina -->
            <div id="define">
                <!-- <div style="float:left"> <img src= "../../imgs/SpiritSocial-2.jpg" alt="Logo" height="200px" width=100%><br><br><br><br></div> -->
                <!-- <div id ="logo"> <img src= "../../imgs/SpiritSocial.jpg" alt="Logo" height="300px" width="500px"></div> --> 
                    <form action="../SpiritSocial-Delete.php/?id_noticia=<?= $_GET['id_noticia'];?>" method="POST">        
                        <div id="Centrado">
                            <br>
                            <h2>Eliminar Noticia:</h2>
                            <br>
                            <p><h1><span class="titulo"> <?=$Titulo?>:</span></h1></p>
                            <p><span> <?=$Descripcion?>.</span></p> 
                            <?php
                                    echo "<br>";
                                    echo "<img src=\"$RutaImagen\" alt='Logo' height='500px' width='900px'>";
                            ?>
                            <p><h2>¿Seguro que quieres eliminar esta noticia?</p></h2>
                            <p>
                                <input type="submit" name = "Si" value="Si" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="submit" name = "No" value="No" >
                            </p>
                        </div>
                    </form>
                
            </div>
        </section>
    </div>

    <footer>  <!-- Pie de pagina -->
        <div id="define">
            <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
        </div>
    </footer>

    <?php 
    }
    ?>
</body>
</html>

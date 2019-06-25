<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    /*
        Mostar noticias que existen en la base de datos:
            - Verificar si se ha hecho Login.
            - Consultar base de datos.
            - Mostrar noticias si existen.
    */

    // Declaracion de variables:;
    $ConnectedUser=$_SESSION["ValidUser"];

    require("SpiritSocial_Functions.php");  //Incluir funciones

    if(isset($_REQUEST["Logout"])){  //Una vez el usuario clica "Logout" se borra variables de session y las cookies
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:SpiritSocial.php'); // Y se envia a la pagina principal          
    }

    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){ //si se ha hecho login verifica se U. y C. son correctos  

        $con=connectDB();
        $SqltNoticias = 'SELECT * FROM noticias ORDER BY id_noticia DESC';
        $ResultatNoticias = mysqli_query($con,$SqltNoticias) or die('Consulta fallida: ' . mysqli_error($con));
        CloseDB($con);

        if(isset($_REQUEST['Menu'])){ //Si se clica en "Menu" se envia a la pagina principal
            header('Location:SpiritSocial_Login_OK.php');
        }

        if(isset($_REQUEST['CheckNews'])){ //Si se clica en "Check News" se envia a la pagina de mostrar noticias
            header('Location:SpiritSocial_CheckNews.php');
        }
    
        if(isset($_REQUEST['AddNewNews'])){ //Si se clica en "Add New News" se envia a otra pagina para añadir noticias
            header('Location:SpiritSocial_AddNewNews.php');
        }

        if(isset($_REQUEST['EditMyNews'])){ //Si se clica en "Edit My News" se actualiza y mostarara las opciones de Editar
            $EditNews=true;
        }
        else{
            $EditNews=false;
        }

        if(isset($_REQUEST['PrintNews'])){ //Si se clica en "Edit My News" se actualiza y mostarara las opciones de Editar
            header('Location:SpiritSocial_PrintNews.php');
        }

        if(isset($_REQUEST['ConfigureNews']) && ($ConnectedUser=="admin")){ //Si se clica en "Remove News" se envia a otra pagina para borrar noticias
            header('Location:SpiritSocial_ConfigureNews.php');
        }
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/Prueba1.css" />
    </head>

 
    <body>
        
        <div id="wrapper">
            <header>  <!-- Encabezado -->
                <div id="define">
                    <div style= "width:200px"> <h2>  Spirit Social  </h2>   </div>
                    <div style= "text-align:right"> 
                        Bienvenido.......... <?=$ConnectedUser?>  
                        <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    </div>     
                </div>
            </header>

            <section>  <!-- Contenido de la pagina -->                                            
                    <div id="define">
                        <form action="SpiritSocial_CheckNews.php" method="POST">
                            <input type="submit" name="Menu" value="Menu">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="CheckNews" value="Check News">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="AddNewNews" value="Add New News">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="EditMyNews" value="Edit My News">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="PrintNews" value="Print News">
                            <?php 
                                if ($ConnectedUser=="admin"){
                            ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="ConfigureNews" value="Configure News">
                            <?php 
                                }
                            ?>
                            <br><br>
                            <br><br>
                            <?php while($noticias = $ResultatNoticias->fetch_assoc()){
                            ?>
                                <div id="Centrado">  <!--Publicaciones -->
                                    <?php if($EditNews==false){?>
                                        <p><h2><?php echo ($noticias['Titulo']);?></h2></p>
                                        <p><b><?php echo ($noticias['Descripcion']);?></b></p>
                                        <?php $Ruta = $noticias['RutaImagen'];?>
                                        <p><img src= "<?=$Ruta?>" alt="Logo" height="500px" width="900px"></p> 
                                        <div style="text-align: left">Author: <?php echo utf8_encode($noticias['Autor']);?></div>
                                        <?php $_SESSION["User"]=utf8_encode($noticias['Autor']);?>
                                        <br><br>
                                        <br><br>
                                    <?php 
                                        }else if( ($noticias['Autor'] == $_SESSION["ValidUser"]) && ($EditNews==true)){?>
                                            <p><h2><?php echo ($noticias['Titulo']);?></h2></p>
                                            <p><b><?php echo ($noticias['Descripcion']);?></b></p>
                                            <?php $Ruta = $noticias['RutaImagen'];?>
                                            <p><img src= "<?=$Ruta?>" alt="Logo" height="500px" width="900px"></p> 
                                            <div style="text-align: left">Author: <?php echo utf8_encode($noticias['Autor']);?></div>
                                            <?php $_SESSION["User"]=utf8_encode($noticias['Autor']);?>
                                                <div style="text-align: right"> 
                                                    <a href="SpiritSocial-Update.php/?id_noticia=<?= $noticias['id_noticia'];?>">Update  News</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="SpiritSocial-Delete.php/?id_noticia=<?= $noticias['id_noticia'];?>">Delete News</a>
                                                </div>
                                            <br><br>
                                            <br><br>
                                    <?php
                                        }
                                    ?>
                                </div>
                            <?php 
                                } 
                            ?>  
                        </form>
                    </div>
            </section>
        </div>
    
        <footer>  <!-- Pie de pagina -->
            <div id='define'>
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>
        <?php          
            }else{
                header('Location:SpiritSocial.php');           
            }
        ?>
    </body>
</html>
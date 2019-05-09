<?php
    session_start();
?>

<?php
    $comment="";
    if(isset($_REQUEST["Logout"])){
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:SpiritSocial.php');           
    }

    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
        if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){

     
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../CSS/estilo.css" />
</head>
 
<body>
<div id="wrapper">
        <header>
            <div class='define'>
                <div style= "width:200px"> <h2> Spirit Social </h2>   </div>
                <div style= "text-align:right"> 
                    Bienvenido.......... <?=$_SESSION["ValidUser"]?>
                    <a href="SpiritSocial_Login.php?Logout">[Logout]</a>
                </div>
                
            </div>

        </header>


        <section>
            <div class='define'>
                <!--<div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="800px" width="250px"></div>-->
                <form action="SpiritSocial_Login.php" method="POST">

                    <div>
                        <li>
                        <p><span class="titulo"> Griezmann rumbo a Barcelona:</span></p>
                        <br>
                        <p><span class="titulo"> Griezmann, cuya cláusula de rescisión pasaría de los 120 millones de euros a los 100 millones el uno de julio, firmaría un contrato por cuatro o cinco años, explica el rortativo francés; incluyendo una rebaja salarial (fija los ingresos del delantero en 23 millones de euros anuales.:</span></p>      
                        <br>
                        <p><span class="titulo"><img src= "../imgs/Griezman.jpg" alt="Logo" height="250px" width="300px"></span></p>   
                        <br> 

                        <input type="submit" name="Like" value="Like">
                        <br>
                        <p><span class="titulo"> Comment:</span></p>  
                        <textarea name="comment" rows="5" cols="40" <?php echo $comment;?>></textarea>
                        <br><br>
                        </li>
                    </div>
                    <div>
                        <li>
                        <p><span class="titulo"> Griezmann rumbo a Barcelona:</span></p>
                        <br>
                        <p><span class="titulo"> Griezmann, cuya cláusula de rescisión pasaría de los 120 millones de euros a los 100 millones el uno de julio, firmaría un contrato por cuatro o cinco años, explica el rortativo francés; incluyendo una rebaja salarial (fija los ingresos del delantero en 23 millones de euros anuales.:</span></p>      
                        <br>
                        <p><span class="titulo"><img src= "../imgs/Griezman.jpg" alt="Logo" height="250px" width="300px"></span></p>   
                        <br> 

                        <input type="submit" name="Like" value="Like">
                        <br>
                        <p><span class="titulo"> Comment:</span></p>  
                        <textarea name="comment" rows="5" cols="40" <?php echo $comment;?>></textarea>
                        <br><br>
                        </li>
                    </div>


                </form>
                <!--<div style="float:left"> <img src= "../imgs/redesS.png" alt="Logo" height="750px" width="400px"></div>-->
            </div>
        </section>
    </div>
 
    <footer>
        <div class='define'>
            <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
        </div>
    </footer>

    <?php
                if(isset($_REQUEST['AddPub'])){
                    header('Location:SpiritSocial_AddPub.php');
                }
            
            }
        }
        else{
            header('Location:SpiritSocial.php');           
        }

        
        ?>
</body>
</html>
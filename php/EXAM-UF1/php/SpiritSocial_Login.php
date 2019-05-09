<?php
    session_start();
?>

<?php
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
                <div style= "width:200px"> <h2> Spirit Social </h2> 
                    Bienvenido......<?=$_SESSION["ValidUser"]?>
                    <a href="SpiritSocial_Login.php?Logout">[Logout]</a>
                </div> 
            </div>

        </header>


        <section>
            <div class='define'>
                <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="450px" width="500px"></div>
                <form action="SpiritSocial_Login.php" method="POST">

                    <label>Titulo:</label>
                    <br>      
                    <label>Descripcion:</label>
                    <br>  
                    <label>Imagen:</label>
                    <br> 

                    <input type="submit" name="Like" value="Like">
                    <br>

                    <label>Comment:</label>  
                    <textarea name="comment" rows="5" cols="40" <?php echo $comment;?>></textarea>
                    <br><br>
                    


                </form>
                <!--<div style="float:left"> <img src= "../imgs/redesS.png" alt="Logo" height="750px" width="400px"></div>-->
            </div>
        </section>
    </div>
 
    <footer>
        <div class='define'>
            <p>Contenido del pie de página</p>
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
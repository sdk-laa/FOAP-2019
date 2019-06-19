<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
    $comment1=$comment2=$comment3=$comment4="";
    $Log=false;

    require("SpiritSocial_Functions.php");  //Incluir funciones

    if(isset($_REQUEST["Logout"])){  //Una vez el usuario clica "Logout" se borra variables de session y las cookies
        session_destroy();
        setcookie("CookieUser",0,1);
        setcookie("CookiePassword",0,1);
        header('Location:SpiritSocial.php'); // Y se envia a la pagina principal          
    }

    if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){ //si se ha hecho login verifica se U. y C. son correctos  
        //if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){  // Si U. y C. son correctos muestra el contenido
        $Log=true;
    
    
        if(isset($_REQUEST['Menu'])){ //Si se clica en "Menu" se envia a la pagina principal
            header('Location:SpiritSocial_Login_OK.php');
        }
    
        if(isset($_REQUEST['AddNewNews']) && $Log==true){ //Si se clica en "Add New News" se envia a otra pagina para añadir noticias
            header('Location:SpiritSocial_AddNewNews.php');
        }/* else if (isset($_REQUEST['AddNewNews'])){
            echo'<script type="text/javascript">
            alert("You should start session first. Click on the [Login] button to start session."); 
            window.location.href="SpiritSocial_AddNewNews.php";
            </script>';
            $_SESSION["AddNewNews"]=true;
        }else{
            $_SESSION["AddNewNews"]=false; 
        } */

        if(isset($_REQUEST['RemoveNews']) && $Log==true){ //Si se clica en "Remove News" se envia a otra pagina para borrar noticias
            header('Location:SpiritSocial_RemoveNews.php');
        }/* else if (isset($_REQUEST['RemoveNews'])){
            echo'<script type="text/javascript">
            alert("You should start session first. Click on the [Login] button to start session."); 
            window.location.href="SpiritSocial_RemoveNews.php";
            </script>';
            $_SESSION["RemoveNews"]=true;
        }else{
            $_SESSION["RemoveNews"]=false;
        } */


        if (!empty($_POST["Comment1"])) { //si hay comentario guardalo
            $comment1 = test_input($_POST["Comment1"]);
        }
        if (!empty($_POST["Comment2"])) {
            $comment2 = test_input($_POST["Comment2"]);
        } 
        if (!empty($_POST["Comment3"])) {
            $comment3 = test_input($_POST["Comment3"]);
        }
        if (!empty($_POST["Comment4"])) {
            $comment4 = test_input($_POST["Comment4"]);
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
        <header>  <!-- Encabezado -->
            <div class='define'>
                <div style= "width:200px"> <h2> Spirit Social </h2>   </div>
                    <div style= "text-align:right"> 
                        Bienvenido.......... <?=$_SESSION["ValidUser"]?>  
                        <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a> 
                    </div>     
            </div>
        </header>

        <section>  <!-- Contenido de la pagina -->
            <div class='define'>
                <form action="SpiritSocial_CheckNews.php" method="POST">
                    <input type="submit" name="Menu" value="Menu">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="AddNewNews" value="Add New News">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="RemoveNews" value="Remove News">
                    <br><br>
                    <br><br>
                    <div>  <!-- Publicaciones -->
                        <p><h2> Luis Suárez se pierde la final de Copa</h2></p>
                        <p><b> El club azulgrana emitió un comunicado en el que aseguraba que la intervención había sido un éxito</p>
                        <p> y que el uruguayo no podrá estar en Sevilla.</b></p>      
                        <p><img src= "../imgs/Suarez.jpg" alt="Logo" height="400px" width="700px"></p>
                        <script language="javascript">
                            var LikeCount_1 = 0;
                            function contador1(){  // Funcion para contar like
                                LikeCount_1 = LikeCount_1 + 1;
                                var btn = document.getElementById("boton1");
                                btn.value = "Like (" + LikeCount_1 + ")";
                            }
                        </script>
                        <p><input type="button" id="boton1" value="Like" onclick="javascript: contador1()" /></p>   
                        <p><span> Comment:</span></p>
                        <p><input type="text" name="Comment1" size="50" maxlength="100" value="<?php echo $comment1;?>"></p>
                        <p><input type="submit" name="AddComment1" value="Add Comment"></p>
                        <?php 
                            if(isset($_REQUEST["AddComment1"])){ // si hay comentario muestralo
                                echo $comment1;
                            } 
                        ?>  
                        <br><br>
                    </div>
                    <div>
                        <p><h2> El Barça acelera los contactos finales por De Ligt</span></h2></p>
                        <p><b> Tras el KO del Ajax en la Champions, el Barça quiere dejarlo todo lista para abordar</p>
                        <p>su contratación cuando termine la Eredivise.</p></b>      
                        <p><img src= "../imgs/DeLigt.jpg" alt="Logo" height="400px" width="700px"></p>
                        <script language="javascript">
                            var LikeCount_2 = 0;
                            function contador2(){
                                LikeCount_2 = LikeCount_2 + 1;
                                var btn = document.getElementById("boton2");
                                btn.value = "Like (" + LikeCount_2 + ")";
                            }
                        </script>
                        <p><input type="button" id="boton2" value="Like" onclick="javascript: contador2()" /></p>
                        <p><span> Comment:</span></p>  
                        <p><input type="text" name="Comment2" size="50" maxlength="100" value="<?php echo $comment2;?>"></p>
                        <p><input type="submit" name="AddComment2" value="Add Comment"></p>
                        <?php 
                            if(isset($_REQUEST["AddComment2"])){
                                echo $comment2;
                            } 
                        ?>   
                        <br><br>
                    </div>
                    <div>
                        <p><h2> Griezmann rumbo a Barcelona:</span></h2></p>
                        <p><b>El francés concita el quorum en el área técnica del Barça por su calidad, experiencia y precio.</p>      
                        <p> La debacle en Champions refuerza la idea de poner competencia y fichar gol en la delantera.</b></p> 
                        <p><img src= "../imgs/Griezman.jpg" alt="Logo" height="400px" width="700px"></p>
                        <script language="javascript">
                            var LikeCount_3 = 0;
                            function contador3(){
                                LikeCount_3 = LikeCount_3 + 1;
                                var btn = document.getElementById("boton3");
                                btn.value = "Like (" + LikeCount_3 + ")";
                            }
                        </script>   
                        <p><input type="button" id="boton3" value="Like" onclick="javascript: contador3()" /></p>
                        <p><span> Comment:</span></p>  
                        <p><input type="text" name="Comment3" size="50" maxlength="100" value="<?php echo $comment3;?>"></p>
                        <p><input type="submit" name="AddComment2" value="Add Comment"></p>
                        <?php 
                            if(isset($_REQUEST["AddComment3"])){
                                echo $comment3;
                            } 
                        ?>   
                        <br><br>
                        <br><br>
                    </div>
                    <div>
                        <?php
                            if (isset($_SESSION["AddPubToWall"]) && $_SESSION["AddPubToWall"]==true){ //si se añade nueva publicacion muestrala
                                $Image=$_SESSION["Image"]; 
                        ?> 
                                <p><h2> <?=$_SESSION["Title"]?>:</h2></p>
                                <p><b> <?=$_SESSION["Description"]?>.</b></p> 
                        <?php
                                echo "<br>";
                                echo "<img src=\"$Image\">";
                        ?>
                                <script language="javascript">
                                    var LikeCount_4 = 0;
                                    function contador4(){
                                        LikeCount_4 = LikeCount_4 + 1;
                                        var btn = document.getElementById("boton4");
                                        btn.value = "Like (" + LikeCount_4 + ")";
                                    }
                                </script>
                                <p><input type="button" id="boton4" value="Like" onclick="javascript: contador4()" /></p> 
                                <p><span> Comment:</span></p>  
                                <p><input type="text" name="Comment4" size="50" maxlength="100" value="<?php echo $comment4;?>"></p>
                                <p><input type="submit" name="AddComment4" value="Add Comment"></p>
                                <?php 
                                    if(isset($_REQUEST["AddComment1"])){
                                        echo $comment1;
                                    } 
                                ?>   
                                <br><br>
                                <br><br>
                        <?php
                            }
                        ?>
                    </div>
                </form>
            </div>
        </section>
    </div>
 
    <footer>  <!-- Pie de pagina -->
        <div class='define'>
            <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
        </div>
    </footer>
<?php          
    }else{
        $_SESSION["CheckNews"]=true;
         header('Location:SpiritSocial.php');           
    }
?>
</body>
</html>
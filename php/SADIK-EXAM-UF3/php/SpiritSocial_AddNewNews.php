<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
    $Title=$Description=$Image="";
    $TitleError=$DescriptionError=$ImageError="";
    $ShowImage=false;

    require("SpiritSocial_Functions.php");  //Incluir funciones
        
        if(isset($_REQUEST["Logout"])){  //Una vez el usuario clica "Logout" se borra variables de session y las cookies
            session_destroy();
            setcookie("CookieUser",0,1);
            setcookie("CookiePassword",0,1);
            header('Location:SpiritSocial.php');           
        } 

        if(isset($_REQUEST['MainMenu'])){  //Si se clica en "Main Menu" Vuelve al muro de publicaciones
            header('Location:SpiritSocial_CheckNews.php');
        }

        if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){  //Si se ha hecho login verifica se U. y C. son correctos  
            //if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){  //Si U. y C. son correctos muestra el contenido
                if(isset($_REQUEST["UploadPub"])){  //Si se clica en "Upload Pub" verifica todos los campos que esten correctos sino muestra error

                    if (empty($_POST["Title"])) {
                        $TitleError = "Title is required";
                    } 
                    else {
                            $Title = test_input($_POST["Title"]);
                            $TitleError=valida_Title($Title,$TitleError);
                    }

                    if (empty($_POST["Description"])) {
                        $DescriptionError = "Description is required";
                    } 
                    else {
                            $Description = test_input($_POST["Description"]);
                            $DescriptionError=valida_Description($Description,$DescriptionError);
                    }

                    if(empty($_REQUEST["Image"])){
                        $ImageError="Image is required"; 
                    }

                    // *** Subir el imagen: En el local funciona correctamente pero en el servidor da error. ***
                    // *** El ejemplo que tenemos de subir imagen tambien pasa lo mismo en el servidor no se puede subir imagen. ***
                    if(!is_uploaded_file($_FILES['Image']['tmp_name'])){
                        echo "otro error";
                    }
                    //$dir_subida = '../imgs/';
                    $dir_subida = "../imgs/";
                    $Image_Upload = $dir_subida . time()."_".basename($_FILES['Image']['name']);
                    if (move_uploaded_file($_FILES['Image']['tmp_name'], $Image_Upload)) {  // si se ha subido correctamente guadra en variables de session para mostrarla en otra pagina
                        $ShowImage=true;
                    }
                    else {
                            $ShowImage=false;
                    }

                    $_SESSION["Title"]=$_REQUEST["Title"];
                    $_SESSION["Description"]=$_REQUEST["Description"];
                    $_SESSION["Image"]=$Image_Upload;
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
                    <div style= "width:200px"> <h2> Spirit Social </h2></div>
                    <div style= "text-align:right"> 
                        <?=$_SESSION["ValidUser"]?>
                        <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a>
                    </div> 
                </div>
            </header>

            <section>  <!-- Contenido de la pagina -->
                <div class='define'>
                    <div style="float:left"> <img src= "../imgs/SpiritSocial-2.jpg" alt="Logo" height="150px" width="960px"></div>
                    <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="350px" width="500px"></div>
                    <div>
                        <form action="SpiritSocial_AddNewNews.php" method="POST" enctype="multipart/form-data">
                            <input type="submit" name="MainMenu" value="Main Menu">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="RemovePub" value="Remove Pub">   
                            <br><br>
                            <br>
                            <p><h2> Add New Pub</h2></p>
                            <p><span class="error">* Obligatory field</span></p>
                            <br>
                            <p>Title:</p>   
                            <input type="text" name="Title" value="<?php echo $Title;?>">
                            <span class="error">* <?php echo $TitleError;?></span>
                            <br>
                            <p>Description:</p> 
                            <textarea name="Description" rows="2" cols="50" ></textarea> 
                            <span class="error">* <?php echo $DescriptionError;?></span>
                            <br>
                            </p>Image:</p>
                            <input type="file" name="Image"><br>
                            <span class="error">* <?php echo $ImageError;?></span>
                            <br><br>
                            <p>Click the button "Upload Pub" to Upload a new publication.</p>
                            <p><input type="submit" name="UploadPub" value="Upload Pub"></p>
                        </form> 
                    </div> 
                    <?php
                        if($ShowImage==true){ //Si hay nueva publicacion muestra uana alerta para indicarlo y enviar a otra pagina para verla.
                            echo'<script type="text/javascript">
                            alert("Publication successfully uploaded. Click on the [Accept] button to see it."); 
                            window.location.href="SpiritSocial_SeeNewPub.php";
                            </script>'; 
                            //header("location:SpiritSocial_SeeNewPub.php");
                        }
                    ?>
                </div>
            </section>
        </div>
    
        <footer>  <!-- Pie de pagina -->
            <div class='define'>
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>
        <?php    
            //}
            }else{
                $_SESSION["AddNewNews"]=true;
                header('Location:SpiritSocial.php');           
            }
        ?>
    </body>
</html>
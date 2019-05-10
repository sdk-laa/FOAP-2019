<?php
    session_start();
?>

<?php
    // Declaracion de variables:
    $Title=$Description=$Image="";
    $TitleError=$DescriptionError=$ImageError="";
    $ShowImage=false;

    require("SpiritSocial_Functions.php");
        
        if(isset($_REQUEST["Logout"])){
            session_destroy();
            setcookie("CookieUser",0,1);
            setcookie("CookiePassword",0,1);
            header('Location:SpiritSocial.php');           
        } 

        if(isset($_REQUEST['MainMenu'])){
            header('Location:SpiritSocial_Login_OK.php');
        }



/*         if(($TitleError=="") && ($DescriptionError=="") && ($ImageError=="")){
            $_SESSION["Upload Pub"]=true;
            $ShowImage=true;
        } */

        if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){
            if(($_SESSION["ValidUser"]=="sdk") && ($_SESSION["ValidPassword"]==md5("Sdk1234!"))){
                if(isset($_REQUEST["UploadPub"])){

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

                    if(!is_uploaded_file($_FILES['Image']['tmp_name'])){
                        echo "otro error";
                    }
                    $dir_subida = '../imgs/';
                    $Image_Upload = $dir_subida . time()."_".basename($_FILES['Image']['name']);
                    if (move_uploaded_file($_FILES['Image']['tmp_name'], $Image_Upload)) {
                        $ShowImage=true;
                    }
                    else {
                            $ShowImage=false;
                    }

                    $_SESSION["Title"]=$_REQUEST["Title"];
                    $_SESSION["Description"]=$_REQUEST["Description"];
                    $_SESSION["Image"]=$_REQUEST["Image"];
                
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
                    <div style= "text-align:right"> 
                        <?=$_SESSION["ValidUser"]?>
                        <a href="SpiritSocial_Login_OK.php?Logout">[Logout]</a>
                    </div> 
                </div>
            </header>

            <section>
                <div class='define'>
                    <div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="450px" width="500px"></div>
                    <div>
                    <form action="SpiritSocial_AddNewPub.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="MainMenu" value="Main Menu">
                        <br><br>
                        <br><br>
                        
                        <h2><p><span class="Titulo"> Add New Pub</span></p></h2>
                        <br><br>
                        <p><span class="error">* Obligatory field</span></p>
                        <br>
                        Title:     <input type="text" name="Title" value="<?php echo $Title;?>">
                        <span class="error">* <?php echo $TitleError;?></span>
                        <br><br>
                        Description: <textarea name="Description" rows="5" cols="30" ></textarea> 
                        <span class="error">* <?php echo $DescriptionError;?></span>
                        <br><br>
                        IMAGE:
                        <input type="file" name="Image"><br>
                        <span class="error">* <?php echo $ImageError;?></span>
                        <br><br>
                        <br><br>
                        <br><br>
                        <p>Click the button "Upload Pub" to Upload a new publication.</p>
                        <input type="submit" name="UploadPub" value="Upload Pub">
                    </form> 
                    </div> 
                    <?php
                        if($ShowImage==true){
                            echo'<script type="text/javascript">
                            alert("Tarea Guardada");
                            window.location.href="SpiritSocial_SeeNewPub.php";
                            </script>';
                           ?>
                            
                            

                            
                            

                    <?php        
                        //echo "Titulo: ". $Title;
                        //echo "Description: ". $Description;
                        //echo "<img src=\"$Image_Upload\">"; 
                        }
                    
                    ?>
                </div>
            </section>
        </div>
    
        <footer>
            <div class='define'>
                <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
            </div>
        </footer>
        <?php
                
           
            }
        }
        else{
            header('Location:SpiritSocial.php');           
        }

        
        ?>
    </body>
</html>
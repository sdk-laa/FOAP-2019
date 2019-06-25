<?php
    session_start();  //Iniciar una nueva sesión o reanudar la existente
?>

<?php
    // Declaracion de variables:
   $TituloError=$DescripcionError=$RutaImagenError="";
   $Titulo=$Descripcion=$RutaImagen=$Edad=$Errores="";
   $Registar=true;
   $ValidDate=true;

   require("SpiritSocial_Functions.php");  //Incluir funciones
    
   if(isset($_SESSION["login"]) && ($_SESSION["login"]==true)){ //si se ha hecho login verifica se U. y C. son correctos 
        if (isset($_REQUEST["CheckNews"])){  //Si se clica "Table" vuelve a la tabla actualizada
            header('Location:../SpiritSocial_CheckNews.php');
        }

        // Codigo para editar el registro:
        $Update=True;
        $Ucorrecto=false;
        $id_noticia=$_GET["id_noticia"];
        if (!empty($id_noticia)){
            $con=connectDB();
            $SqlNoticias = "SELECT * FROM noticias where id_noticia='$id_noticia'";
            $ResultatNoticias = mysqli_query($con,$SqlNoticias) or die('Consulta fallida: ' . mysqli_error($con));
            $Noticias = $ResultatNoticias->fetch_assoc();
            $Titulo=$Noticias['Titulo'];
            $Descripcion=$Noticias['Descripcion'];
            $RutaImagen=$Noticias['RutaImagen'];
            CloseDB($con);
            

            if(isset($_REQUEST['Edit'])){  //Si se clica en "Edit" verifica que todo es correcto y modifica el registro
                if (empty($_POST["Titulo"])) {
                    $TituloError = "Titulo is required";
                } 
                else {
                    $Titulo = test_input($_POST["Titulo"]);
                }

                if (empty($_POST["Descripcion"])) {
                    $DescripcionError ="Descripcion is required";
                } 
                else {
                    $Descripcion= test_input($_POST["Descripcion"]);
                }
            
                if (empty($_POST["RutaImagen"])) {
                    $RutaImagenError = "Imagen is required";
                } 
                else {
                    $RutaImagen = test_input($_POST["RutaImagen"]);
                }

                if (empty($TituloError) && empty($DescripcionError) && empty($RutaImagenError) && empty($Errores) && $Update==true){
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
        <link rel="stylesheet" type="text/css" href="../../css/Estilo.css" />
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
                <div style="float:left"> <img src= "../../imgs/SpiritSocial-2.jpg" alt="Logo" height="250px" width=100%></div>    
                <div id ="logo"> <img src= "../../imgs/SpiritSocial.jpg" alt="Logo" height=100% width="500px"></div>
                    <h2><p> Edit News </span></p></h2>
                    <p><span class="error">* Obligatory field</span></p>

                    <form action="../SpiritSocial-Update.php/?id_noticia=<?= $_GET['id_noticia'];?>" method="POST">
                        Titulo:     <input type="text" name="Titulo" value="<?php echo $Titulo;?>">
                        <span class="error">* <?php echo $TituloError;?></span>
                        <br><br>
                        Descripcion: <textarea ype="text" name="Descripcion" rows="4" cols="50"><?php echo $Descripcion;?></textarea>
                        <span class="error">* <?php echo $DescripcionError;?></span>
                        <br><br>
                        Imagen:   <input type="text" name="RutaImagen" value="<?php echo $RutaImagen;?>">
                        <span class="error">* <?php echo $RutaImagenError;?></span>
                        <br><br>
                        <br><br>
                        <input type="submit" name="Edit" value="Update">
                        
                        <!-- Codigo para Editar -->
                        <?php

                            if ($Ucorrecto==true && $Update==true && $Errores==""){  //Si todo es correcto muetra el mensage.
                                // Si se ha creado el usuario correctamente pasarlo a base de datos
                                UpdateNews($Titulo, $Descripcion, $RutaImagen, $id_noticia);
                                    
                        ?>
                                <br>
                                <p><b><span class="nota">* News Update correctly in Spirit Social</span></b></p>
                                <br><br>
                                <br><br>
                                <p><b><span class="nota"> Click in Check News to return to see the News </span></b></p>
                                <br>
                                <input type="submit" name="CheckNews" value="Check News">
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
    <?php 
    }
    ?>
</html>
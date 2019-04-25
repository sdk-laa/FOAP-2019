<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Title</title>
        <link rel="stylesheet" type="text/css" href="../CSS/estiloT.css" />
        <script src="main.js"></script>
        <?php
        //require("funcionsT.php");
        function codigocorrecto($valor){
            $Resultado=false;
            $contraseña='cf43b968348cc8f4376a13d4e94dca3e';
            if ((md5(sha1($valor)))==$contraseña) {
                 $Resultado=true;
                }
            return $Resultado;
        }
        ?>
    </head>
    
    <body>

        <?php
            $string = 'Classe';
            if (codigocorrecto($string)){
                print("<p class='correcto'> Contraseña correcta");
            }
            else{
                print("<p class='error'> Contraseña incorrecta");
            }
	    ?>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page Title</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
        <script src="main.js"></script>
        <?php
        //require("funcionsT.php");
        function formatoEuropeo($fecha_A){
            $resultado=false;
            $valores = explode('-', $fecha_A);
            if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
               $resultado=true;
             }
            return $resultado;
         }
        ?>
    </head>
    
    <body>

        <?php
            
            //date_default_timezone_set('UTC');
            //echo date("l");
            //echo date('l jS \of F Y h:i:s A');

            $fecha_A = "19-03-2014";  // con fotmato Europeo
            if (formatoeuropeo($fecha_A)){
                setlocale(LC_TIME, "esp");
                echo ucfirst(strftime("%A, %d %B del %Y", 
                           strtotime($fecha_A)));
            }
            else{
                print ("<p>La fecha $fecha_A no está en 
                        formato europeo</p>\n");
            }
            
            
/*             function _fecha(){
               //$fecha= date ("j/n/Y H:i");
               $fecha=date('l jS \of F Y h:i:s A');
                //print("$fecha");
               return $fecha; 
             }

             echo "<br>La fecha es: ";
             echo _fecha(); */



            
	    ?>
    </body>
</html>
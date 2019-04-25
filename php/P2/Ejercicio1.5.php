<html>
    <body>
        
        <?php
            if (isset($_REQUEST['submit'])){
                $String= $_POST['String'];
                print("La cadena de datos enviados es: $String"."\n");
                $Palabras = explode(" ",$String);
                //echo $Palabras[0];
                //echo $Palabras[1];
                //echo $Palabras[2];
                //print_r(substr($Palabras[0],0,2));  "para coger las dos primeras letras de la palabra
                if ((substr($Palabras[0],-2)) == (substr($Palabras[1],0,2))){
                    if ((substr($Palabras[1],-2)) == (substr($Palabras[2],0,2))){
                        print("<br>las palabras de la cadena estan encadenadas". "\n");
                    }else{
                        print("<br>las palabras de la cadena no estan encadenadas". "\n");
                    }
                }
            }


            else {
        ?>
            <form action="Ejercicio1.5.php" method="POST">
                    Datos: <input type="text" name="String">
                    <input type="submit" name="submit" value="Enviar">

            </form>
        <?php
            }

        ?>
    </body>
</html>
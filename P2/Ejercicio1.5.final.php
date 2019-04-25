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
                //echo "Hay ".str_word_count($String, 0). " palabras en la cadena '$String'";
                $encadenada=true;
                for ($i=0; $i<count($Palabras)-1; $i++){
                    if ((substr($Palabras[$i],-2)) != (substr($Palabras[$i+1],0,2))){
                        print("<br>las palabras de la cadena no estan encadenadas". "\n");
                        $encadenada=false;
                    }
                    else ($encadenda){
                        echo "<br>";
                        echo ($Palabras[$i]);
                        echo "<br>";
                        echo ($Palabras[$i+1]);
                        $i++;
                        print("<br>las palabras de la cadena estan encadenadas". "\n"); 
        
                    }

                }
            }


            else {
        ?>
            <form action="Ejercicio1.5.final.php" method="POST">
                    Datos: <input type="text" name="String">
                    <input type="submit" name="submit" value="Enviar">

            </form>
        <?php
            }

        ?>
    </body>
</html>
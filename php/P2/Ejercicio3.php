<html>
    <body>
        
        <?php
            if (isset($_REQUEST['submit'])){
                $Valor1= $_POST['Valor1'];
                $Valor2= $_POST['Valor2'];
                print("El primer valor es: $Valor1"."\n");
                echo "<br>";
                print("El segundo valor es: $Valor2"."\n");
                echo "<br>";
                $Operacion= $_POST['Operacion'];
                print($Operacion);
                if ($Operacion=='S'){
                    $Resultado=$Valor1+$Valor2;
                    echo "<br>";
                    print($Resultado);
                }
                elseif ($Operacion=='R'){
                    $Resultado=$Valor1-$Valor2;
                    echo "<br>";
                    print($Resultado);
                }
                elseif ($Operacion=='D'){
                    $Resultado=$Valor1/$Valor2;
                    echo "<br>";
                    print($Resultado);
                }
                elseif ($Operacion=='M'){
                    $Resultado=$Valor1*$Valor2;
                    echo "<br>";
                    print($Resultado);
                }

               


            }


            else {
        ?>
            <form action="Ejercicio3.php" method="POST">
                    Valor1: <input type="text" name="Valor1">
                    Valor2: <input type="text" name="Valor2">
                    Operacion:
                    <INPUT TYPE="radio" NAME="Operacion" VALUE="S" CHECKED>Suma
                    <INPUT TYPE="radio" NAME="Operacion" VALUE="R">Resta
                    <INPUT TYPE="radio" NAME="Operacion" VALUE="D">Division
                    <INPUT TYPE="radio" NAME="Operacion" VALUE="M">Multiplicacion
                    <input type="submit" name="submit" value="Enviar">

            </form>
        <?php
            }

        ?>
    </body>
</html>
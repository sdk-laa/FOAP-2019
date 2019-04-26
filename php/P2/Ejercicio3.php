
<?php
    if (isset($_REQUEST['submit'])){
         $Valor1= $_POST['Valor1'];
         $Valor2= $_POST['Valor2'];
        print("El primer valor es: $Valor1"."\n");
        echo "<br>";
        print("El segundo valor es: $Valor2"."\n");
        echo "<br>";
        $Operacion= $_POST['Operacion'];
        print("La operacion es: ".$Operacion);
        if ($Operacion=='Suma'){
            $Resultado=$Valor1+$Valor2;
            echo "<br>";
            print("El resultado de la operacion es: ".$Resultado);
        }
        elseif ($Operacion=='Resta'){
            $Resultado=$Valor1-$Valor2;
            echo "<br>";
            print("El resultado de la operacion es: ".$Resultado);
        }
        elseif ($Operacion=='Division'){
            $Resultado=$Valor1/$Valor2;
            echo "<br>";
            print("El resultado de la operacion es: ".$Resultado);
        }
        elseif ($Operacion=='Multiplicacion'){
            $Resultado=$Valor1*$Valor2;
            echo "<br>";
            print("El resultado de la operacion es: ".$Resultado);
        }
    }

    else {
?>
    <form action="Ejercicio3.php" method="POST">
            Valor1: <input type="number" name="Valor1" id="">
            Valor2: <input type="number" name="Valor2" id=""> 
            
            Operacion:
            <INPUT TYPE="radio" NAME="Operacion" VALUE="Suma" CHECKED>Suma
            <INPUT TYPE="radio" NAME="Operacion" VALUE="Resta">Resta
            <INPUT TYPE="radio" NAME="Operacion" VALUE="Division">Division
            <INPUT TYPE="radio" NAME="Operacion" VALUE="Multiplicacion">Multiplicacion
            
            <input type="submit" name="submit" value="Enviar">

    </form>
<?php
    }

?>

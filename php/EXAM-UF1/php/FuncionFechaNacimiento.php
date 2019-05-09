<?php
/*     $fecha='02/03/1991';
    $f=ValidDate($fecha);
    echo $f . "<br>";
    
    function ValidDate($fecha){
        $valores = explode('/', $fecha);
        //echo $valores;
        if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
            echo $valores[1]. "<br>";
            echo $valores[0]. "<br>";
            echo $valores[2]. "<br>";
            return true;
        }
        return false;
    } */

    $date='199/10';
    $c=validateDate($date);
    echo $c . "<br>";
    function validateDate($date){
        $d = strtotime($date);
        echo $d . "<br>";
        return ($d>=1) ? 1 : 0;
    }



?>

<!-- <html>
    <body>
        <form action="" method="post">
            Selecciona su fecha de nacimiento:
            <input type="date" name="FechaNacimiento" min="1950-01-01" max="2030-12-01" step="">


        </form>
    </body>

</html> -->
<?php
    function validateDate($fecha){
        $d = strtotime($fecha);
        return ($d>=1) ? 1 : 0;
    }


    function calcularEdad($fecha){
        list($ano,$mes,$dia) = explode("-",$fecha);
        $ano_diferencia = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia = date("d") - $dia;
            if ($dia_diferencia < 0 && $mes_diferencia <= 0)
                $ano_diferencia--;
        return $ano_diferencia;
    }

    function valida_contrasena($Password,$Errores){
        if(strlen($Password) < 6 || strlen($Password) > 8){
            $Errores = $Errores . "<li>La contraseña debe tener entre 6 y 8 caracteres</li>";
        }
        if (!preg_match('/[a-z]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos una letra minúscula</li>";
        }
        if (!preg_match('/[A-Z]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos una letra mayúscula</li>";
        }
        if (!preg_match('/[0-9]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos un caracter numérico</li>";
        }
        if (!preg_match('/[#~$%!]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos un caracter de estos ' #~$%!& '</li>";
        }
        return $Errores;
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


?>
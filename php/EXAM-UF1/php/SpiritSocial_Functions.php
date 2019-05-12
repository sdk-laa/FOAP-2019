<?php
    function validateDate($fecha){  //Funcion para validar fecha
        $d = strtotime($fecha);
        return ($d>=1) ? 1 : 0;
    }

    function calcularEdad($fecha){  //Funcion para calcular edad desde la fecha de nacimiento
        list($ano,$mes,$dia) = explode("-",$fecha);
        $ano_diferencia = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia = date("d") - $dia;
            if ($dia_diferencia < 0 && $mes_diferencia <= 0)
                $ano_diferencia--;
        return $ano_diferencia;
    }

    function valida_contrasena($Password,$Errores){  //Funcion para validar contraseña
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

    function test_input($data) {  //Funcion para eliminar espacios y barras, y convertir carracteres especiales en entidades de html
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function valida_Title($Title,$TitleError){  //Funcion para validar el titulo con minimo 10 caracteres y que lleve solo caracteres
        if(strlen($Title) < 10 ){
            $TitleError = $TitleError . "<li>The Title must have a minimum of 10 characters</li>";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$Title)) {
            $TitleError = $TitleError . "<li>Only letters and white space allowed</li>"; 
        }
        return $TitleError;
    }

    function valida_Description($Description,$DescriptionError){  //Funcion para validar la descripcion con minimo 500 caracteres y que lleve solo caracteres
        if(strlen($Description) < 500 ){
            $DescriptionError = $DescriptionError . "<li>The Description must have a minimum of 500 characters</li>";
        }
        if (!preg_match("/^[a-zA-Z ]*$/",$Description)) {
            $DescriptionError = $DescriptionError . "<li>Only letters and white space allowed</li>"; 
        } 
        return $DescriptionError;
    }

?>
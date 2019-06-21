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
        if(strlen($Password) < 4 || strlen($Password) > 8){
            $Errores = $Errores . "<li>La contraseña debe tener entre 4 y 8 caracteres</li>";
        }
        /* if (!preg_match('/[a-z]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos una letra minúscula</li>";
        } */
        /* if (!preg_match('/[A-Z]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos una letra mayúscula</li>";
        } */
        /* if (!preg_match('/[0-9]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos un caracter numérico</li>";
        } */
        /*if (!preg_match('/[#~$%!]/',$Password)){
            $Errores = $Errores . "<li>La contraseña debe tener al menos un caracter de estos ' #~$%!& '</li>";
        } */
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
        return $DescriptionError;
    }

    function ConnectDB(){
        // dades de configuració
        $ip = 'localhost';
        $usuari = 'prova';  // 'prova'  //sdk_spiritsocia
        $pass = 'prova';                   // 'prova'  // '' 
        $db_name = 'prova';   // 'prova'  //spiritsocial
        
        // connectem amb la db
        $con = mysqli_connect($ip,$usuari,$pass,$db_name);
        if (!$con)  {
                echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
                echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
        }else{// echo "todo ha ido bien<br>";
        }

        /*
            Codigo de consultas
        */

        //Cerrar conexion:
        //mysqli_close($con);
        return $con;
    }

    function CloseDB($con){
        mysqli_close($con); //Cerrar conexion:
    }

    function checklogin($username,$password){
        $retorna=false;
        // Conectar a la base de datos:
        $con=ConnectDB();

        // Codigo de la consulta a la base de datos:
        $sql = 'SELECT * FROM usuarios where User="'.$username.'" and Password="'.$password.'"  ';
        $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));

        if($resultat->num_rows==1){
            $retorna=true;
        }
        //echo "num_rows= ".$resultat->num_rows;
        
        // tancar cx amb la db
        CloseDB($con);
        return $retorna;
    }

    function newuser($name, $Apellido, $FechaNacimiento, $email, $nom, $password){
        // Conectar a la base de datos:
        $con=ConnectDB();
        
        // Codigo de la consulta a la base de datos:
        $sql = "insert into usuarios (Name, Surname, Birthdate, Email, User, Password) values ('$name', '$Apellido', '$FechaNacimiento', '$email', '$nom',md5('$password') )";
        $resultat = mysqli_query($con,$sql) or die('Consulta fallida: ' . mysqli_error($con));
        
        // tancar cx amb la db
        CloseDB($con);
    }

    function UpdateUser($name, $Apellido, $fecha, $email, $nom, $id){
        // Conectar a la base de datos:
        $con=ConnectDB();

        // Codigo de la consulta a la base de datos:
        $UpdateUser = "update usuarios set  Name='$name', Surname='$Apellido', Birthdate='$fecha', Email='$email', User='$nom' where id='$id'";
        $resultat3 = mysqli_query($con,$UpdateUser) or die('Consulta fallida: ' . mysqli_error($con));
        
        // tancar cx amb la db
        CloseDB($con);
    }

?>
<?php
   $nameError = $emailError = $ApellidoError = $EdadError = "";
   $name = $email = $Apellido = $Edad = $comment = "";
   if(isset($_REQUEST['submit'])){
        if (empty($_POST["name"])) {
                $nameError = "Name is required";
        } 
        else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameError = "Only letters and white space allowed"; 
                }
        }
        
        if (empty($_POST["email"])) {
                $emailError = "E-mail is required";
        } 
        else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailError = "Invalid email format"; 
                }
        }
        
        if (empty($_POST["surname"])) {
                $ApellidoError = "";
        } 
        else {
                $Apellido= test_input($_POST["surname"]);
                if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $ApellidoError = "Only letters and white space allowed"; 
                }
        }

        if (empty($_POST["age"])) {
            $Edad = "";
            //$id = $_GET['id'];
        } 
        elseif ((is_numeric($Edad))$Edad<=18){
            $Edad = "Error";
        }
        else {
            $Edad= test_input($_POST["age"]);
        }
        
        if (empty($_POST["comment"])) {
                $commentError = "";
        } 
        else {
                $comment = test_input($_POST["comment"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>
<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
        <title>Ejemplo de validación de formulario PHP</title>
    </head>
    
    <body>
        <h2>Ejemplo de validación de formulario PHP</h2>
        <p><span class="error">* required field</span></p>

        <form action="Ejercicio8.php" method="POST">

            Name:     <input type="text" name="name" value="<?php echo $name;?>">
            <span class="error">* <?php echo $nameError;?></span>
            <br><br>
            Apellido: <input type="text" name="surname" value="<?php echo $surname;?>">
            <br><br>
            Edad:     <input type="text" name="age" value="<?php echo $age;?>">
            <br><br>
            E-mail:   <input type="text" name="email" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailError;?></span>
            <br><br>
            Comment:  <textarea name="comment" rows="5" cols="40" <?php echo $comment;?>></textarea>
            <br><br>
            <input type="submit" name="submit" value="OK">
        </form>
    </body>
</html>
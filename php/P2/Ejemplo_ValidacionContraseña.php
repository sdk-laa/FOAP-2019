<?php
    $MostrarF=true;
    $Registar=true;
    $User=$Password=$RPassword="";
    $UserError=$PasswordError=$RPasswordError="";
    if(isset($_REQUEST['submit'])){
        if(empty($_POST["User"])){
            $UserError="User is required"; 
        }
        else {
            $User = test_input($_POST["User"]);
        }

        if(empty($_POST["Password"])){
            $PasswordError="Password is required";
        }
        else {
            $Password = test_input($_POST["Password"]);
        }

        if(empty($_POST["RPassword"])){
            $RPasswordError="Repeat Password is required";
        }
        else {
            $RPassword = test_input($_POST["RPassword"]);
        }

        if ((!empty($_POST["Password"])) && (!empty($_POST["RPassword"]))){
            $Password = $_POST["Password"];
            //echo ($Password);
            $RPassword = $_POST["RPassword"];
            //echo ($RPassword);
            if($Password != $RPassword){
                $MostrarF=true;
                $Registar=false;
                //echo "Las contraseñas no coinciden";
            }
            else{
                $MostrarF=false;
                $Registar=true;
                //echo "Todo correcto";
            }
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
        <title>PHP Password validation example</title>
    </head>
    
    <body>
        <?php
            if ($MostrarF==true){
                
        ?>

        <h2>PHP Password validation example</h2>
        <p><span class="error">* required field</span></p>

        <form action="Ejemplo_ValidacionContraseña.php" method="POST">

            <label>User:</label>     
            <input type="text" name="User" value="<?php echo $User;?>">
            <span class="error">* <?php echo $UserError;?></span>
            <br><br>
            <label>Password:</label> 
            <input type="Password" name="Password" value="<?php echo $Password;?>">
            <span class="error">* <?php echo $PasswordError;?></span>
            <br><br>
            <label>Repeat Password:</label>     
            <input type="Password" name="RPassword" value="<?php echo $RPassword;?>">
            <span class="error">* <?php echo $RPasswordError;?></span>
            <br><br>
            <label><input type="submit" name="submit" value="Validar"></label>
        </form>

        <?php 
                if ($MostrarF==true && $Registar==false){
                ?>   
                    <p><span class="error">* Las contraseñas no coinciden</span></p>
                <?php
                }
                
            
            }
            else{
                echo "Bienvinido: ".$User;
            }

     

                //<p><span class="error">* Las contraseñas no coinciden</span></p>

            ?>
    </body>
</html>
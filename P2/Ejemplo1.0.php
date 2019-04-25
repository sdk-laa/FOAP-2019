<html>
    <body>
        
        <?php
            if (isset($_POST['submit'])){
                $edad= $_POST['edad'];
                print("La edad es: $edad");
            }
            else {
        ?>
            <form action="Ejemplo1.0.php" method="POST">
                    edad: <input type="text" name="edad">
                    <input type="submit" name="submit" value="aceptar">

            </form>
        <?php
            }
        ?>
    </body>
</html>
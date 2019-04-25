<html>
    <body>
        
        <?php
            if (isset($_REQUEST['submit'])){
                $Datos= $_POST['Datos'];
                print("Los datos enviados son: $Datos");
            }
            else {
        ?>
            <form action="Ejercicio1.0.php" method="POST">
                    Datos: <input type="text" name="Datos">
                    <input type="submit" name="submit" value="Enviar">

            </form>
        <?php
            }
        ?>
    </body>
</html>
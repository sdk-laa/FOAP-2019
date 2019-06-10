<?php
    $con=connectDB();
    $delete = 'DELETE FROM usuarios WHERE id="$_GET['id']" ';
    $resultat2 = mysqli_query($con,$delete) or die('Consulta fallida: ' . mysqli_error($con));
    header('Location:SpiritSocial-Usuarios.php');

?>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Eliminar un registro</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Seguro que quiere eliminar este registro?</p><br>
                            <p>
                                <input type="submit" value="Si" class="btn btn-danger">
                                <a href="crud_prueba.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
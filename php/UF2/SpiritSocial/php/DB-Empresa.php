<?php    
    // dades de configuració
    $ip = 'localhost';
    $usuari = 'root';
    $pass = '';
    $db_name = 'empresa';
    
    // connectem amb la db
    $con = mysqli_connect($ip,$usuari,$pass,$db_name);
    if (!$con)  {
            echo "Ha fallat la connexió a MySQL: " . mysqli_connect_errno();
            echo "Ha fallat la connexió a MySQL: " . mysqli_connect_error();
    }else{
       // echo "todo ha ido bien<br>";
    }
    $select = 'SELECT * FROM clients';
    $resultat = mysqli_query($con,$select) or die('Consulta fallida: ' . mysqli_error($con));
  

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../css/estilo.css" />
</head>
 
<body>
<div id="wrapper">
        <header> <!-- Encabezado -->
            <div class='define'>
            <div style= "width:200px"> <h2> Spirit Social </h2></div> 
            </div>
        </header>

        <section>  <!-- Contenido de la pagina -->
            <div class='define'>
                <div style="float:left"> <img src= "../imgs/SpiritSocial-2.jpg" alt="Logo" height="150px" width="960px"></div>
                 <!--<div id ="logo"> <img src= "../imgs/SpiritSocial.jpg" alt="Logo" height="300px" width="500px"></div> -->
                <div id ="contenido">
                <form action="DB-Empresa.php" method="POST">
                
                    <table >
                        <tr>
                            <td>Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>Numero Cliente &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td>Limite de Credito &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        </tr>
                        <?php while($u = $resultat->fetch_assoc()){
                                ?>
                            <tr>
                                <td><?php echo $u['nom']; ?></td>
                                <td><?php echo $u['numclie']; ?></td>
                                <td><?php echo $u['limitcredit']; ?></td>
                            </tr>
                        <?php
                            }
                            mysqli_close($con);    
                        ?>
                    </table>
                </form>
                </div>
            </div>
        </section>
    </div>
 
    <footer>  <!-- Pie de pagina -->
        <div class='define'>
            <p>Al hacer clic en Registrar, aceptas nuestras Condiciones. Obtén más información sobre cómo recopilamos, usamos y compartimos tu información en la Política de datos, así como el uso que hacemos de las cookies y tecnologías similares en nuestra Política de cookies.</p>
        </div>
    </footer>
</body>
</html>

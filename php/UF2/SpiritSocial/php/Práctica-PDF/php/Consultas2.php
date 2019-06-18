<?php    
    // dades de configuració
    $ip = 'localhost';
    $usuari = 'sdk_spiritsocial';
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
    $select1 = 'SELECT nom FROM clients ORDER BY RAND() LIMIT 1';
    
    $NomClient = mysqli_query($con,$select1) or die('Consulta fallida: ' . mysqli_error($con));
    $v = $NomClient->fetch_assoc();
    $Cliente=$v['nom'];
    //echo $Cliente;
    $select2 = "SELECT c.* FROM comanda c INNER JOIN clients cl ON c.clie=cl.numclie AND cl.nom='$Cliente'";
    $resultat = mysqli_query($con,$select2) or die('Consulta fallida: ' . mysqli_error($con));
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
                    <form  method="POST">
                            <h2>Comandas del Cliente: <?php echo utf8_encode($Cliente);?></h2>
                        <table >
                            <tr>
                                <td>Numero Comanda &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>Fecha de comanda &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>Numero Cliente &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>Numero Representante &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td>Importe Total</td>
                            </tr>
                            <?php //echo "<br>";?>
                            <?php while($u = $resultat->fetch_assoc()){ ?>    
                            <tr>    
                                <td><?php echo utf8_encode($u['numcomanda']); ?></td>
                                
                                <td><?php echo utf8_encode($u['data']);?></td> 
                               
                               <td><?php echo utf8_encode($u['clie']); ?></td>
                               
                               <td><?php echo utf8_encode($u['rep_ven']);?></td> 
                                
                               <td><?php echo utf8_encode($u['import_total']);?></td> 
                            </tr>   
                               <?php //echo "<br>"; 
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
</html
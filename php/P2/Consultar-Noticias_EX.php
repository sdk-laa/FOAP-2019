<?php
    session_start();          
?>

<?php
    if(isset($_REQUEST["MenuPrincipal"])){
        header('Location:Login_OK_EX.php');
    }

/*     if(isset($_REQUEST["InsertarNoticias "])){
        header('Location:.php');
    } 
    if(isset($_REQUEST["EliminarNoticias "])){
        header('Location:.php');
    }  */            
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="../../CSS/estiloT.css" />
    
    
</head>
    <body>
   
        <div id="wrapper">
            <header>
                <div class='define'>
                    <h1>Noticias</h1> <!-- Titulo de pagina -->
                    <form action="Consultar-Noticias_EX.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="MenuPrincipal" value="Menu Principal">
                        <input type="submit" name="InsertarNoticias" value="Insertar Noticias">
                        <input type="submit" name="EliminarNoticias" value="Eliminar Noticias">
                        <br><br>
                    </form>

                </div>
            </header>
    
            <section>
                <div class='define'>
                    <!-- Continido de la pagina -->
                    <!--<a href="imgs/Liv-Bar.jpg"> Imagen</a>  esto espara un enlace-->
                    <img src= "imgs/Liv-Bar.jpg"  alt="Barca">
                    <p>Liverpool - Barça: frontera final </p>
                    <p>Partidazo de champions: El Liverpol se enfrenta al Barca en el Anfield Stadium, El Barça no necesita una exhibición. Ni siquiera ha de ganar. Una derrota también le puede valer. Lo único que ha de evitar es una debacle, un desastre deportivo como el de Roma la pasada temporada. El conjunto barcelonista acude al frío de Liverpool con el cálido abrigo del 3-0 del Camp Nou y lo hace con la firme intención de ponerle el lazo a la clasificación.El equipo blaugrana se halla a un pasito de disputar la novena final de la Champions de su historia, a un metro de estar el 1 de junio en el Metropolitano de Madrid. Sólo le queda franquear la última frontera, la del afamado Anfield, tierra de leyendas aunque los reds nunca hayan levantado en Europa un resultado tan adverso. </p>
                    
                    <br><br>
                    <br><br>
                    <img src= "imgs/Plantilla.jpg"  alt="Barca">
                    <p>Leo Messi y diez guerreros en Anfield </p>
                    <p>Quedan noventa minutos. Tiempo suficiente para que Anfield convierta un partido de fútbol en un infierno para el Barça. Que se lo digan al Real Madrid, que hace algunos años recibió un ‘chorreo’ de los  buenos, de esos que marcan. Los blancos, presididos por un presidente circunstancial al que le gustaba hablar más de la cuenta, se fueron con la cola entre las piernas de Liverpool. No es solo Roma, es el pasado y la historia lo que debe tener en cuenta Valverde a la hora de elegir su once y disponer la forma en la que salgan sus jugadores. Ya mostró el máximo respeto en la ida y el Barça acabó ganando 3-0. Ahora es imprescindible también acertar en todo.</p>
                    <br><br>
                    <br><br>


                </div>
            </section>
        </div>
    
        <footer>
            <div class='define'>
                <!-- Continido de pie de pagina -->
                <p>Gracias por visitar nuetra web</p>
            </div>
        </footer>


    </body>
</html>
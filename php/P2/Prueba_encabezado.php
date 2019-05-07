<!-- <header>
 Aquí irá la información del encabezado 
</header>
 
<div id="cuerpo">
     Aquí estará el contenido principal 
</div>
 
<footer>
     Este será nuestro pie de página 
</footer>-->


<!-- <html>
    <header>
        <h2>Mi sitio web</h2>
        <nav>
            <h3>Navega</h3>
            <ul>
                <li><a href="#">Sección 1</a></li>
                <li><a href="#">Sección 2</a></li>
                <li><a href="#">Sección 3</a></li>
                <li><a href="#">Sección 4</a></li>
            </ul>
        </nav>
    </header>

    <div id="cuerpo">
        <h2>Entrada</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla rutrum tempus lacus, sit amet molestie sapien iaculis vel. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Morbi in lorem sapien. Pellentesque tempor augue ut ipsum fringilla sodales. In fermentum facilisis lobortis. Aenean egestas porttitor eros, in accumsan diam rutrum vel. Phasellus et tellus in arcu faucibus placerat vitae id felis. Integer sit amet mauris ipsum. Integer interdum lorem quis metus venenatis sit amet mattis mauris adipiscing. Donec non lorem tortor. Sed arcu nulla, tincidunt sed faucibus vitae, bibendum sed lorem. Curabitur nec risus lorem, quis placerat mauris. Donec bibendum ipsum vel mi imperdiet quis ornare orci imperdiet. Nam vulputate scelerisque ipsum, ut vehicula sapien pretium sit amet. Mauris vehicula viverra lobortis. </p>
    </div>

    <footer>
        Todos los derechos reservados 2012, Mi sitio web. Diseñado por: xxxxx.
    </footer>
</html>   -->

<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html,body {
            height:100%;
        }
        /* Div que engloba el contenido de la página menos el footer */
        #wrapper {
            min-height:100%;
        }
        header {
            display:block;
            background:#ccc;
            padding:10px 0px;
        }
        section {
            overflow: auto;
            /* Definimos el padding inferior:
               50px del pie de pagina mas 10px de separacion
            */
            padding-bottom: 60px;
            /* Definimos un padding superior */
            padding-top:30px;
        }
        footer {
            position: relative;
            /* Altura total del footer en px con valor negativo */
            margin-top: -50px;
            /* Altura del footer en px. Se han restado los 5px del margen
               superior mas los 5px del margen inferior
            */
            height: 40px;
            padding:5px 0px;
            clear: both;
            background: #286af0;
            text-align: center;
            color: #fff;
        }
 
        /* Esta clase define la anchura del contenido y la posicion centrada 
           El contenido queda centrado y limitado, pero la cabecera y el pie
           llegan hasta los limites del navegador.
        */
        .define {
            width:960px;
            margin:0 auto;
        }
    </style>
</head>
 
<body>
    <div id="wrapper">
        <header>
            <div class='define'>
                <h1>Titulo de la página</h1>
            </div>
        </header>
 
        <section>
            <div class='define'>
                <p>GNU/Linux es uno de los términos empleados para referirse a la combinación del núcleo o kernel libre similar a Unix denominado Linux con el sistema GNU. Su desarrollo es uno de los ejemplos más prominentes de software libre; todo su código fuente puede ser utilizado, modificado y redistribuido libremente por cualquiera bajo los términos de la GPL (Licencia Pública General de GNU, en inglés: General Public License) y otra serie de licencias libres.</p>
                <br><p>Este ejemplo ha sido desarrollado para La Web del Programador </p>
            </div>
        </section>
    </div>
 
    <footer>
        <div class='define'>
            <p>Contenido del pie de página</p>
        </div>
    </footer>
</body>
</html>
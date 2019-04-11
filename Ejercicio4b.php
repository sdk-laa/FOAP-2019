<html>

</head>
		<title>PHP y HTML</title>
		<link rel="stylesheet2 type="text/css" href="estilo.css">
		<meta charset="UTF.8">
</head>

<body>
		<?php
            $numeros=array();
            $suma=0;
            $Max=0;
            $Min=100;
            for ($i=0; $i<10; $i++){
                $numeros[$i]=rand(0,100);
            } 
            foreach($numeros as $valor){
                $suma += $valor;
                if ($Max < $valor){
                    $Max=$valor;
                }
                if ($Min > $valor){
                    $Min=$valor;
                } 
                //print("<br>$valor</br>");
            }   
            echo "<br>La suma de los elementos del array es::</br>";
            echo "<br>$suma</br>";
            echo "<br>El maximo es::</br>";
            echo "<br>$Max</br>";
            echo "<br>El minimo es::</br>";
            echo "<br>$Min</br>";
            echo "<br>Contenido del array:</br>";
            print_r($numeros);
            echo "<br>";
            echo min($numeros);
            echo "<br>";
            echo max($numeros);
            echo "<br>";
            echo array_sum($numeros);
            echo "<br>";
/*             foreach($numeros as $valor){
                print("<br>$valor</br>");

            } */

            
		?>
</body>
</html>
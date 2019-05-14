<html>

</head>
		<title>PHP y HTML</title>
		<link rel="stylesheet2 type="text/css" href="estilo.css">
		<meta charset="UTF.8">
</head>

<body>
		<?php
			$resultado = 0;
			$i=0;
			
			while($i<=10){
				
					
				print("<p>La tabla de multiplicar del $i es:</p>");
				print("<table>");
				print("<tr>");
				print("<th>Multiplicacion</th>");
				print("<th>Resultado</th>");
				print("</tr>");
				$j=0;	
				while($j<=10){
					print("<tr>");
					$resultado = $i*$j;
					print("<td>$i x $j => </td>");
					print("<td> $resultado </td>");
					print("</tr>");
					$j++;
					
				}
				print("</table>");	
				$i++;
			}	
		?>
</body>
</html>
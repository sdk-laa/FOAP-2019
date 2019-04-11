<html>

</head>
		<title>PHP y HTML</title>
		<link rel="stylesheet2 type="text/css" href="estilo.css">
		<meta charset="UTF.8">
</head>

<body>
		<?php
			$resultado = 0;
			for($numero1=0; $numero1<=10; $numero1++){
				print("<p>La tabla de multiplicar del $numero1 es:</p>");
				print("<ul>\n");
				for($numero2=0; $numero2<=10; $numero2++){
					$resultado = $numero1 * $numero2;
					print("<li>$numero1 x $numero2 = $resultado </li>\n");
				}
				print("</ul>\n");
			}
		?>
</body>
</html>
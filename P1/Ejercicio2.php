<html>

</head>
		<title>PHP y HTML</title>
		<link rel="stylesheet2 type="text/css" href="estilo.css">
		<meta charset="UTF.8">
</head>

<body>
	<?PHP
		$mensaje_es="Hola";
		$mensaje_en="Hello";
		$idioma= "es"; //variable que decide el idioma de la pagina
		$mensaje= "mensaje_" . $idioma;
		print $mensaje;   //el primer contenido de la variable
		print $$mensaje; //lo equivalente a print $mensaje_es el segundo contenido de la variable
	?>
</body>
</html>
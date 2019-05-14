<html>
<body>
<script language="javascript">
var i = 0;

function contador()
{
i = i + 1;
var btn = document.getElementById("boton");
btn.value = "Presiona Aqui (" + i + ")";
}
</script>
 
<input type="button" id="boton" value="Presiona Aqui" onclick="javascript: contador()" />
</body>
 
</html>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<!--<script src="js/jquery-1.9.1.min.js"></script>-->
 <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

<script>
$(document).ready(function() {
   // $("#resultadoBusqueda").html('<p>JQUERY VACIO</p>');
  $("#resultadoBusqueda");
});

function buscar() {
   // var	textoBusqueda=document.getElementById('busqueda').val();

  var textoBusqueda = $("input#busqueda").val();
 
     if (textoBusqueda != "") {
        $.post("buscar3.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
            $("#resultadoBusqueda").html(mensaje);
           if (mensaje == ""){
		document.getElementById("download_btn").disabled = false;
		};
	 });
     } else {
        $("#resultadoBusqueda"); //html('<p>JQUERY VACIO</p>');
        };
};
</script>

</head>
<body>

<form accept-charset="utf-8" method="POST">

<input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onchange="buscar();"/>

<input type="submit" value="Submit" id="download_btn"  disabled>


</form>
<div id="resultadoBusqueda"></div>
</body>
</html>

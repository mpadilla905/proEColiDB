<html>
<head>
  <meta charset="utf-8">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="stylesheet" href="./css/style_text.css">
  <link rel="stylesheet" href="./css/style_search.css">
  <link rel="stylesheet" href="./css/style_preregistry.css">
  <link rel="stylesheet" href="./css/style_logo.css">

	<script>
	$(document).ready(function() {
  		$("#resultadoBusqueda");
	});
	function buscar() {
 		 var textoBusqueda = $("input#busqueda").val();
   		 if (textoBusqueda != "") {
        	      $.post("search_preregistry.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                      $("#resultadoBusqueda").html(mensaje);
                      if (mensaje == ""){
                              document.getElementById("prereg_btn").disabled = false;
                      };
                 });
                 } else {
        $("#resultadoBusqueda"); //html('<p>JQUERY VACIO</p>');
        };
};
</script>

</head>

<body>
  <div id="header">
    <a href="home.php">
      <img id="logo" src="./imagenes/proEColiDB_logo.png">
    </a>
</div>
    <br></br>

<div class="reg_box">
<p class="title">Dump Download</p>
<p>If you have already registered, please enter your email</p>
<form method="POST" accept-charset="utf-8">
  <input name="busqueda" id="busqueda" type="text" placeholder="email" value="" maxlength="30" autocomplete="off" onchange="buscar();"/><br><br>
  <div id="resultadoBusqueda"></div>
  <input id="prereg_btn" type="submit" value="Download Dump" disabled onclick="window.open('RegistryForm.sql')">
  <?php //<button id="prereg_btn" type="submit" disabled onclick="window.open('RegistryForm.sql')"> Download Dump </button> ?>
</form>
<br><br>
<div id="reg_go">
Not registered?<a href="registry.php">Click here</a>
</div>
</div>
</body>
</html>

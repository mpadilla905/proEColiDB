<html>
<head>
  <meta charset="utf-8">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="stylesheet" href="./css/style_text.css">
  <link rel="stylesheet" href="./css/style_search.css">
  <link rel="stylesheet" href="./css/style_preregistry.css">
  <link rel="stylesheet" href="./css/style_button.css">

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
                              document.getElementById("link").style.visibility = "visible";
                      };
                 });
                 } else {
        $("#resultadoBusqueda"); //html('<p>JQUERY VACIO</p>');
        };
};
</script>

</head>

<body style="background-color:#616283;">
<br><br> <br></br>

<div class="reg_box">
<p class="title">Dump Download</p>
<p>If you have already registered, please enter your email</p>
<form method="POST" accept-charset="utf-8">
  <input name="busqueda" id="busqueda" type="text" placeholder="email" value="" maxlength="30" autocomplete="off"/><br><br>
</form>
 <button onClick="buscar();">search</button>
  <div id="resultadoBusqueda"></div>

  <a href='RegistryForm.sql' download style="visibility:hidden;" id="link">
  <button type="button" class="regbtn">Download Dump</button>
  </a>
<br></br>
<br><br>
<div id="reg_go">
Not registered?<a href="registry.php">Click here</a>
</div>
</div>
</body>
</html>

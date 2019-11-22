<html>
<head>
  <title> Download Dump </title>
  <meta charset="utf-8">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="stylesheet" href="./css/style_text.css">
  <link rel="stylesheet" href="./css/style_search.css">
  <link rel="stylesheet" href="./css/style_preregistry.css">
  <link rel="stylesheet" href="./css/style_button.css">
  <link rel="stylesheet" href="./css/style_searchpre3.css">
<link rel="icon" href="./imagenes/proEColi_slogo_trans.png" type="image/icon type">
<link rel="stylesheet" href="./css/style_logo.css">
  <link rel="stylesheet" href="./css/style_menuu.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

<div id="header">
<a href="home.php">
<img id="logo" src="./imagenes/proEColi_logo_trans.png">
</a>
<br></br>
<div id="menubar">
    <div id="menu">
    <button id="menu_bt">Menu </button>
    <div id="sub_menu">
      <a href="home.php">Home</a>
      <a href="about_us.php">About Us</a>
          <div id="download_menu">
          <button id="down_bt">Download Menu</button>
          <div id="sub_download">
            <a href="preregistry.php">Dump</a>
            <a href="datasets_down.php">Data Base</a>
          </div>
        </div>
     </div>
     </div>
    <form class="search_bar" method="get" action="preresults.php">
     <input type="text" placeholder="Search a gene" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>

    </form>
</div>
</div>



<body style="background-color:#616283;">
<br></br>

<div class="reg_box">
<p class="title">Dump Download</p>
<p>If you have already registered, please enter your email</p>
<form class="search_bar2" method="POST" accept-charset="utf-8">
  <input name="busqueda" id="busqueda" type="text" placeholder="email" value="" maxlength="30" autocomplete="off"/><br><br>
</form>
<button onClick="buscar();" class="search_button2"><i class="fa fa-search"></i></button>

  <div id="resultadoBusqueda"></div>
  <br></br>
  <a href='script_mysql.sql' download style="visibility:hidden;" id="link">
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

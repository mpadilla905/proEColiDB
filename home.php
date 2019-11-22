<html>
 <head>
  <meta charset="utf-8">
  <title> proEColiDB </title>
  <link rel="stylesheet" href="./css/style_logo.css">
  <link rel="stylesheet" href="./css/style_menuu.css">
  <link rel="stylesheet" href="./css/style_search.css">
  <link rel="stylesheet" href="./css/style_text.css">
  <link rel="stylesheet" href="./css/style_homecontent2.css">
  <link rel="icon" href="./imagenes/proEColi_slogo_trans.png" type="image/icon type">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/style_preresult5.css">

  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

  <script>

  $(document).ready(function() {
      // default (no input)
      $("#resultSearch").html('<table><th>Matches with search:</th><tr><td><p>No suggestions</p></tr></td>');
  });

  function buscar() {
      var textoBusqueda = $("input#search").val();

       if (textoBusqueda != "") {
          $.post("predict_search.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultSearch").html(mensaje);
           });
       } else {
          $("#resultSearch").html('<table><th>Matches with search:</th><tr><td><p>No suggestions</p></tr></td>');
          };
  };

  // change the input on search box when clicked on a predicted search
  function putOnInput(newValue) {
      $("input#search").val(newValue);
  };

  </script>

</head>
<body>
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
          <input type="text" placeholder="Search a gene" name="search" id="search" autocomplete="off" onKeyUp="buscar();"/>
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
  </div>
  <br></br><br></br>
  <div id="content">
    <div class="text">
      <p>proEColiDB is a database designed by students for the scientific community and anyone interested in basic knowledge about the Escherichia coli K-12 genome.</p>
      <p>With this web site we aim to provide a friendly place where you can find reliable information. </p>
    </div>
    <div id="resultSearch"></div>
  </div>
</body>
</html>

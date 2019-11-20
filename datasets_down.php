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
  <link rel="stylesheet" href="./css/style_preresult3.css">

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
        <form class="search_bar" method="get" action="results.php">
          <input type="text" placeholder="Search a gene" name="search" id="search" autocomplete="off" onKeyUp="buscar();"/>
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
  </div>
  <br></br><br></br>
  <div id = "content">
    <div class="text">
      <p><a href="dataset_gene.tsv" download> Download Gene Dataset </a></p><br>
      <p><a href="dataset_product.tsv" download> Download Gene Dataset </a></p><br>
      <p><a href="dataset_operon.tsv" download> Download Gene Dataset </a></p>
    </div>
  </div>
</body>
</html>

<html>
 <head>
  <link rel="stylesheet" href="./css/style_logo.css">
  <link rel="stylesheet" href="./css/style_menuu.css">
  <link rel="stylesheet" href="./css/style_search.css">
  <link rel="stylesheet" href="./css/style_text.css">
  <link rel="stylesheet" href="./css/style_homecontent.css">
  <link rel="icon" href="./imagenes/pEClogo.png" type="image/icon type">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="header">
<a href="home.php">
<img id="logo" src="./imagenes/proEColiDB_logo.png">
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
            <a href="#">Data Base</a>
	  </div>
        </div>
     </div>
     </div>
    <form class="search_bar" method="get" action="result.php">
      <input type="text" placeholder="Search a gene" name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
</div>
<br></br><br></br>
<div id="content">
<img id="home_img" src="./imagenes/ecoli.jpg">
<div class="text">
<p>proEColiDB is a database designed by students for the scientific community and anyone interested in basic knowledge about the Escherichia coli K-12 genome.</p>
<p>With this web site we aim to provide a friendly place where you can find reliable information. </p>
</div>
</div>
</body>
</html>

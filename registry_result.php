<html>
<head>
<link rel="stylesheet" href="./css/style_text.css">
<link rel="stylesheet" href="./css/style_preregistry.css">
<link rel="stylesheet" href="./css/style_button.css">
<link rel="stylesheet" href="./css/style_logo.css">
  <link rel="stylesheet" href="./css/style_menuu.css">
  <link rel="stylesheet" href="./css/style_search.css">


</head>
<body style="background-color:#616283;">
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
         </div>
        <form class="search_bar" method="get" action="results.php">
          <input type="text" placeholder="Search a gene" name="search" id="search" autocomplete="off" onKeyUp="buscar($
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
  </div>

<?php
	$user= escapeshellcmd($_POST["user"]);
	$mail= escapeshellcmd($_POST["mail"]);
	$name= escapeshellcmd($_POST["name"]);
	$lastname= escapeshellcmd($_POST["lastname"]);
	$institute= escapeshellcmd($_POST["institute"]);
	$reason= escapeshellcmd($_POST["reason"]);


	$mysqli = new mysqli("localhost:3306", "sophia", "genomaliigh", "RegistryForm");
        if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else{
	$mysqli->query("insert into User (user_nickn,user_name,user_lastname,user_email,user_institute,user_reason) values('$user','$name','$lastname','$mail','$institute','$reason')");
	?>
        <br><br>
        <div class="reg_box">
        <p class="title">Registry done successfully</p>
        <br></br>
        <a href='RegistryForm.sql' download id="link">
        <button type="button" class="regbtn">Download Dump</button>
        </a>
       </div>
<?php
	}

        $res->close();
        $mysqli->close();
        ?>
</body>
</html>


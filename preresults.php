<! pagina de busqueda de pre-resultados , linked to results.php>
<head>
  <title> proEColiDB </title>
  <link rel="stylesheet" href="./css/style_logo.css">
  <link rel="stylesheet" href="./css/style_menuu.css">
  <link rel="stylesheet" href="./css/style_search.css">
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
                <a href="#">Data Base</a>
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
  <?php
  // archivo de conexion a db
  require('connectdb.php');

  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  // Recepcion de variables
  $consultaSearch = escapeshellcmd( $_GET["search"] );

  // Filtro anti-XSS
  $caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
  $caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
  $consultaSearch = str_replace($caracteres_malos, $caracteres_buenos, $consultaSearch);

  // Variable vacía (para evitar los E_NOTICE)
  $resultado = "";

  // Comprueba si $consultaBusqueda está seteado
  if (isset($consultaSearch)) {


      // Consultas a DB y escribir resultado

      // return result corresponding to the search filter
      //if( $option == 'GENE'){
        $selectGene = "SELECT gene_name FROM GENE WHERE gene_name LIKE '".$consultaSearch."%'";
        $consulta = mysqli_query($conexion, $selectGene);

        // Obtiene la cantidad de filas que hay en la consulta
        $filasG = mysqli_num_rows($consulta);


        // Empezar pagina de resultados para el gen solicitado
        $resultado .= "<br><br><table>";
        $resultado .= "<th>  Gene matches with '".$consultaSearch."': </th>";
        // Si no existe el gen, que lo diga
        if($filasG === 0) {
              $result .= "<tr><td> No results found for ".$consultaSearch." </td></tr>";
        } else {
            // Obtener campos
            while( $res_campos = mysqli_fetch_array($consulta) ){
                $val = $res_campos['gene_name'];
                $ref = "http://localhost/proEColiDB/results.php?search=".$val."";
                //$resultado .= "<tr><td><p onclick=putOnInput(\"".$val."\")>".$val."</p></tr></td>";
                $resultado .= "<tr><td><a href=".$ref.">  ".$val."</a></tr></td>";
            }
              //$resultado .= "</table>";
        }

        // Checar tambien por sinonimos
        $consultaSyn = mysqli_query($conexion, "SELECT o.object_synonym_name, g.gene_name FROM GENE g, OBJECT_SYNONYM o WHERE g.gene_id = o.object_id AND o.object_synonym_name LIKE '".$consultaSearch."%'");
        $filasS = mysqli_num_rows($consultaSyn);
        // Si no existe el gen, que lo diga
        if($filasG === 0) {
              $result .= "</table>";
        } else {
            // Obtener campos
            $resultado .= "<th> Synonyms </th>";
            while( $res_campos = mysqli_fetch_array($consultaSyn) ){
                //$val = $res_campos['gene_name'];
                $ref = "http://localhost/proEColiDB/results.php?search=".$res_campos['gene_name']."";
                $resultado .= "<tr><td><a href=".$ref." >".$res_campos['object_synonym_name']."</a></p></tr></td>";
                //$resultado .= "<tr><td><p onclick=putOnInput(\"".$val."\")>".$res_campos['object_synonym_name']."</p></tr></td>";
            }
            $resultado .= "</table>";
        }

  }
  // regresar resultados a jQuery
  echo $resultado;

   ?>

</body>
</html>

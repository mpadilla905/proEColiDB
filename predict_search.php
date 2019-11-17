<?php
// archivo de conexion a db
require('connectdb.php');

// Recepcion de variables
$consultaSearch = $_POST['valorBusqueda'];
//$option = $_POST['option'];

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
    $resultado .= "<table>";
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

    // $noSyn = array("ECK125121983","ECK125121987","ECK125121989","ECK125121991","ECK125121993","ECK125121995","ECK125121997","ECK125121999","ECK125122001","ECK125122003","ECK125122004","ECK125122006","ECK125122009","ECK125272700","ECK125272702","ECK125272704","ECK125272706","ECK125272708","ECK125272710","ECK125272712","ECK125272714");

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

  /*} // if GENE
  elseif ($option == 'TRANSCRIPTION UNIT') {
    $selectGene = "SELECT transcription_unit_name FROM TRANSCRIPTION_UNIT WHERE transcription_unit_name LIKE '" . $consultaSearch . "%'";
    $consulta = mysqli_query($conexion, $selectGene);
    $filas = mysqli_num_rows($consulta);

    $resultado .= "<table>";
    $resultado .= "<th>  Transcription Unit matches with '".$consultaSearch."': </th>";

    if($filas === 0) {
        $result .= "<tr><td> No results found for ".$consultaSearch." </td></tr>";
    } else {
        while( $res_campos = mysqli_fetch_array($consulta) ){
          $val = $res_campos['transcription_unit_name'];
          $resultado .= "<tr><td><p onclick=putOnInput(\"".$val."\")>".$val."</p></tr></td>";
        }
          $resultado .= "</table>";
    }
  } // elseif TU
  elseif ($option == 'OPERON') {
    $selectGene = "SELECT operon_name FROM OPERON WHERE operon_name LIKE '" . $consultaSearch . "%'";
    $consulta = mysqli_query($conexion, $selectGene);
    $filas = mysqli_num_rows($consulta);

    $resultado .= "<table>";
    $resultado .= "<th>  Operon matches with '".$consultaSearch."': </th>";

    if($filas === 0) {
        $result .= "<tr><td> No results found for ".$consultaSearch." </td></tr>";
    } else {
        while( $res_campos = mysqli_fetch_array($consulta) ){
          $val = $res_campos['operon_name'];
          $resultado .= "<tr><td><p onclick=putOnInput(\"".$val."\")>".$val."</p></tr></td>";
        }
          $resultado .= "</table>";
    }
  } // elseif OPERON
  elseif ($option == 'PROMOTER') {
    $selectGene = "SELECT promoter_name FROM PROMOTER WHERE promoter_name LIKE '" . $consultaSearch . "%'";
    $consulta = mysqli_query($conexion, $selectGene);
    $filas = mysqli_num_rows($consulta);

    $resultado .= "<table>";
    $resultado .= "<th>  Promoter matches with '".$consultaSearch."': </th>";

    if($filas === 0) {
        $result .= "<tr><td> No results found for ".$consultaSearch." </td></tr>";
    } else {
        while( $res_campos = mysqli_fetch_array($consulta) ){
          $val = $res_campos['promoter_name'];
          $resultado .= "<tr><td><p onclick=putOnInput(\"".$val."\")>".$val."</p></tr></td>";
        }
          $resultado .= "</table>";
    }
  }
  */
} // if isset

// regresar resultados a jQuery
echo $resultado;

 ?>

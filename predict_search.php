<?php
// archivo de conexion a db
require('connectdb.php');

// Recepcion de variables
$consultaSearch = $_POST['valorBusqueda'];
$option = $_POST['option'];

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
    $filas = mysqli_num_rows($consulta);

    // Empezar pagina de resultados para el gen solicitado
    $resultado .= "<table>";
    $resultado .= "<th>  Gene matches with '".$consultaSearch."': </th>";
    // Si no existe el gen, que lo diga
    if($filas === 0) {
          $result .= "<tr><td> No results found for ".$consultaSearch." </td></tr>";
    } else {
        // Obtener campos
        while( $res_campos = mysqli_fetch_array($consulta) ){
            $val = $res_campos['gene_name'];
            $resultado .= "<tr><td><p onclick=putOnInput(\"".$val."\")>".$val."</p></tr></td>";
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

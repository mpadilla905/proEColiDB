<?php
  // archivo de conexion a db
  require('connectdb.php');

  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  // Consulta a DB de genes
  $select = "SELECT tu.transcription_unit_name, o.operon_name, p.promoter_name FROM TRANSCRIPTION_UNIT tu, OPERON o, PROMOTER p WHERE tu.operon_id = o.operon_id AND tu.promoter_id = p.promoter_id";
  $consulta = mysqli_query($conexion, $select);

  ?>
  <br><br>
  <?php
    echo "transcription_unit_name\toperon_name\tpromoter_name<br>";

    while($res_campos = mysqli_fetch_array($consulta)){
        echo $res_campos['transcription_unit_name']."\t".$res_campos['operon_name']."\t".$res_campos['promoter_name']."<br>";
    }
    ?>

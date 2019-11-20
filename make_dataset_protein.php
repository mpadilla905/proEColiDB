<?php
  // archivo de conexion a db
  require('connectdb.php');

  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  // Consulta a DB de genes
  $select = "SELECT product_id, product_name, product_sequence, location, molecular_weigth, isoelectric_point FROM PRODUCT";
  $consulta = mysqli_query($conexion, $select);

  ?>
  <br><br>
  <?php
    echo "ProteinId\tProteinName\tLocation\tMolecular_weigth\tIsoelectric_point\tSynonyms\tProteinSeq<br>";

    while($res_campos = mysqli_fetch_array($consulta)){
        $gene_id = $res_campos['product_id'];
        $row = $gene_id."\t".$res_campos['product_name']."\t".$res_campos['location']."\t".$res_campos['molecular_weigth']."\t".$res_campos['isoelectric_point']."\t";

        $syn = "";
        // Obtener sinonimos
        $consultaSyn = mysqli_query($conexion, "SELECT object_synonym_name FROM OBJECT_SYNONYM WHERE object_id = '".$gene_id."' ");
        if( mysqli_num_rows($consultaSyn) === 0 ){
          $syn .= "NULL";
        } else {
          $a = 0;
          while( $res_campos_syn = mysqli_fetch_array($consultaSyn) ){
            if ($a == 0){
              $syn .= $res_campos_syn['object_synonym_name'];
              $a++;
            } else {
              $syn .= ",".$res_campos_syn['object_synonym_name'];
            }
          }
        }

        $row .= $syn."\t".$res_campos['product_sequence']."<br>";
        echo $row;
    }
    ?>

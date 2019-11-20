<?php
  // archivo de conexion a db
  require('connectdb.php');

  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  // Consulta a DB de genes
  $select = "SELECT gene_id, gene_name, gene_posleft, gene_posright, gene_strand, gene_sequence FROM GENE";
  $consulta = mysqli_query($conexion, $select);

  ?>
  <br><br>
  <?php
    echo "GeneId\tGeneName\tGenePosLeft\tGenePosRight\tGeneStrand\tGeneSynonyms\tGeneSeq<br>";

    while($res_campos = mysqli_fetch_array($consulta)){
        $gene_id = $res_campos['gene_id'];
        $row = $gene_id."\t".$res_campos['gene_name']."\t".$res_campos['gene_posleft']."\t".$res_campos['gene_posright']."\t".$res_campos['gene_strand']."\t";

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

        $row .= $syn."\t".$res_campos['gene_sequence']."<br>";
        echo $row;
    }
    ?>

<! pagina de resultados de busqueda>
<html>
  <head>
    <title> Results! </title>
    <link rel="stylesheet" href="./css/style_logo.css">
    <link rel="stylesheet" href="./css/style_menuu.css">
    <link rel="stylesheet" href="./css/style_search.css">
    <link rel="stylesheet" href="./css/style_text.css">
    <link rel="stylesheet" href="./css/style_results2.css">
    <link rel="icon" href="./imagenes/proEColi_slogo_trans.png" type="image/icon type">
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
          <form class="search_bar" method="get" action="preresult.php">
            <input type="text" placeholder="Search..." name="search" id="search" autocomplete="off"/>
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
      </div>
    </div>
    <?php
      // archivo de conexion a db
      require('connectdb.php');

      error_reporting(E_ALL);
      ini_set('display_errors', '1');

      // Receive variables and check the option of search
      $inputSearch = escapeshellcmd( $_GET["search"] );

      // Consulta a DB de genes
      $select = "SELECT gene_id, gene_name, gene_posleft, gene_posright, gene_strand, gene_sequence FROM GENE WHERE gene_name = '".$inputSearch."' ";
      $consulta = mysqli_query($conexion, $select);

      // Recibe numero de filas de consulta
      $filas = mysqli_num_rows($consulta);

      // Empezar pagina de resultados para el gen solicitado
      $ref_regulon = "http://regulondb.ccg.unam.mx/search?term=".$inputSearch."&organism=ECK12&type=All";
      $ref_ecocyc = "https://ecocyc.org/ECOLI/substring-search?type=NIL&object=".$inputSearch."&quickSearch=Quick+Search";
      ?>
      <br><br><table>
      <th>  Gene </th><th></th>
      <?php
      // Si no existe el gen, que lo diga
      if($filas === 0) {
        ?>
            <tr><td> No results found for <?= $inputSearch ?> </td></tr>
      <?php
        } else {
            // Obtener campos
            $res_campos = mysqli_fetch_array($consulta);
            $gene_id = $res_campos['gene_id'];
       ?>
           <tr>
             <td><b>Id:</b></td>
             <td> <?= $gene_id; ?> </td>
           </tr>
           <tr>
             <td><b>Name:</b></td>
             <td> <?= $res_campos['gene_name']; ?> </td>
           </tr>
           <tr>
             <td><b>Positions:</b></td>
             <td> <?= $res_campos['gene_posleft']; ?> -> <?= $res_campos['gene_posright']; ?></td>
           </tr>
           <tr>
             <td><b>Strand:</b></td>
             <td> <?= $res_campos['gene_strand']; ?> </td>
           </tr>
           <tr>
             <td><b>Sequence:</b></td>
             <td>  </td>
           </tr>
        <?php
            $syn = "";
            // Obtener sinonimos
            $consultaSyn = mysqli_query($conexion, "SELECT object_synonym_name FROM OBJECT_SYNONYM WHERE object_id = '".$gene_id."' ");
            if( mysqli_num_rows($consultaSyn) === 0 ){
              $syn .= "no synonyms found :(";
            } else {
              while( $res_campos_syn = mysqli_fetch_array($consultaSyn) ){
                $syn .= $res_campos_syn['object_synonym_name'].",";
              }
            }

         ?>
         <tr>
           <td><b>Synonyms:</b></td>
           <td>  <?= $syn; ?> </td>
         </tr>
         <tr>
           <td><b> External DBs:</b></td>
           <td> <a href=<?= $ref_regulon; ?> > '<?= $inputSearch; ?> in regulondb' </a>
           <a href=<?= $ref_ecocyc; ?> > '<?= $inputSearch; ?> in ecocyc' </a></td>
         </tr>
      <?php
        }
       ?>
         </table>
         <br><br>
         <table>
         <th>  Product </th><th></th>
      <?php
        // Tabla Producto: familia reguladora, motivos
        // Consulta a DB de proteina
        $select = "SELECT p.product_id, p.product_name, p.product_sequence, p.location, p.molecular_weigth, p.isoelectric_point FROM PRODUCT p, GENE_PRODUCT_LINK gpl WHERE p.product_id = gpl.product_id AND gpl.gene_id = '".$gene_id."' ";
        $consulta = mysqli_query($conexion, $select);

        // Recibe numero de filas de consulta
        $filas = mysqli_num_rows($consulta);

        // Si no existe el gen, que lo diga
        if($filas === 0) {
          ?>
              <tr><td> No results found in Protein </td></tr>
        <?php
          } else {
              // Obtener campos por producto
              while($res_campos = mysqli_fetch_array($consulta)){

                ?>
                    <tr>
                      <td><b>Id:</b></td>
                      <td> <?= $res_campos['product_id']; ?> </td>
                    </tr>
                    <tr>
                      <td><b>Name:</b></td>
                      <td> <?= $res_campos['product_name']; ?> </td>
                    </tr>
                    <tr>
                      <td><b>Sequence:</b></td>
                      <td> </td>
                    </tr>
                    <tr>
                      <td><b> Cellular location: </b></td>
                      <td> <?= $res_campos['location']; ?> </td>
                    </tr>
                    <tr>
                      <td><b>Molecular Weight:</b></td>
                      <td> <?= $res_campos['molecular_weigth']; ?> </td>
                    </tr>
                    <tr>
                      <td><b>Isoelectric Point: </b></td>
                      <td> <?= $res_campos['isoelectric_point']; ?> </td>
                    </tr>
                 <?php
                     $syn = "";
                     // Obtener sinonimos
                     $consultaSyn = mysqli_query($conexion, "SELECT object_synonym_name FROM OBJECT_SYNONYM WHERE object_id = '".$res_campos['product_id']."' ");
                     if( mysqli_num_rows($consultaSyn) === 0 ){
                       $syn .= "no synonyms found :(";
                     } else {
                       while( $res_campos_syn = mysqli_fetch_array($consultaSyn) ){
                         $syn .= $res_campos_syn['object_synonym_name'].",";
                       }
                     }
                  ?>
                  <tr>
                    <td><b>Synonyms:</b></td>
                    <td>  <?= $syn; ?> </td>
                  </tr>
                  <tr><td> </td><td> </td></tr>
               <?php
             } // while
          } // else
         ?>
           </table>
           <br><br>
           <table>
           <th>  Operon </th><th></th>
          <?php
          // Consulta a DB de TU
          $select = "SELECT tu.transcription_unit_name, o.operon_name, p.promoter_name FROM TU_GENE_LINK tgl, TRANSCRIPTION_UNIT tu, OPERON o, PROMOTER p WHERE tgl.gene_id = '".$gene_id."' AND tgl.transcription_unit_id = tu.transcription_unit_id AND tu.operon_id = o.operon_id AND tu.promoter_id = p.promoter_id";
          $consulta = mysqli_query($conexion, $select);

          // Recibe numero de filas de consulta
          $filas = mysqli_num_rows($consulta);

          // Si no existe el gen, que lo diga
          if($filas === 0) {
            ?>
                <tr><td> No results found in Operon </td></tr>
          <?php
            } else {
                // Obtener campos por producto
                while($res_campos = mysqli_fetch_array($consulta)){

                  ?>
                      <tr>
                        <td><b>Transcription Unit name:</b></td>
                        <td> <?= $res_campos['transcription_unit_name']; ?> </td>
                      </tr>
                      <tr>
                        <td><b>Operon Name:</b></td>
                        <td> <?= $res_campos['operon_name']; ?> </td>
                      </tr>
                      <tr>
                        <td><b>Promoter Name: </b></td>
                        <td> <?= $res_campos['promoter_name']; ?> </td>
                      </tr>
                 <?php
               } // while
            } // else
           ?>
         </table>

  </body>
</html>
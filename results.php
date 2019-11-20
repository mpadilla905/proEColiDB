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
                  <a href="datasets_down.php">Data Base</a>
                </div>
              </div>
           </div>
           </div>
          <form class="search_bar" method="get" action="preresults.php">
            <input type="text" placeholder="Search..." name="search" id="search" autocomplete="off"/>
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
      </div>
    </div>
          <br><br><table>
      <th>  Gene </th><th></th>
                 <tr>
             <td><b>Id:</b></td>
             <td> ECK120000050 </td>
           </tr>
           <tr>
             <td><b>Name:</b></td>
             <td> araC </td>
           </tr>
           <tr>
             <td><b>Positions:</b></td>
             <td> 70387 -> 71265</td>
           </tr>
           <tr>
             <td><b>Strand:</b></td>
             <td> forward </td>
           </tr>
           <tr>
             <td><b>Sequence:</b></td>
             <td><a href=./seqs/ECK120000050_seq.fa download > sequence.fa </a> <a href=./seqs/ECK120000050_seq.raw download > sequence_raw.txt </a></td>
           </tr>
                   <tr>
             <td><b>Synonyms:</b></td>
             <td>  EG10054,b0064,ECK0065 </td>
           </tr>
           <tr>
             <td><b> External DBs:</b></td>
             <td> <a href=http://regulondb.ccg.unam.mx/search?term=araC&organism=ECK12&type=All > 'araC in regulondb' </a>
             <a href=https://ecocyc.org/ECOLI/substring-search?type=NIL&object=araC&quickSearch=Quick+Search > 'araC in ecocyc' </a></td>
           </tr>
               </table>
         <br><br>
         <table>
         <th>  Product </th><th></th>
                            <tr>
                        <td><b>Id:</b></td>
                        <td> ECK120004526 </td>
                      </tr>
                      <tr>
                        <td><b>Name:</b></td>
                        <td> DNA-binding transcriptional dual regulator AraC </td>
                      </tr>
                      <tr>
                        <td><b>Sequence:</b></td>
                        <td><a href=./seqs/ECK120004526_seq.fa download > prod_sequence.fa </a> <a href=./seqs/ECK120000050_seq.raw download > prod_sequence_raw.txt </a></td>
                      </tr>
                      <tr>
                        <td><b> Cellular location: </b></td>
                        <td> cytosol </td>
                      </tr>
                      <tr>
                        <td><b>Molecular Weight:</b></td>
                        <td> 33.38400 </td>
                      </tr>
                      <tr>
                        <td><b>Isoelectric Point: </b></td>
                        <td> 6.9560000000 </td>
                      </tr>
                                         <tr>
                        <td><b>Synonyms:</b></td>
                        <td>  AraC </td>
                      </tr>
                      <tr><td> </td><td> </td></tr>
                            </table>
           <br><br>
           <table>
           <th>  Operon </th><th></th>
                                  <tr>
                          <td><b>Transcription Unit name:</b></td>
                          <td> araC </td>
                        </tr>
                        <tr>
                          <td><b>Operon Name:</b></td>
                          <td> araC </td>
                        </tr>
                        <tr>
                          <td><b>Promoter Name: </b></td>
                          <td> araCp </td>
                        </tr>
                        <tr><td> </td><td> </td></tr>
                            </table>

  </body>
</html>

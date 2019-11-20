<! pagina de registro 2, con validacion al final>

<html>
  <head>
    <title> Registry </title>
    <meta charset="utf-8">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style_registry2.css" />
    <link rel="stylesheet" type="text/css" href="./css/style_text.css" />
    <link rel="stylesheet" type="text/css" href="./css/style_fields.css" />
    <link rel="stylesheet" type="text/css" href="./css/style_button.css" />
   <link rel="icon" href="./imagenes/proEColi_slogo_trans.png" type="image/icon type">

    <script language = "JavaScript" >

      function validate(num) {
        var flag = 1, i;
        num = ( num == 5 )? [0,1,2,3,4] : [num];

        if( num[num.length-1] > 3){
          var campo = document.getElementById("mail").value;
          if( !campo.match(/^[a-zA-Z.]{2,}@\w{2,}(\.\w{2,}){1,2}$/) ){
            document.getElementById('mnr').style.visibility = "visible";
            flag = 0;
          }
        }
        if ( num[0] < 4){
          for (i = 0; i <= num.length-1; i++){
            if(num[i]==4){ break; }
            var campo = document.getElementById(num[i]).value;
            if( campo.match(/[0-9]/) || !campo.match(/[a-zA-Z]/) ){
              spanID = 'pelo'+ num[i];
              flag = 0;
              document.getElementById(spanID).style.visibility = "visible";
            }
          }
        }

        if(!flag){
          return false;
        }
      }

      function clean(spanID) {
          document.getElementById(spanID).style.visibility = "hidden";
      }
        //for checking email
                $(document).ready(function() {
                $("#resultadoBusqueda");
        });
        function buscar() {
                 var textoBusqueda = $("input#mail").val();
                 if (textoBusqueda != "") {
                      $.post("search_preregistry.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                      //$("#resultadoBusqueda").html(mensaje);
                      $("#resultadoBusqueda").html();
                        if (mensaje == ""){
                                document.getElementById("message").style.visibility = "visible";
                      }
                        else {
                               document.getElementById("registry_btn").disabled = false;
                                document.getElementById("message").style.visibility = "hidden";

                      };
                 });
                 } else {
        $("#resultadoBusqueda"); //html('<p>JQUERY VACIO</p>');
        };
        };

    </script>
</head>
<body style="background-color:#616283;">
<br><br></br>

<div class="reg_box">
      <br></br>
      <form id="form" name="form" method="POST" onsubmit="return validate(5)" action="registry_result.php" accept-charset="utf-8">
      <div id="normal" style="text-align: center;">Fill the registry to access the dump:</div><br></br>

      <br><label for="user">User:</label>
       <input class="field" id="user" name="user" type="text" required="required" size="25" /></br>
      <br><label for="mail">Mail:</label> <span id ="mnr" style="visibility:hidden; color:#FF0000;" > Mail Not Recognized </span></br>
       <input class="field" id="mail" name="mail" onchange="validate(4); buscar();" onclick="clean('mnr');" type="text" required="required" size="25" /><br>
      <br><label for="0">Name:</label> <span id ="pelo0" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
       <input class="field" id="0" name="name" onchange="validate(0)" onclick="clean('pelo0');" type="text" required="required" size="25" /><br>
      <br><label for="1">Lastname:</label> <span id ="pelo1" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
       <input class="field" id="1" name="lastname" onchange="validate(1)" onclick="clean('pelo1');" type="text" required="required" size="25" /><br>
      <br><label for="2">Institution of procedence:</label> <span id ="pelo2" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
       <input class="field" id="2" name="institute" onchange="validate(2)" onclick="clean('pelo2');" type="text" required="required" size="25" /><br>
      <br><label for="3">Reason for dumping proEColiDB:</label><span id ="pelo3" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
       <input class="field" id="3" name="reason" onchange="validate(3)" onclick="clean('pelo3');" type="text" required="required" size="25" />
      <br></br>
      <div id="resultadoBusqueda"></div>
      <br><span id ="message" style="visibility:hidden; color:#FF0000;" > Mail Already Registered </span></br>
      <input id="registry_btn" class="regbtn" type="submit" name="submit" value="Register" disabled/> 
     </br></br>
    </form>
</div>
</body>
</html>

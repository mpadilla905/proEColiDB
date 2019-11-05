<! pagina de registro 2 >

<html>
<head>
<title> Registro </title>
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<script language = "JavaScript" >

  function validate(num) {

    if( num == 5){
      num = [0,1,2,3,4] // check all fields at the end
    } else {
      num = [num]
    }
    var flag = 1;
    var i;

    if( num[num.length-1] > 3){
      var campo = document.getElementById("mail").value;
      if( !campo.match(/\w{2,}@\w{2,}(\.\w{2,})+/) ){
        alert("im in mail");
        document.getElementById('mnr').style.visibility = "visible";
        flag = 0;
      }
    }
      alert("num length"+num.length);
    if ( num[0] < 4){
      for (i = 0; i < num.length; i++){

        alert("i: "+i+"\n num[i]: "+num[i]);
        if(num[i]==4){ break; }
        var campo = document.getElementById(num[i]).value;
        if( campo.match(/[0-9]/) || !campo.match(/[a-zA-Z]/) ){
          alert("im in");
          id = 'pelo'+ num;
          document.getElementById(id).style.visibility = "visible";
          flag = 0;
        }

      }
    }

    if(!flag){
      return false;
    }
  }

  function clean(span) {
      document.getElementById(span).style.visibility = "hidden";
  }

</script>
</head>
<body>
<form id="form" name="form" method="get" onsubmit="return validate(5)" action="principal.php">
  <div id="normal"> Fill the registry to have access to the dump:</div><br>

  <br>User:
   <input class="field" id="user" type="text" required="required" size="25" /></br>
  <br>Mail:
   <input class="field" id="mail" onclick="clean('mnr');" type="text" required="required" size="25" />
   <span id ="mnr" style="visibility:hidden; color:#FF0000;" > Mail Not Recognized </span></br>
  <br>Name:
   <input class="field" id="0" onclick="clean('pelo0');" type="text" required="required" size="25" />
   <span id ="pelo0" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
  <br>Lastname:
   <input class="field" id="1" onclick="clean('pelo1');" type="text" required="required" size="25" />
   <span id ="pelo1" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
  <br>Institution of procedence:
   <input class="field" id="2" onclick="clean('pelo2');" type="text" required="required" size="25" />
   <span id ="pelo2" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
  <br>Reason for dumping proEColiDB:
   <input class="field" id="3" onclick="clean('pelo3');" type="text" required="required" size="25" />
   <span id ="pelo3" style="visibility:hidden; color:#FF0000;" > Please enter letters only </span></br>
  <br><br>

  Note: on submit dump will download automatically.<br></br>
  <input  class= "button" type="submit" name="submit" value="submit" />
  </br></br>
</form>

</body>
</html>


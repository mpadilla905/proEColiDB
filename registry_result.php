<html>
<head>
</head>
<body>
<?php
	$user= escapeshellcmd($_POST["user"]);
	$mail= escapeshellcmd($_POST["mail"]);
	$name= escapeshellcmd($_POST["name"]);
	$lastname= escapeshellcmd($_POST["lastname"]);
	$institute= escapeshellcmd($_POST["institute"]);
	$reason= escapeshellcmd($_POST["reason"]);


	$mysqli = new mysqli("localhost:3306", "sophia", "genomaliigh", "RegistryForm");
        if ($mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	else{
	$mysqli->query("insert into User (user_nickn,user_name,user_lastname,user_email,user_institute,user_reason) values('$user','$name','$lastname','$mail','$institute','$reason')");
	echo "Registry done successfully";
	}

        $res->close();
        $mysqli->close();
        ?>
</body>
</html>


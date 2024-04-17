<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

$login = &$_POST ["login"];
$name = &$_POST ["name"];
$surname = &$_POST ["surname"];
$email = &$_POST ["email"];
$user_id=&$_SESSION["user_id"];


require("connect.php");
if($login!="" && $email!="" && $user_id!="") {
	$strSQL1="UPDATE users SET login='".$login."', email='".$email."', name='".$name."', surname='".$surname."' WHERE user_id ='".$user_id."'";
	$result1=$mysqli->query($strSQL1) or die("Не могу выполнить запрос!");
	$_SESSION["login"]=$login;

	mysqli_close($mysqli);

	header("Location: cabinet.php?success=7");
	exit();
}	else {
	header("Location: cabinet.php?success=8");
	exit();
	
}

?>

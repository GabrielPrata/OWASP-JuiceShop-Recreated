<?php
$ip = "localhost";
$user = "root";
$pass = "";
$db = "juiceshop";

$conn = mysqli_connect($ip, $user, $pass, $db);

if (!$conn) {
	echo" <script language=javascript>
	window.alert('Erro ao conectar o banco de dados MySQL. Contate um administrador!');
	history.back()
	</script>";
	die();
}

?>
<?php

// inicia sessão para passar variaveis entre ficheiros php
session_start();

include('comum.php');

// Carregamento das variáveis username e pin do form HTML através do metodo POST;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = test_input($_POST["username"]);
	$pin = test_input($_POST["pin"]);
}

if(isset($username) && isset($pin)) {

	// Conexão à BD
	include('ligacao.php');

	// obtem o pin da tabela pessoa
	$sql = "SELECT * FROM pessoa WHERE nif='$username' and pin='$pin'";
	$result = $connection->query($sql);

	//$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

	if (!$result) {
		echo("<p> Erro na Query:($sql)<p>");
		exit();
	}

	foreach($result as $row){
		$safepin = $row["pin"];
		$nif = $row["nif"];
	}

	if (!isset($safepin) || $safepin != $pin) {
		echo "<p>Pin Invalido! Exit!</p>\n";
		echo("Tente de novo ;)");
		$connection = null;
		exit();
	}

	// passa variaveis para a sessao;
	$_SESSION['username'] = $username;
	$_SESSION['nif'] = $nif;
	$validado = True;
	$_SESSION['validado'] = $validado;

	
	header("refresh:0;url=listar.php");

} else {
	?>
	<form action="" method="post">
	<h2>Sistema de leilões de Recursos Marítimos</h2>
	<p>Introduza o seu nif: <input type="text" name="username" /></p>
	<p>Introduza o seu pin: <input type="text" name="pin" /></p>
	<p><input type="submit" /></p>
	</form>
	<?php
}

//termina a ligacao
$connection = null;

?>
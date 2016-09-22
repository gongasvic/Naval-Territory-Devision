<?php

// inicia sessão para passar variaveis entre ficheiros php
session_start();

include('comum.php');

// Carregamento das variáveis username e pin do form HTML através do metodo POST;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$lid = test_input($_POST["lid"]);
	$valor = test_input($_POST["valor"]);
}

if(!isset($_SESSION['validado']) || $_SESSION['validado'] == False) {
	echo("Utilizador não logado! Dentro de 3 sec irá para a página de login.");
	header("refresh:3;url=login.php");
} else {

	if(isset($lid)) {

	// Conexão à BD
	include('ligacao.php');

	$username = $_SESSION['username'];
	$nif = $_SESSION['nif'];

	$sql = "SELECT * FROM concorrente WHERE pessoa='$nif' and leilao='$lid'";
	$result = $connection->query($sql);
	if (!$result) {
		echo("Pessoa ($nif) não registada em leilao ($lid)");
		exit();
	}

	//regista a pessoa no leilão. Exemplificativo apenas.....
	$sql = "INSERT INTO lance (pessoa,leilao,valor) VALUES ($nif,$lid,$valor)";
	$result = $connection->query($sql);
	if (!$result) {
		echo("<p> Pessoa nao registada no leilao<p>\n");
		exit();
	}

	echo("<p> Pessoa ($username), nif ($nif) Registada no leilao ($valor)</p>\n");

	} else {
		 ?>
		<form action="" method="post">
		<h2>Escolha o ID do leilão que pretende concorrer</h2>
		<p>ID : <input type="text" name="lid" /></p>
		<p>Valor : <input type="text" name="valor" /></p>
		<p><input type="submit" /></p>
		</form>
		<?php
	}

}

//termina a ligacao
$connection = null;

?>
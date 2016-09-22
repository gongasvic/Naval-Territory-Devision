<?php

// inicia sessão para passar variaveis entre ficheiros php
session_start();

include('comum.php');

if(!isset($_SESSION['validado']) || $_SESSION['validado'] == False) {
	echo("Utilizador não logado! Dentro de 3 sec irá para a página de login.");
	header("refresh:3;url=login.php");
} else {	

	

	// Conexão à BD
	include('ligacao.php');

	$username = $_SESSION['username'];
	$nif = $_SESSION['nif'];

	echo("<p>Listar estado de leilões em curso:</p>\n");

	$today = date("Y-m-d");
	$todayArray = explode("-", $today);

	$sql =   "SELECT DISTINCT leilao.nome, leilao.nif, leilaor.lid FROM leilao, leilaor WHERE leilao.nif = leilaor.nif and leilao.dia = leilaor.dia and leilao.nrleilaonodia = leilao.nrleilaonodia and leilao.dia <'$today'";
	$result = $connection->query($sql);

	echo("<table border=\"1\">\n");
	echo("<tr>
		<td>nome</td>
		<td>nif</td>
		<td>lid</td>
		</tr>\n");
	foreach($result as $row) {
		echo("<tr>");
		echo("<td>");	echo ($row['nome']);		echo("</td>");
		echo("<td>");	echo ($row['nif']);		echo("</td>");
		echo("<td>");	echo ($row['lid']);		echo("</td>");
		echo("</tr>");

	}

	echo("</table>\n");

?>

	<a href="inscrever.php">Concorrer aos Leilõs</a></br>

	<a href="lance.php">Concorrer aos Lances</a></br>

	<a href="leilao.php">Listar Leilões</a></br>

<?php

	//termina a ligacao
	$connection = null;
}

?>

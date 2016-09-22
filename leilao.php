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

	echo("<p>Leilões em curso ou a iniciar:</p>\n");//ver se data de inicio mais duração é maior ou igual que dia de hoje

	$today = date("Y-m-d");
	$todayArray = explode("-", $today);

	// Apresenta os leilões
	$sql = "SELECT * FROM leilao";
	$result = $connection->query($sql);

	echo("<table border=\"1\">\n");
	echo("<tr>
		<td>ID</td>
		<td>nif</td>
		<td>NrDoDia</td>
		<td>nome</td>
		<td>tipo</td>
		<td>valorbase</td>
		</tr>\n");

	$idleilao = 0;

	foreach($result as $row){
		$idleilao++;
		echo("<tr>");
		echo("<td>");	echo($idleilao);				echo("</td>");
		echo("<td>");	echo($row["nif"]);				echo("</td>");
		echo("<td>");	echo($row["nrleilaonodia"]);	echo("</td>");
		echo("<td>");	echo($row["nome"]);				echo("</td>");
		echo("<td>");	echo($row["tipo"]);				echo("</td>");
		echo("<td>");	echo($row["valorbase"]);		echo("</td>");
		$leilao[$idleilao]= array($row["nif"],$row["nrleilaonodia"]);
	}
	echo("</table>\n");

?>

	<a href="inscrever.php">Concorrer aos Leilõs</a></br>

	<a href="listar.php">Retroceder</a></br>

<?php

	//termina a ligacao
	$connection = null;
}

?>
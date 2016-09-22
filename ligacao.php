<?php

$host="db.ist.utl.pt"; // o MySQL esta disponivel nesta maquina
$user="ist174262"; // -> substituir pelo nome de utilizador
$password="nvqz3117"; // -> substituir pela password dada pelo mysql_reset
$dbname = $user; // a BD tem nome identico ao utilizador

$connection = new PDO("mysql:host=" . $host. ";dbname=" . $dbname, $user, $password,
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

?>
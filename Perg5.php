
<?php
// Meter aqui o php da pergunta 2
/*

E ajustar com este código 

Exemplo

Transferir 350€ da conta A-101 para a conta A-102:
*/

select balance from account where account_number = 'A-101';
select balance from account where account_number = 'A-102';

start transaction;

update account set balance = balance – 350 where account_number = 'A-101';
update account set balance = balance + 350 where account_number = 'A-102';

commit;

//Se der Erro fazer WITH ROLLUP ou o Commut

?>


//O código 

<html>
	<body>
	<?php
	//This is PHP
	//Pass: ownz3360;
		try{
			$host = "db.ist.utl.pt";
			$user ="ist176436";
			$password = "ownz3360";
			$dbname = $user;
			$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT account_number, branch_name, balance FROM account;";
			$result = $db->query($sql);
			echo("<table border=\"1\">\n");
			echo("<tr><td>account_number</td><td>branch_name</td><td>balance</td></tr>\n");
			
			foreach($result as $row){
				echo("<tr><td>");
				echo($row['account_number']);
				echo("</td><td>");
				echo($row['branch_name']);
				echo("</td><td>");
				echo($row['balance']);
				echo("</td></tr>\n");
			}
			
			
			echo("</table>\n");
			$db = null;
		}
		catch (PDOException $e)
		{
			echo("<p>ERROR: {$e->getMessage()}</p>");
		}
	?>
	</body>
</html> 

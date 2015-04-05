<?php

function connect()
{
	// DB connection info
	$server = "tcp:vzwses3zoj.database.windows.net";
	$user = "evoting@vzwses3zoj";
	$pwd = "Salasona123";
	$db = "evoting";
	try{
		$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e){
		die(print_r($e));
	}
	return $conn;
}


if($_POST)
{
$conn = connect();
$q=$_POST['search'];
$sql_res=$conn->query("select LastName, FirstName from Persons where LastName like '%$q%' or FirstName like '%$q%' order by id LIMIT 5");
while($row=mysql_fetch_array($sql_res))
{
$perenimi=$row['LastName'];
$eesnimi=$row['FirstName'];
$b_perenimi='<strong>'.$q.'</strong>';
$b_eesnimi='<strong>'.$q.'</strong>';
$final_pereninimi = str_ireplace($q, $b_perenimi, $perenimi);
$final_eesnimi = str_ireplace($q, $b_eesnimi, $eesnimi);
?>
<div class="show" align="left">
<span class="name"><?php echo $final_perenimi; ?></span>&nbsp;<br/><?php echo $final_eesnimi; ?><br/>
</div>
<?php
}
}
?>

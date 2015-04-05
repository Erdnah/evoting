<?php

$server = "tcp:vzwses3zoj.database.windows.net";
$user = "evoting@vzwses3zoj";
$pwd = "Salasona123";
$db = "evoting";

$conn = new PDO( "sqlsrv:Server= $server ; Database = $db ", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
?>

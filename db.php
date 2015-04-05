<?php

$server = "tcp:vzwses3zoj.database.windows.net";
$user = "evoting@vzwses3zoj";
$pwd = "Salasona123";
$datab = "evoting";

$connection = mysql_connect($server,$user,$pwd) or die(mysql_error());
$database = mysql_select_db($datab) or die(mysql_error());
?>

<?php
session_start();

include_once 'taskmodel.php';

$array = getVoteData($_SESSION['id']);
$a = $array[0];

echo "Sa hääletasid $a[0] $a[1] poolt kuupäeval $a[2]";


?>
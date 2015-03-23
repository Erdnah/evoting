<?php

$id = $_REQUEST["id"];

include_once 'taskmodel.php';

$array = getUser($id);

echo "wtf " . $array[0][0];
?>
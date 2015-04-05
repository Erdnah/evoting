<?php

$id = $_REQUEST["id"];

include_once 'taskmodel.php';

$array = getUser($id);
echo "$array";
if ($array[7] == 1) {
    echo "1";
} else {
    echo "0";
}


?>
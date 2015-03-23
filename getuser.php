<?php

$id = $_REQUEST["id"];

include_once 'taskmodel.php';

echo "wtf" . getUser($id);

foreach (getUser($id) as $value) {
    echo "omgomg$value[0]";
}
?>
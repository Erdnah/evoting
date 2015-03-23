<?php

$id = $_REQUEST["id"];

include_once 'taskmodel.php';

foreach (getUser($id) as $value) {
    echo "$value[0]";
}
?>
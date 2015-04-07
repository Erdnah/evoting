<?php
session_start();

$id = $_REQUEST["id"];
$fbid = $_REQUEST["fbid"];

include_once 'taskmodel.php';

postVote($id, $_SESSION['id']);

?>
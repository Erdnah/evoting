<?php
session_start();
include_once 'taskmodel.php';

$id = $_GET["id"];
echo "$id";
die();

$kandidaat = getKandidaat($id, 'id');
$kandidaat = $kandidaat[0];
echo "<img src=\"//graph.facebook.com/$kandidaat[1]/picture??width=200&height=200\">
<br>
Lubadused: $kandidaat[4]";


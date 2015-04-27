<?php
session_start();
include_once 'taskmodel.php';

$id = $_SESSION['id'];

delVote($id);

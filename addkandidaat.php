<?php
session_start();
include_once 'taskmodel.php';
  $partei = htmlspecialchars($_POST['partei']);
  $linn  = htmlspecialchars($_POST['linn']);
  $info  = htmlspecialchars($_POST['info']);
  
  addKandidaat($_SESSION['id'], $linn, $partei, $info);

  header("Location: http://localhost/evoting/");
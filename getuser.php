<?php
session_start();

$id = $_REQUEST["id"];
$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];


include_once 'taskmodel.php';

$array = getUser($id);
if (count($array) == 0) {
    addUser($id, $fname, $lname);
    echo "Eesnimi: $fname</br>
    Perenimi: $lname</br>
    Aadress: Määramata</br>
    Linn: Määramata</br>
    Partei: Määramata</br>";
    setVars($id, $fname, $lname, 'Määramata', 'Määramata', 'Määramata', 0);
} else {
    $a = $array[0];
    echo "Eesnimi: $a[1]</br>
    Perenimi: $a[2]</br>
    Aadress: $a[3]</br>
    Linn: $a[4]</br>
    Partei: $a[5]</br>
    Hääletanud $a[7]</br>";
    setVars($a[0], $a[1], $a[2], $a[3], $a[4], $a[5], $a[7]);
}

function setVars ($id, $fname, $lname, $aadress, $linn, $partei, $onvote) {
    $_SESSION['id']=$id;
    $_SESSION['eesnimi']=$fname;
    $_SESSION['perenimi']=$lname;
    $_SESSION['aadress']=$aadress;
    $_SESSION['linn']=$linn;
    $_SESSION['partei']=$partei;
    $_SESSION['onvote']=$onvote;
}


?>
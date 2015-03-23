<?php

$id = $_REQUEST["id"];
$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];


include_once 'taskmodel.php';

$array = getUser($id);
if (count($array) == 0) {
    //addUser($id, $fname, $lname);
    echo "Eesnimi: $fname</br>
    Perenimi: $lname</br>
    Aadress: Määramata</br>
    Linn: Määramata</br>
    Partei: Määramata</br>";
} else {
    $a = $array[0];
    echo "Eesnimi: $a[1]</br>
    Perenimi: $a[2]</br>
    Aadress: $a[3]</br>
    Linn: $a[4]</br>
    Partei: $a[5]</br>";
}


?>
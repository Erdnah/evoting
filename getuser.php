<?php

$user = $_REQUEST["user"];

include_once 'taskmodel.php';

$array = getUser($user[0]);
if (count($array) == 0) {
    addUser($user[0], $user[1], $user[2]);
    echo "Eesnimi: $user[1]</br>
    Perenimi: $user[2]</br>
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
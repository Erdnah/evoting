<?php
session_start();

$id = $_REQUEST["id"];
$fname = $_REQUEST["fname"];
$lname = $_REQUEST["lname"];


include_once 'taskmodel.php';
setVars($id, $fname, $lname);  
$array = getUser($id);
if (count($array) == 0) {
    addUser($id, $fname, $lname);    
} 

$kandidaat = getKandidaat($id, 'fbid');
if (count($kandidaat) == 0) {
    echo "Eesnimi: $fname</br>
    Perenimi: $lname</br>
    <form id= \"kandiform\" action=\"addkandidaat.php\" method=\"POST\">
    Linn:<br>
    <input type=\"text\" name=\"linn\">
    <br>
    Partei:<br>
    <input type=\"text\" name=\"partei\">
    <br>
    Sinu valimislubadused:<br>
    <textarea rows=\"10\" cols=\"40\"  name=\"info\"></textarea><br>
    <br>
    <button type=\"submit\">Kandideeri</button>
    </form>";
} else {
    echo "Sa oled juba kandideerimas.
    <br>
    <button type=\"button\" onclick=\"delKandidaat()\">Kustuta end nimekirjast</button>";
}

function setVars ($id, $fname, $lname) {
    $_SESSION['id']=$id;
    $_SESSION['eesnimi']=$fname;
    $_SESSION['perenimi']=$lname;
}


?>
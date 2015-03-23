<?php 
    
    $id = $_REQUEST["id"];
    
    include_once 'taskmodel.php';
    
    echo getUser($id);

?>
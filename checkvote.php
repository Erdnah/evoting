<?php
session_start();

include_once 'taskmodel.php';

if ($_SESSION['onvote'] == 1) {
    echo "1";
} else {
    echo "0";
}


?>
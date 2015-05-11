<?php
require_once ('taskmodel.php');

$time_wasted = 0;
$new_messages_check = getVotesAfter();
$num_rowsbefore = $_GET['startrows'];
$num_rows = count($new_messages_check);
while (true) {
    if ($time_wasted >= 60) {
        die(json_encode(array('status' => 'no-results', 'num_rows' => $num_rows, 'before' => $num_rowsbefore)));
        exit ;
    }
    sleep(2);
    $new_messages_check = getVotesAfter();
    $num_rows = count($new_messages_check); 
    if ($num_rows != $num_rowsbefore) {
        die(json_encode(array('status' => 'results', 'num_rows' => $num_rows)));
        exit ;
    }    
    $time_wasted += 1;
}
?>
 


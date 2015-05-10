<?php
require_once('taskmodel.php');
$lastId = (int) getLastVote();
 
$time_wasted = 0;
$lastIdQuery = ''; 

 
$new_messages = 'Tere';
sleep(3);
die( json_encode( array( 'status' => 'results', 'timestamp' => date('Y-m-d H:i:s'), 'lastId' => $last_id, 'data' => $new_messages ) ) );

?>

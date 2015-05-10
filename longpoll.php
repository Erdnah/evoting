<?php
require_once('taskmodel.php');
$timestamp = date('Y-m-d H:i:s');
$lastId = (int) getLastVote();
 
$time_wasted = 0;
$lastIdQuery = ''; 
$new_messages_check = getVotesAfter($timestamp);
$num_rowsbefore = mysql_num_rows( $new_messages_check );
$num_rows=0;
if( $num_rows <= 0 ){
   while( $num_rows <= $num_rowsbefore ){
      if( $num_rows <= $num_rowsbefore ){
         if( $time_wasted >= 60 ){
            die( json_encode( array( 'status' => 'no-results', 'lastId' => 0, 'timestamp' => time() ) ) );
            exit;
         }
 
         sleep( 1 );
         $newtimestamp = date('Y-m-d H:i:s');
         $new_messages_check = getVotesAfter($newtimestamp);
         $num_rows = mysql_num_rows( $new_messages_check );
         $time_wasted += 1;
      }
   }
}
 
$new_messages = 'Tere';
die( json_encode( array( 'status' => 'results', 'timestamp' => date('Y-m-d H:i:s'), 'lastId' => $last_id, 'data' => $new_messages ) ) );

?>

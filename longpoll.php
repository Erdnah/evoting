<?php
require_once('taskmodel.php');
$timestamp = (int) trim( $_GET['timestamp'] );
$lastId = isset( $_GET['lastId'] ) && !empty( $_GET['lastId'] ) ? $_GET['lastId'] : 0;
 
if( empty( $timestamp ) ){
   die( json_encode( array( 'status' => 'error' ) ) );
}
 
$time_wasted = 0;
$lastIdQuery = '';
if( !empty( $lastId ) ){
   $lastIdQuery = ' AND ID > ' . $lastId;
}
 
$new_messages_check = mysql_query("SELECT * FROM votes WHERE votedate >= {$timestamp}" . $lastIdQuery ." ORDER BY ID DESC");
$num_rows = mysql_num_rows( $new_messages_check );
if( $num_rows <= 0 ){
   while( $num_rows <= 0 ){
      if( $num_rows <= 0 ){
         if( $time_wasted >= 60 ){
            die( json_encode( array( 'status' => 'no-results', 'lastId' => 0, 'timestamp' => time() ) ) );
            exit;
         }
 
         sleep( 1 );
         $new_messages_check = mysql_query("SELECT * FROM votes WHERE votedate >= {$timestamp}" . $lastIdQuery . " ORDER BY ID DESC");
         $num_rows = mysql_num_rows( $new_messages_check );
         $time_wasted += 1;
      }
   }
}
 
$new_messages = array();
if( $num_rows >= 1):
   while ( $row = mysql_fetch_array( $new_messages_check, MYSQL_ASSOC ) ):
      $new_messages[] = array( 'id' => $row['ID'], 'message' => $row['msg_text'] );
   endwhile;
endif;
$last_msg = end( $new_messages );
$last_id = $last_msg['id'];
die( json_encode( array( 'status' => 'results', 'timestamp' => time(), 'lastId' => $last_id, 'data' => $new_messages ) ) );

?>

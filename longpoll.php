<?php
require_once ('taskmodel.php');

$new_messages_check = getVotesAfter();
$num_rows = count($new_messages_check);
die(json_encode(array('status' => 'results', 'num_rows' => $num_rows)));
exit ;
?>


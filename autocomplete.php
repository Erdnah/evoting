<?php
// contains utility functions mb_stripos_all() and apply_highlight()
require_once '../../Desktop/local_utils.php';
 
// prevent direct access
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
  $user_error = 'Access denied - not an AJAX request...';
  trigger_error($user_error, E_USER_ERROR);
}
 
// get what user typed in autocomplete input
$term = trim($_GET['term']);
 
$a_json = array();
$a_json_row = array();
 


// *****************************************************************************
 
// database connection
$conn = new mysqli("tcp:vzwses3zoj.database.windows.net", "evoting@vzwses3zoj", "Salasona123", "evoting");
 
if($conn->connect_error) {
  echo 'Database connection failed...' . 'Error: ' . $conn->connect_errno . ' ' . $conn->connect_error;
  exit;
} else {
  $conn->set_charset('utf8');
}
 
$parts = explode(' ', $term);
$p = count($parts);
 
/**
 * Create SQL
 */
$sql = 'SELECT perenimi, eesnimi FROM kandidaadid';
for($i = 0; $i < $p; $i++) {
  $sql .= ' AND perenimi LIKE ' . "'%" . $conn->real_escape_string($parts[$i]) . "%'";
}
 
$rs = $conn->query($sql);
if($rs === false) {
  $user_error = 'Wrong SQL: ' . $sql . 'Error: ' . $conn->errno . ' ' . $conn->error;
  trigger_error($user_error, E_USER_ERROR);
}
 
while($row = $rs->fetch_assoc()) {
  $a_json_row["id"] = $row['eesnimi'];
  $a_json_row["label"] = $row['perenimi'];
  array_push($a_json, $a_json_row);
}
 

 
$json = json_encode($a_json);
print $json;
?>
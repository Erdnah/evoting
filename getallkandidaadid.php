<?php
session_start();
include_once 'taskmodel.php';

echo "<table>
<thead>
<tr>
<th>Number</th>
<th>Nimi</th>
<th>Linn</th>
<th>Partei</th>
</tr>
</thead>
<tbody>";

foreach (getAllKandidaadid() as $value) {
echo "<tr class=\"clickable\"><td>$value[0]</td>" .
"<td>$value[1] $value[2]</td>" .
"<td>$value[3]</td>" .
"<td>$value[4]</td>
</tr>";
}
echo "</tbody></table>";

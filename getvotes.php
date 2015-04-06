<?php
include_once 'taskmodel.php';

echo "<table>
            <thead>
                 <tr>
                        <th>Number</th>
                        <th>Perekonnanimi</th>
                        <th>Eesnimi</th>
                        <th>Hääli</th>
                    </tr>
                    </thead>
                     <tbody>";
foreach (getAllScores() as $value) {
    echo "<tr><td>$value[2]</td>" . "<td>$value[0]</td>" . "<td>$value[1]</td>" . "<td>$value[3]</td></tr>";
}
echo "</tbody></table>";
?>
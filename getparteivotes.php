<?php
include_once 'taskmodel.php';

echo "<table>
                    <thead>
                    <tr>
                        <th>Partei</th>
                        <th>Hääli</th>                        
                    </tr>
                    </thead>
                    <tbody>";
                    
foreach (getAllPartys() as $value) {
    echo "<tr><td>$value[0]</td>" . "<td>$value[1]</td></tr>";
}                    
echo "</tbody></table>";
?>
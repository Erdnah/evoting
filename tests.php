<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert title here</title>
        <link rel="stylesheet" href="asd.css">
    </head>
    <body>
        <script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/modernizr.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/tabs.js" type="text/javascript" charset="utf-8"></script>
        <ul id="tabs">
            <li class="active">
                Avaleht
            </li>
            <li>
                Kandidaadid
            </li>
            <li>
                Tulemused
            </li>
            <li>
                Minu andmed
            </li>
            <li>
                Tab 5
            </li>
        </ul>
        <ul id="tab">
            <li class="active">
                <h2>This is the first tab</h2>
            </li>
            <li>
                <h2>Kandidaatide tabel</h2>
                <table>
                    <tr>
                        <th>Perenimi</th>
                        <th>Esinimi</th>
                        <th>Aadress</th>
                    </tr>

                    <?php
                    include_once 'taskmodel.php';

                    foreach (getAllPersons() as $value) {
                    echo "
                    <tr>
                        <td>$value[1]</td>" . "<td>$value[2]</td>" . "<td>$value[3]</td>
                    </tr>";
                    }
                    ?>
                </table>
            </li>
            <li>
                <h2>Tab number three wee hee</h2>
            </li>
            <li>
                <h2>Fourth tab not bad</h2>
            </li>
            <li>
                <h2>Tab number five here we go!</h2>
            </li>
        </ul>
    </body>
</html>
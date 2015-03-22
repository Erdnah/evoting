<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-hääletus</title>
        <link rel="stylesheet" href="asd.css">
    </head>
    <body>
        <script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/modernizr.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/tabs.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/loadfbAPI.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/loadFromFb.js" type="text/javascript" charset="utf-8"></script>
        
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
            <li id= "logi">
                Logi sisse
            </li>
        </ul>
        <ul id="tab">
            <li class="active">
                <h2 id="teretulemast">Tere tulemast e-hääletuse lehele!</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum, lacus vitae sollicitudin varius, tellus neque pharetra diam, posuere pharetra sapien sapien non tellus. Fusce nec laoreet neque, non ullamcorper mi. Fusce ac sem nulla. Sed quis ante at felis elementum ornare faucibus sed mauris. Mauris sodales tempus nisl, quis convallis massa aliquam vitae. Cras finibus erat feugiat, consequat lacus eu, posuere ligula. Suspendisse lectus libero, consectetur vel tellus ac, tristique egestas ex.
                </p>
            </li>
            <li>
                <h2>Kandidaatide tabel</h2>
                <table>
                    <tr>
                        <th>Number</th>
                        <th>Nimi</th>
                        <th>Linn</th>
                        <th>Partei</th>
                    </tr>

                   <?php
                    include_once 'taskmodel.php';

                    foreach (getAllPersons() as $value) {
                        echo "<tr><td>$value[0]</td>" . "<td>$value[1]</td>". "<td>$value[2]</td>" . "<td>$value[3]</td></tr>";
                    }
                    ?>
                </table>
            </li>
            <li>
                <h2>Tulemused</h2>
                <table>
                    <tr>
                        <th>Number</th>
                        <th>Perekonnanimi</th>
                        <th>Eesnimi</th>
                        <th>Hääli</th>
                    </tr>

                   <?php
                    include_once 'taskmodel.php';

                    foreach (getAllScores() as $value) {
                        echo "<tr><td>$value[2]</td>" . "<td>$value[0]</td>". "<td>$value[1]</td>" . "<td>$value[3]</td></tr>";
                    }
                    ?>
                </table>
                 <table>
                    <tr>
                        <th>Partei</th>
                        <th>Hääli</th>
                        
                    </tr>

                   <?php
                    include_once 'taskmodel.php';

                    foreach (getAllPartys() as $value) {
                        echo "<tr><td>$value[0]</td>" .  "<td>$value[1]</td></tr>";
                    }
                    ?>
                </table>
                
            </li>
            <li>
                <h2>Minu andmed</h2>
                <div id="status"></div>

                <div id="firstName"></div>
                <div id="lastName"></div>
                <div id="email"></div>
            </li>
            <li>
                <h2 id="logi2">Sisselogimine</h2>
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
            </li>
        </ul>
    </body>
</html>
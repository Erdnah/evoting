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
        <script>
            function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                console.log(response);
                // The response object is returned with a status field that lets the
                // app know the current login status of the person.
                // Full docs on the response object can be found in the documentation
                // for FB.getLoginStatus().
                if (response.status === 'connected') {
                    document.getElementById('logi').innerHTML = 'Logi välja';
                    getInfo();
                } else if (response.status === 'not_authorized') {
                    // The person is logged into Facebook, but not your app.
                    document.getElementById('status').innerHTML = 'Logi palun sisse.';
                } else {
                    // The person is not logged into Facebook, so we're not sure if
                    // they are logged into this app or not.
                    document.getElementById('status').innerHTML = 'Logi palun sisse.;
                }
            }

            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }
            function getInfo() {
                FB.api('/me', function(response) {
                    document.getElementById('firstName').innerHTML = 'Eesnimi: ' + response.first_name;
                    document.getElementById('lastName').innerHTML = 'Perenimi: ' + response.last_name;
                    document.getElementById('email').innerHTML = 'Email: ' + response.email;
                });
            }
        </script>
        
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
                <h2>Tere tulemast e-hääletuse lehele!</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam dictum, lacus vitae sollicitudin varius, tellus neque pharetra diam, posuere pharetra sapien sapien non tellus. Fusce nec laoreet neque, non ullamcorper mi. Fusce ac sem nulla. Sed quis ante at felis elementum ornare faucibus sed mauris. Mauris sodales tempus nisl, quis convallis massa aliquam vitae. Cras finibus erat feugiat, consequat lacus eu, posuere ligula. Suspendisse lectus libero, consectetur vel tellus ac, tristique egestas ex.
                </p>
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
                        echo "<tr><td>$value[1]</td>" . "<td>$value[2]</td>" . "<td>$value[3]</td></tr>";
                    }
                    ?>
                </table>
            </li>
            <li>
                <h2>Tulemused</h2>
            </li>
            <li>
                <h2>Minu andmed</h2>
                <div id="status"></div>

                <div id="firstName"></div>
                <div id="lastName"></div>
                <div id="email"></div>
            </li>
            <li>
                <h2>Sisselogimine</h2>
                <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
            </li>
        </ul>
    </body>
</html>
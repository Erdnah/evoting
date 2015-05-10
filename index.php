<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-hääletus</title>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/asd.css">
        <link rel="stylesheet" href="css/base.css" />
    </head>
    <body>
        <script src="js/jquery-1.11.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/modernizr.js" type="text/javascript" charset="utf-8"></script>
        <script defer src="js/tabs.js" type="text/javascript" charset="utf-8"></script>
        <script async src="js/loadfbAPI.js" type="text/javascript" charset="utf-8"></script>
        <script async src="js/loadFromFb.js" type="text/javascript" charset="utf-8"></script>
        <script async src="js/voteHandler.js" type="text/javascript" charset="utf-8"></script>
        <script async src="js/updater.js" type="text/javascript" charset="utf-8"></script>
        <script defer src="js/slide.js" type="text/javascript" charset="utf-8"></script>

        <header>
            <div id="title" class="container">
                <h1>E-hääletus!</h1>
                <h2>Lihtne veebirakendus hääletamiseks</h2>
            </div>
        </header><!-- /header -->
        <div id="main">
            <div class="container">

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
                        Kandideeri
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
                        <h2>Kandidaatide tabel
                            <button type="button" onclick="updateAllKandidaadid()">Uuenda</button></h2>
                        <div id="hääletus"></div>
                        <div id="logbtn">
                            <div class="fb-login-button" data-max-rows="1" data-size="xlarge" onlogin="checkLoginState();" data-show-faces="false" data-auto-logout-link="true"></div>
                        </div>
                        <div class="datagrid">
                            <div id="kandidaadidTabel"></div>
                        </div>
                        <div id="info">
                            <div id="infotekst" class="center">
                                Vajuta kandidaadi peale, et näha tema infot!
                            </div>
                            <button id="votebtn" disabled class="hidden" type='button'>
                                Hääleta
                            </button>
                        </div>

                    </li>

                    <li>
                        <h2>Tulemused
                        <button type="button" onclick="updateTulemused()">Uuenda</button></h2>

                        <div class="datagrid" id="kandidaadid">
                            <h3>Tulemused kandidaatide järgi:</h3>
                            <div id="kvotes"></div>
                        </div>

                        <div class="datagrid" id="parteid">
                            <h3>Tulemused parteide järgi:</h3>
                            <div id="parteivotes"></div>
                        </div>

                    </li>
                    <li>
                        <h2>Minu andmed</h2>
                        <div id="status"></div>
                        <div id="logbtn2">
                            <div class="fb-login-button" data-max-rows="1" data-size="xlarge" onlogin="checkLoginState();" data-show-faces="false" data-auto-logout-link="true"></div>
                        </div>
                        <div id="mant"></div>
                    </li>
                    <li>
                        <h2 id="logi2">Sisselogimine</h2>

                        <div class="fb-login-button" data-max-rows="1" data-size="xlarge" onlogin="checkLoginState();" data-show-faces="false" data-auto-logout-link="true"></div>
                    </li>
                </ul>
            </div>
        </div>
    </body>

</html>

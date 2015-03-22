<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-hääletus</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <header>
            <h1 href="index.html"> E-Valimised</h1>
            <nav>
                <ul>
                    <li>
                        <a href="kandidaadid.php">Kandidaadid</a>
                    </li>
                    <li>
                        <a href="tulemused.html">Tulemused</a>
                    </li>
                    <li>
                        <a href="statistika.html">Statistika</a>
                    </li>
                    <li>
                        <a href="andmed.html">Minu andmed</a>
                    </li>
                    <li>
                        <a href="login.html">Logi sisse <span class="caret"></span></a>
                        <div>
                            <ul>
                                <li>
                                    <a href="login.html">Google+</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

        </header>
        <hr>
        <section>
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
        </section>

        <footer>

        </footer>

    </body>
</html>
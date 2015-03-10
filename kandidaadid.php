<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E-hääletus</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

        <header>
            <h1> E-Valimised</h1>
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

            <?php
            /** * Copyright 2013 Microsoft Corporation
             *
             * Licensed under the Apache License, Version 2.0 (the "License");
             * you may not use this file except in compliance with the License.
             * You may obtain a copy of the License at
             * http://www.apache.org/licenses/LICENSE-2.0
             *
             * Unless required by applicable law or agreed to in writing, software
             * distributed under the License is distributed on an "AS IS" BASIS,
             * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
             * See the License for the specific language governing permissions and
             * limitations under the License.
             */

            include_once 'taskmodel.php';
            function getItems() {
                $items = getAllItems();
                return $items;
            }
            print_r(getItems())
            ?>
        </section>

        <footer>

        </footer>

    </body>
</html>
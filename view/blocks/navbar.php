<?php
//$me = $app->url->create();
//$about = $app->url->create("about");

//print_r($me);
//print_r($about);
//print_r($app->url->create("about"));
?>


<body>
    <nav class="navbar is-transparent">
        <!-- Consists of the logo/link to index.php and the burger.
        Other links in the navbar is created below. -->
        <div class="navbar-brand">
            <!--<a class="navbar-item" href="http://bulma.io">Ramverk1</a>-->
            <a class="navbar-item" href=<?= $app->url->create(); ?>>Martin</a>

            <div class="navbar-burger burger" data-target="navMenubd-example">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>


        <div class="navbar-menu">
            <div class="navbar-start">
                <div class="navbar-item is-hoverable">
                    <!--<a class="navbar-link  is-active" href="/documentation/overview/start/">-->
                    <a class="navbar-item " href=<?= $app->url->create("about"); ?>>
                        Om
                    </a>
                </div>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link  is-active" href=<?= $app->url->create("report"); ?>>
                        Rapporter
                    </a>
                    <div class="navbar-dropdown ">
                        <a class="navbar-item " href=<?= $app->url->create("report#kmom01"); ?>>
                            kmom01
                        </a>
                        <a class="navbar-item " href=<?= $app->url->create("report#kmom02"); ?>>
                            kmom02
                        </a>
                        <a class="navbar-item " href=<?= $app->url->create("report#kmom03"); ?>>
                            kmom03
                        </a>
                        <a class="navbar-item " href=<?= $app->url->create("report#kmom04"); ?>>
                            kmom04
                        </a>
                        <a class="navbar-item " href=<?= $app->url->create("report#kmom05"); ?>>
                            kmom05
                        </a>
                        <a class="navbar-item " href=<?= $app->url->create("report#kmom06"); ?>>
                            kmom06
                        </a>
                        <a class="navbar-item " href=<?= $app->url->create("report#kmom10"); ?>>
                            kmom10
                        </a>
                        <!--<hr class="navbar-divider">-->
                    </div>
                </div>
            </div>
            <div class="navbar-end">
            </div>
        </div>
    </nav>

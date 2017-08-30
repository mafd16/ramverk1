<?php
/**
 * Routes for the me-page
 */


/**
 * Me-route
 */
$app->router->add("", function () use ($app) {
    // Add views to a specific region
    //$app->view->add("blocks/header");
    //$app->view->add("blocks/navbar");
    $app->view->add("mepage/me");

    // Render a standard page using layout
    $app->renderPage([
        "title" => "Min sida",
    ]);
});

/**
 * About-route
 */
$app->router->add("about", function () use ($app) {
    // Add views to a specific region
    //$app->view->add("blocks/header");
    //$app->view->add("blocks/navbar");
    $app->view->add("mepage/about");

    // Render a standard page using layout
    $app->renderPage([
        "title" => "Om sidan",
    ]);
});

/**
 * Report-route
 */
$app->router->add("report", function () use ($app) {
    // Add views to a specific region
    //$app->view->add("blocks/header");
    //$app->view->add("blocks/navbar");
    $app->view->add("mepage/report");

    // Render a standard page using layout
    $app->renderPage([
        "title" => "Rapporter",
    ]);
});

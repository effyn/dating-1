<?php
/*
 * author: Sang Le
 * date: 04/21/19
 * filename: index.php
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require autoload
require_once "vendor/autoload.php";

// Create an instance of the Base class
$f3 = Base::instance();

// Turn on Fat-Free error reporting
$f3->set('DEBUG', 3);

// Define a default route
$f3->route('GET /', function() {
    // Display a view
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define the personal form route
$f3->route('GET /personal-info', function() {
    // Display a view
    $view = new Template();
    echo $view->render('views/personal-form.html');
});



$f3->run();

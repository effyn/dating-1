<?php
/*
 * author: Sang Le
 * date: 04/21/19
 * filename: index.php
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

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

// Define the profile form route
$f3->route('POST /profile', function() {
    // Get personal information from previous form
    $_SESSION['first'] = $_POST['first-name'];
    $_SESSION['last'] = $_POST['last-name'];
    $_SESSION['age'] = $_POST['age'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['phone'] = $_POST['phone'];

    // Display a view
    $view = new Template();
    echo $view->render('views/profile-form.html');
});

// Define the interests form route
$f3->route('POST /interests', function() {
    // Get profile information from previous form
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['state'] = strtoupper($_POST['state']);
    $_SESSION['seeking'] = $_POST['seeking'];
    $_SESSION['bio'] = $_POST['bio'];

    // Display a view
    $view = new Template();
    echo $view->render('views/interests-form.html');
});

// Define the profile summary route
$f3->route('POST /summary', function() {

//    $_SESSION['inDoor'] = $_POST['inDoor'];
//    $_SESSION['outDoor'] = $_POST['outDoor'];

    $interests = "";
    foreach($_POST['inDoor'] as $interest) {
        $interests .= $interest . " ";
    }
    foreach($_POST['outDoor'] as $interest) {
        $interests .= $interest . " ";
    }

    $_SESSION['interests'] = $interests;

    // Display a view
    $view = new Template();
    echo $view->render('views/summary.html');
});



$f3->run();

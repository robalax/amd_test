<?php 

include_once 'includes/autoloader.php';

use App\classes\Main;


/*
The reason I've added this main get variable is to add more routes in future.
**/

if (isset($_GET['main'])) {

    $main = new Main();
    echo $main->index();
}
<?php

namespace TastyRecipes\View;

use TastyRecipes\Controller\Controller;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();

if (isset($_POST['submit'])) {
    try {
        Controller::storeComments(2);
        header("Location: pancakes.php");
    } catch (\Exception $exception) {
        include 'resources/views/pancakes.php';
    }
} else {
    include 'resources/views/pancakes.php';
}
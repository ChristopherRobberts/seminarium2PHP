<?php

namespace TastyRecipes\View;

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();
$controller = SessionManager::getController();
if (isset($_POST['submit'])) {
    try {
        $controller->storeComments(1);
        SessionManager::storeController($controller);
        header("Location: meatballs.php");
    } catch (\Exception $exception) {
        include 'resources/views/meatballs.php';
    }
} else {
    include 'resources/views/meatballs.php';
}

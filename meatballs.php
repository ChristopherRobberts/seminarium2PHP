<?php

namespace TastyRecipes\View;

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();
$controller = SessionManager::getController();
if (isset($_SESSION['u_id'])) {
    if (isset($_POST['submit'])) {
        try {
            $message = htmlspecialchars($_POST['txtarea'], ENT_QUOTES, 'UTF-8');
            $userName = $_SESSION['u_uid'];
            $controller->storeComments(1, $userName, $message);
            SessionManager::storeController($controller);
            header("Location: meatballs.php");
        } catch (\Exception $exception) {
            include 'resources/views/meatballs.php';
        }
    } else {
        include 'resources/views/meatballs.php';
    }
} else {
    include 'resources/views/meatballs.php';
}

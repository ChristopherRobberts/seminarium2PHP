<?php

namespace TastyRecipes\View;

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();

$pageID = $_POST['param'];
if ($pageID == 1) {
    $controller = SessionManager::getController();
    $usercommentnr = $_POST['commentID'];
    $controller->deleteComments($pageID, $usercommentnr);
    SessionManager::storeController($controller);
}
if ($pageID == 2) {
    $controller = SessionManager::getController();
    $usercommentnr = $_POST['commentID'];
    $controller->deleteComments($pageID, $usercommentnr);
    SessionManager::storeController($controller);
}


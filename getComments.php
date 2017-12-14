<?php

namespace TastyRecipes\View;

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();


$pageid = $_POST['param'];
if ($pageid == 1) {
    $controller = SessionManager::getController();
    $array = $controller->getComments($pageid);
    echo json_encode($array);
}
if ($pageid == 2) {
    $controller = SessionManager::getController();
    $array = $controller->getComments($pageid);
    echo json_encode($array);
}




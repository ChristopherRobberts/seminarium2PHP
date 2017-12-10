<?php
use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;
require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();

$controller = SessionManager::getController();
if (isset($_POST['deleteCom'])) {
    try {
        $usercommentnr = $_POST['user_comment_nr'];
        $controller->deleteComments(2, $usercommentnr);
        SessionManager::storeController($controller);
        header("Location: pancakes.php");
    } catch (Exception $exception){
        include 'resources/views/pancakes.php';
    }
}
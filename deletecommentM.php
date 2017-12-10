<?php
namespace TastyRecipes\View;

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;
require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();

$controller = SessionManager::getController();
if (isset($_POST['deleteCom'])) {
    try {
        $usercommentnr = $_POST['user_comment_nr'];
        $controller->deleteComments(1, $usercommentnr);
        SessionManager::storeController($controller);
        header("Location: meatballs.php");
    } catch (Exception $exception){
        include 'resources/views/meatballs.php';
    }
}
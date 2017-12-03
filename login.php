<?php
namespace TastyRecipes\View;
use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;
require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();

$controller = SessionManager::getController();
if(isset($_POST['submit'])) {
    try {
        $controller->logIn();
        SessionManager::storeController($controller);
        header("Location: /");
    } catch(\Exception $exception){
        include 'resources/views/log-in.php';
    }
}
else {
    include 'resources/views/log-in.php';
}

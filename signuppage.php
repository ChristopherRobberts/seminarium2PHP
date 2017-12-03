<?php
use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();
$controller = SessionManager::getController();

if(isset($_POST['submit'])) {
    try {
        $controller->signUp();
        SessionManager::storeController($controller);
        header("Location: /login.php");
    } catch(\Exception $exception){
        include 'resources/views/signuppage.php';
    }
}
else {
    include 'resources/views/signuppage.php';
}

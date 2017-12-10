<?php
namespace TastyRecipes\View;
use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;
require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();

$controller = SessionManager::getController();
if(isset($_POST['submit'])) {
    try {
        $userName = htmlspecialchars($_POST['uname'], ENT_QUOTES, 'UTF-8');
        $passWord = htmlspecialchars($_POST['psw'], ENT_QUOTES, 'UTF-8');
        $controller->logIn($userName, $passWord);
        SessionManager::storeController($controller);
        header("Location: /");
    } catch(\Exception $exception){
        include 'resources/views/log-in.php';
    }
}
else {
    include 'resources/views/log-in.php';
}

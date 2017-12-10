<?php
namespace TastyRecipes\View;
use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();
$controller = SessionManager::getController();

if(isset($_POST['submit'])) {
    try {
        $firstName = htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8');
        $lastName = htmlspecialchars($_POST['lname'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $userName = htmlspecialchars($_POST['uname'], ENT_QUOTES, 'UTF-8');
        $passWord = htmlspecialchars($_POST['psw'], ENT_QUOTES, 'UTF-8');
        $controller->signUp($firstName, $lastName, $email, $userName, $passWord);
        SessionManager::storeController($controller);
        header("Location: /login.php");
    } catch(\Exception $exception){
        include 'resources/views/signuppage.php';
    }
}
else {
    include 'resources/views/signuppage.php';
}

<?php

namespace TastyRecipes\View;

use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();
$controller = SessionManager::getController();
if (isset($_SESSION['u_id'])) {
    $pageid = $_POST['param'];
    if ($pageid == 1) {
        $message = htmlspecialchars($_POST['updatedComment'], ENT_QUOTES, 'UTF-8');
        $userName = $_SESSION['u_uid'];
        $comment = $controller->storeComments($pageid, $userName, $message);
        echo json_encode($comment);
    }
    if ($pageid == 2) {
        $message = htmlspecialchars($_POST['updatedComment'], ENT_QUOTES, 'UTF-8');
        $userName = $_SESSION['u_uid'];
        $comment = $controller->storeComments($pageid, $userName, $message);
        echo json_encode($comment);
    }
}

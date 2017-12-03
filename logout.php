<?php

namespace TastyRecipes\View;
use TastyRecipes\Controller\SessionManager;
use TastyRecipes\Util\Util;
require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();
$controller = SessionManager::getController();
$controller->logOut();
SessionManager::storeController($controller);

header("Location: index.php");
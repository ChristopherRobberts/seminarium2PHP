<?php

namespace TastyRecipes\View;

use TastyRecipes\Util\Util;

require_once 'classes/TastyRecipes/Util/Util.php';

Util::init();

echo json_encode($_SESSION['u_uid']);
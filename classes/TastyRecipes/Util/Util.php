<?php

namespace TastyRecipes\Util;

class Util {
    public static function init($debug = true) {
        session_start();

        if ($debug) {
            error_reporting(-1);
            ini_set('display_errors', 'On');
        }

        spl_autoload_register(function ($class) {
            require_once 'classes/' . \str_replace('\\', '/', $class) . '.php';
        });
    }

    public static function preventXSS($string){
        echo htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
}
<?php 

    // Reporte de errores (DEBUG)
    error_reporting(E_ALL);
    ini_set('display_errors', '1');


    // Global
    require 'config/global.php';

    // Autoload
    spl_autoload_register(function($clase) {
        require PFL_LIBRERIAS . '/' . str_replace('\\', '/', $clase) . '.php';
    });


    /*require_once RAIZ . '/vendor/twig/twig/lib/Twig/Autoloader.php';
    Twig_Autoloader::register();*/

    require_once RAIZ . '/vendor/autoload.php';

?>
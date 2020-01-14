<?php 

if(!defined('PFL_CONFIG_GLOBAL')) {
    define('PFL_CONFIG_GLOBAL', 1);


    define('WEB_NOMBRE',            'ProFriLans');
    define('WEB_URL',               'http://localhost/profrilans');
    
    define('RAIZ',                  '/var/www/html/profrilans');

    define('APP',                   RAIZ    .   '/app');
    define('PBL',                   RAIZ    .   '/public');
    define('PFL_MODELOS',           APP     .   '/modelos');
    define('PFL_LIBRERIAS',         APP     .   '/librerias');
    define('PFL_CONTROLADORES',     APP     .   '/controladores');


} // PFL_CONFIG_GLOBAL

?>
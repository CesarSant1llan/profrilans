<?php 

namespace INTF;

if(!defined('PFL_INTF_CONTROLADOR')) {
    define('PFL_INTF_CONTROLADOR', 1);


    interface Controlador
    {
        public function iniciar(string $idioma);
        public function adi();
        public function param(array $parametros);
        public function indice();
        public function vista(string $rutaVista);
        public function finalizar();
    }


} // PFL_INTF_CONTROLADOR

?>
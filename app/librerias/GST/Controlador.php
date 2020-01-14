<?php 

namespace GST;

use INTF\Controlador as iControlador;

use SYS\Vista;

if(!defined('PFL_GST_CONTROLADOR')) {
    define('PFL_GST_CONTROLADOR', 1);


    class Controlador implements iControlador
    {
        private $vista;


        final public function iniciar(string $idioma)
        {
            $this->vista = new Vista;
        }


        public function adi()
        {
            // 
        }


        public function param(array $parametros)
        {
            // 
        }


        public function indice()
        {
            // 
        }


        public function vista(string $rutaVista)
        {
            $this->vista->aggPaginaWeb($rutaVista);
        }


        final public function finalizar()
        {
            $datos = array(
                    'titulo'    => WEB_NOMBRE
                ,   'nombre'    => 'Cesar Dreyf'
                ,   'url'       => WEB_URL
            );
            $this->vista->imprimirPaginasWeb($datos);
        }


    } // GST\Controlador


} // PFL_GST_CONTROLADOR

?>
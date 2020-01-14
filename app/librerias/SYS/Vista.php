<?php 

namespace SYS;

if(!defined('PFL_SYS_VISTA')) {
    define('PFL_SYS_VISTA', 1);


    class Vista
    {
        private $arrPaginasWeb;


        public function __construct()
        {
            $this->arrPaginasWeb = array();
        }


        public function aggPaginaWeb(string $ruta)
        {
            $this->arrPaginasWeb[] = strtolower($ruta) . '.html';
        }


        public function imprimirPaginasWeb(array& $datos = null)
        {
            $loader = new \Twig\Loader\FilesystemLoader(PBL . '/html');
            $twig = new \Twig\Environment($loader, /*[
                'cache' => RAIZ . '/cache'
            ]*/);

            for($i = 0, $j = count($this->arrPaginasWeb); $i < $j; $i++)
            {
                echo $twig->render($this->arrPaginasWeb[$i], $datos);
            }
        }


    } // SYS\Vista


} // PFL_SYS_VISTA

?>
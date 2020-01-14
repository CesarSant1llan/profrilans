<?php 

use INTF\Controlador;

if(!defined('PFL_LIB_APP')) {
    define('PFL_LIB_APP', 1);

    // require '../../config/global.php';

    class App
    {
        private $url;
        private $rutaVsta;
        private $idioma = 'es';
        private $arrParam = array();
        private $idiomasDisponibles = [
            'es', 'en', 'pt', 'it', 'ca', 'fr', 'de'
        ];


        public function __construct()
        {
            // Obteniendo la url
            $this->obtenerUrl();

            // Obteniendo el controlador
            $this->obtenerControlador();

            // Llamando a sus metodos
            $this->llamarMetodosDelControlador();
        }


        public function obtenerUrl()
        {
            $this->url = array();
            if( isset($_GET['url']) )
            {
                $urlLimpia = rtrim($_GET['url'], '/');
                $urlLimpia = filter_var($urlLimpia, FILTER_SANITIZE_URL);
                $this->url = explode($urlLimpia, '/');
            }
        }


        public function obtenerControlador()
        {
            // Obteniedno el idioma de la url
            $this->obtenerIdioma();

            // Controlador por defecto
            $controlador = 'Index';

            // Prefijo de los objetos Controlador ('class Ctr404')
            $prefijoCtrl = 'Ctr';


            if( $elm = count($this->url) )
            {
                // Estableciendo el nuevo controlador
                $controlador = $this->url[0];

                // Si el archivo no existe, el controlador será Ctr404
                // y se le pasa como primer parametro el nombre del controlador
                if( !file_exists(PFL_CONTROLADORES . '/' . $controlador . '.php') )
                {
                    $controlador = '404';
                    $this->arrParam = array_shift($this->url);
                }

                // Obteniendo los parametros pasador por URL
                for($i = 0, $elm--; $i < $elm; $i++)
                {
                    $this->arrParam[] = $this->url[$i];
                }
            }

            // Cargando el archivo
            require PFL_CONTROLADORES . '/' . $controlador . '.php';

            // Instanciando
            $clase = $prefijoCtrl . $controlador;
            $this->rutaVsta = $controlador;
            
            $clase = new $clase;
            $this->instanciarControlador($clase);
        }


        public function llamarMetodosDelControlador()
        {
            $this->controlador->iniciar($this->idioma);
            $this->controlador->adi();
            $this->controlador->param($this->arrParam);
            $this->controlador->indice();
            $this->controlador->vista($this->rutaVsta);
            $this->controlador->finalizar();
        }


        public function obtenerIdioma()
        {
            if( isset($this->url[0][0]) && !isset($this->url[0][2]) )
            {
                if( in_array($this->url[0], $this->idiomasDisponibles) )
                {
                    $this->idioma = array_shift($this->url);
                }
            }
        }


        public function instanciarControlador(Controlador& $controlador)
        {
            $this->controlador =& $controlador;
        }


    } // App


} // PFL_LIB_APP

?>
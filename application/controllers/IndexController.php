<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class IndexController extends CI_Controller {


    public function __construct() {
        parent::__construct();
    }

    /**
    * Muestra una página
    * 
    * @param type $page Página que se va a cargar
    * @param type $data Datos que se van a cargar en la página
    */
    public function view($page = 'inicio', $data = array())
    {
        $this->load->helper('inflector_helper');
        if ( ! file_exists('application/views/index/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['objeto'] = 'index';
        $data['page'] = $page;
        $data['titulo'] = ucfirst(strtolower(humanize($page)));         //Título de la página
        $data['contenido'] = 'index/'.$page;                            //Contenido de la pagina
        $this->load->vars($data);                                       //Cargo los datos que se van a mostrar
        $this->load->view('layouts/layout');                            //Cargo la plantilla que se va a utilzar             
    }

    public function index() { 
        $this->view('manage-Index');    
    }

}


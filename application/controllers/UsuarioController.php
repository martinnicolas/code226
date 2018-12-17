<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsuarioController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario');
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
        if ( ! file_exists('application/views/usuarios/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['objeto'] = 'usuarios';
        $data['page'] = $page;
        $data['titulo'] = ucfirst(strtolower(humanize($page)));         //Título de la página
        $data['contenido'] = 'usuarios/'.$page;                         //Contenido de la pagina
        $this->load->vars($data);                                       //Cargo los datos que se van a mostrar
        $this->load->view('layouts/layout');                            //Cargo la plantilla que se va a utilzar             
    }

    public function index() { 
        $data["Usuarios"] = $this->Usuario->getAll();
        $this->view('manage-Usuario', $data);    
    }
    
    public function add() {
        $this->view('add-Usuario');
    }
    
    public function create() {                        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');  
        $this->form_validation->set_rules('clave', 'Clave', 'required'); 
        $this->form_validation->set_rules('confirmar_clave', 'Confirmar clave', 'required|matches[clave]');      
        if ($this->form_validation->run())
        {
            $data['nombre'] = $this->input->post('nombre');
            $data['clave'] = $this->input->post('clave');
            $data['fecha_creacion'] = date('Y-m-d H:i:s'); //Convertir formato de fecha a mysql                
            $Usuario_id = $this->Usuario->insert($data);
            $this->session->set_flashdata('success', 'Datos guardados');
            redirect('usuarios/index');
        } 
        $this->view('add-Usuario');
    }
    
    public function edit($Usuario_id) {
        $data['Usuario_id'] = $Usuario_id;
        $data['Usuario'] = $this->Usuario->getDataById($Usuario_id);
        $this->view('edit-Usuario', $data);
    }
    
    public function update() {
        $Usuario_id = $this->input->post('Usuario_id');        
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');  
        if ($this->form_validation->run())
        {
            $data['nombre'] = $this->input->post('nombre');
            $edit = $this->Usuario->update($Usuario_id,$data);
            if ($edit) {
                $this->session->set_flashdata('success', 'Usuario actualizado');
                redirect('usuarios/editar/'.$Usuario_id);
                return;
            }
        }
        $Usuario = $this->Usuario->getDataById($Usuario_id);        
        $data['Usuario'] = $Usuario;
        $this->view('edit-Usuario',$data);
    }

    public function cambiar_clave() {
        $Usuario_id = $this->input->post('Usuario_id');        
        $this->form_validation->set_rules('clave', 'Nueva Clave', 'required');  
        $this->form_validation->set_rules('confirmar_clave', 'Confirmar clave', 'required|matches[clave]');      
        if ($this->form_validation->run())
        {
            $data['clave'] = $this->input->post('clave');
            $edit = $this->Usuario->update($Usuario_id,$data);
            if ($edit) {
                $this->session->set_flashdata('success', 'Usuario actualizado');
                redirect('usuarios/editar/'.$Usuario_id);
                return;
            }
        }
        $Usuario = $this->Usuario->getDataById($Usuario_id);        
        $data['Usuario'] = $Usuario;
        $this->view('edit-Usuario',$data);
    } 

    public function cambiar_estado($Usuario_id) {
        $edit = $this->Usuario->cambiar_estado($Usuario_id);
        $this->session->set_flashdata('success', 'Estado actualizado');
        redirect('usuarios/index');
    }   

    public function show($Usuario_id) {
        $data['Usuario_id'] = $Usuario_id;
        $data['Usuario'] = $this->Usuario->getDataById($Usuario_id);
        $this->view('view-Usuario', $data);
    }
    
    public function destroy($Usuario_id) {
        $delete = $this->Usuario->delete($Usuario_id);
        $this->session->set_flashdata('success', 'Usuario eliminado');
        redirect('usuarios/index');
    }

    public function generatePDF(){
        $this->load->library('parser');
        $this->load->library('htmltopdf');
        $data['usuarios'] = $this->Usuario->getAll();
        $this->htmltopdf->initialize('P', 'A4', 'es',FALSE,'ISO-8859-1');
        $this->htmltopdf->writeHTML($this->parser->parse('usuarios/reporte_usuarios',$data));               
        $this->htmltopdf->output('Usuarios.pdf');        
    }

    public function generateExcel(){
        $this->load->helper('excel_helper');
        $data = $this->Usuario->getExcelData();
        to_excel($data,"Listado de usuarios","Usuarios");
    }
    
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PersonaController extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model('Persona');
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
        if ( ! file_exists('application/views/personas/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['objeto'] = 'personas';
        $data['page'] = $page;
        $data['titulo'] = ucfirst(strtolower(humanize($page)));         //Título de la página
        $data['contenido'] = 'personas/'.$page;                         //Contenido de la pagina
        $this->load->vars($data);                                       //Cargo los datos que se van a mostrar
        $this->load->view('layouts/layout');                            //Cargo la plantilla que se va a utilzar             
    }

    public function index() { 
        $data["Personas"] = $this->Persona->getAll();
        $this->view('manage-Persona', $data);    
    }
    
    public function add() {
        $this->view('add-Persona');
    }
    
    public function create() {                
        $this->form_validation->set_rules('dni', 'DNI', 'required');   
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');   
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');  
        $this->form_validation->set_rules('domicilio', 'Domicilio', 'required'); 
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');  
        $this->form_validation->set_rules('email', 'Email', 'required');          
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'required|regex_match['.FECHA_VALIDA.']');          
        if ($this->form_validation->run())
        {
            $data['dni'] = $this->input->post('dni');
            $data['apellido'] = $this->input->post('apellido');
            $data['nombre'] = $this->input->post('nombre');
            $data['domicilio'] = $this->input->post('domicilio');
            $data['telefono'] = $this->input->post('telefono');
            $data['email'] = $this->input->post('email');
            $data['fecha_nacimiento'] = php_datetime_to_mysql($this->input->post('fecha_nacimiento')); //Convertir formato de fecha a mysql                
            $Persona_id = $this->Persona->insert($this->input->post());
            $this->session->set_flashdata('success', 'Datos guardados');
            redirect('personas/ver/'.$Persona_id);
        } 
        $this->view('add-Persona');
    }
    
    public function edit($Persona_id) {
        $data['Persona_id'] = $Persona_id;
        $data['Persona'] = $this->Persona->getDataById($Persona_id);
        $this->view('edit-Persona', $data);
    }
    
    public function update() {
        $Persona_id = $this->input->post('Persona_id');        
        $this->form_validation->set_rules('dni', 'DNI', 'required');   
        $this->form_validation->set_rules('apellido', 'Apellido', 'required');   
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');  
        $this->form_validation->set_rules('domicilio', 'Domicilio', 'required'); 
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');  
        $this->form_validation->set_rules('email', 'Email', 'required');          
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de nacimiento', 'required|regex_match['.FECHA_VALIDA.']');          
        if ($this->form_validation->run())
        {
            $data['dni'] = $this->input->post('dni');
            $data['apellido'] = $this->input->post('apellido');
            $data['nombre'] = $this->input->post('nombre');
            $data['domicilio'] = $this->input->post('domicilio');
            $data['telefono'] = $this->input->post('telefono');
            $data['email'] = $this->input->post('email');
            $data['fecha_nacimiento'] = php_datetime_to_mysql($this->input->post('fecha_nacimiento')); //Convertir formato de fecha a mysql                
            $edit = $this->Persona->update($Persona_id,$data);
            if ($edit) {
                $this->session->set_flashdata('success', 'Persona actualizada');
                redirect('personas/ver/'.$Persona_id);
                return;
            }
        }
        $Persona = $this->Persona->getDataById($Persona_id);        
        $data['Persona'] = $Persona;
        $this->view('edit-Persona',$data);
    }
    

    public function show($Persona_id) {
        $data['Persona_id'] = $Persona_id;
        $data['Persona'] = $this->Persona->getDataById($Persona_id);
        $this->view('view-Persona', $data);
    }
    
    public function destroy($Persona_id) {
        $delete = $this->Persona->delete($Persona_id);
        $this->session->set_flashdata('success', 'Persona eliminada');
        redirect('personas/index');
    }

    public function generatePDF(){
        $this->load->library('parser');
        $this->load->library('htmltopdf');
        $data['personas'] = $this->Persona->getAll();
        $this->htmltopdf->initialize('P', 'A4', 'es',FALSE,'ISO-8859-1');
        $this->htmltopdf->writeHTML($this->parser->parse('personas/reporte_personas',$data));               
        $this->htmltopdf->output('Personas.pdf');        
    }

    public function generateExcel(){
        $this->load->helper('excel_helper');
        $data = $this->Persona->getExcelData();
        to_excel($data,"Listado de personas","Personas");
    }
    
}
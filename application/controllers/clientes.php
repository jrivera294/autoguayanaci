<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Client_model');
    }

    public function index()
    {
        $query = $this->Client_model->getClient();
        $data['clientes'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('clientes/clientes_view',$data);
        $this->load->view('layouts/footer');   
    }
    
    public function register(){
        $this->load->view('layouts/header');
        $this->load->view('clientes/registrocliente_view');
        $this->load->view('layouts/footer');           
    }
    
    public function save(){
        $cliente =array(
            'cedula' => $this->input->post('cedula'),
            'nombre' => $this->input->post('nombre'),
            'apellido1' => $this->input->post('apellido1'),
            'apellido2' => $this->input->post('apellido2'),
            'sexo' => $this->input->post('sexo'),
            'fecha_nac' => $this->input->post('fecha_nac'),  
            'dir' => $this->input->post('dir'),
            'empresa' => $this->input->post('empresa'),
            'ingresos' => $this->input->post('ingresos')              
        );
        
        $result = $this->Client_model->addClient($cliente);
        
        $data['message_type']=1;
        $data['message']="Cliente registrado satisfactoriamente";

        $this->load->view('layouts/header',$data);
        $this->load->view('clientes/registrocliente_view');
        $this->load->view('layouts/footer');
    }

    public function cliente($cedula=0){
        $query = $this->Client_model->getClientByCedula($cedula);
        $data['cliente'] = $query;

        $this->load->view('layouts/header');
        $this->load->view('clientes/clientes_view',$data);
        $this->load->view('layouts/footer');
    }
    
     public function getClienteFactura(){
        $cedula = 24964467;
         
        $query = $this->Client_model->getClientByCedula($cedula);
        $data['cliente'] = $query;
         
        echo $query->nombre; 
        //$this->load->view('facturar',$data);
    }   
}
?>

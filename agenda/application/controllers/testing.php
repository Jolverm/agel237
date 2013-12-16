<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Testing extends CI_Controller {
    
        public function index(){
            
            $this->load->model(array('tareas_m'));
             
            $datos = array('fecha' => '2013-02-11', 'id_usuario' => '1');
            
            $respuesta['tareas'] = $this->tareas_m->consulta_tareas_usuario_m($datos);
            
            
           
            $datos['encabezado'] = $this->load->view('general/encabezado', $datos, TRUE);
            
            $datos['contenido'] = $this->load->view('testing', $respuesta, TRUE);
            
            $datos['pie'] = $this->load->view('general/pie', '', TRUE);
            
            $this->load->view('general/indice', $datos);
            
        }
        
    }

?>
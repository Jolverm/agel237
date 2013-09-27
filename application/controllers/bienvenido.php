
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bienvenido extends CI_Controller {

	public function __construct(){

		parent::__construct();

		$this->load->helper(array('url', 'date', 'fechas'));

		$this->load->library(array('session'));

	}

    public function index($mensaje = ''){

    		$sesion = $this->session->userdata('id_usuario');

    		if(empty($sesion)){

    			$datos['mensaje'] = $mensaje;
        
	            $datos['barra_herramientas'] = $this->load->view('general/barra_herramientas', '', TRUE);

	            $datos['encabezado'] = $this->load->view('general/encabezado', $datos, TRUE);
	            
	            $datos['contenido'] = $this->load->view('autenticar', '', TRUE);
	            
	            $datos['pie'] = $this->load->view('general/pie', '', TRUE);

	            $this->load->view('general/indice', $datos);

    		} else {

    			$url = base_url().'index.php/tareas/mostrar_vistas_c/tarea_usuario';

    			redirect($url);

    		}
        
    }
}

/* fin del archivo welcome.php */
/* Ubicación: ./application/controllers/bienvenido.php */
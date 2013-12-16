<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recepcion extends CI_Controller {

    public function __construct() {
   
        parent::__construct();
    
        $this->load->helper(array('url', 'html'));
        
    }

    public function index ($seccion = 'recepcion/visitantes') {
        
        $data['encabezado'] = $this->load->view('recepcion/encabezado', '', TRUE);
        
        $data['menu'] = $this->load->view('recepcion/menu-navegacion', '', TRUE);
        
        $data['seccion'] = $this->load->view($seccion, '', TRUE);
           
        $data['pie'] = $this->load->view('recepcion/pie', '', TRUE);
        
        $data['contenido'] = $this->load->view('recepcion/contenido', $data, TRUE);
        
        $this->load->view('recepcion/principal', $data);
	
    }
    
}
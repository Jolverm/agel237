<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Visitantes extends CI_Controller {
    
        public function mostrar_visita_c(){

        $datos['encabezado'] = $this->load->view('general/encabezado', '', TRUE);

        $datos['pie'] = $this->load->view('general/pie', '', TRUE);

         $this->load->view('visitantes', $datos); 



    }

        public function agregar_visita_c(){

        $this->load->model('visitantes_m');  

        foreach ($_POST as $campo => $valor){

                $datos[$campo] = $valor;
        }

        $this->visitantes_m->agregar_visita_m($datos);

        redirect(base_url().'index.php/visitantes/mostrar_visita_c');

    }
        
    }

?>
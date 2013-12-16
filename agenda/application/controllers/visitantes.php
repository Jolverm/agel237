<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Visitantes extends CI_Controller {
    
   
        public function agregar_visita_c(){

        $this->load->model('visitantes_m');  

        foreach ($_POST as $campo => $valor){

                $datos[$campo] = $valor;
        }

        $this->visitantes_m->agregar_visita_m($datos);

        redirect(base_url().'index.php/recepcion/index/');

         }
        

         public function agregar_visita_primera_c(){

        $this->load->model('visitantes_m');  

        foreach ($_POST as $campo => $valor){

                $datos[$campo] = $valor;
        }

        $this->visitantes_m->agregar_visita_primera_m($datos);

        redirect(base_url().'index.php/recepcion/index/primera');

         }

    
         public function consultar_visitantes_c(){

           $this->load->model('visitantes_m');
 
           $data['visitantes'] = $this->visitantes_m->consulta_visitantes_m();
           
           $this->load->view('consulta_visitantes', $data);


                
                

         }


    }

?>
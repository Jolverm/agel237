<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Testing extends CI_Controller {
    
        public function index(){
            
            $this->load->model(array('tareas_m'));
            /*
            $datos = array(
                //'id_tarea' => 1,
                'id_tipo_tarea' => 1,
                'hora' => '14:01:56',
                'fecha' => '2013/01/29',
                'calle' => '1',
                'institucion' => 'AMIJ',
                'operacion' => 'Compraventa',
                'rpp' => 'DF',
                'numeros' => '37458',
                'cliente' => 'Juan Hernan',
                'domicilio' => 'av tlahuac 34 tlahuac',
                'actividad' => 'recoger documento',
                'observaciones' => 'Puntual',
                'id_usuario_responsable' => '1',
                'tbl_usuarios_ag_id_usuario' => '2'
        );
            */
            
            $datos = array('fecha' => '2013-02-11', 'id_usuario' => '1');
            
            $respuesta['tareas'] = $this->tareas_m->consulta_tareas_usuario_m($datos);
            
            
            
            if(isset($_GET['callback'])){ // Si es una petición cross-domain
           echo $_GET['callback'].'('.json_encode($respuesta['tareas']).')';
        }
        else {// Si es una normal, respondemos de forma normal
           
            $datos['encabezado'] = $this->load->view('general/encabezado', $datos, TRUE);
            
            $datos['contenido'] = $this->load->view('testing', $respuesta, TRUE);
            
            $datos['pie'] = $this->load->view('general/pie', '', TRUE);
            
            $this->load->view('general/indice', $datos);
            
        }
            
            //echo $usuario = $this->tareas->agregar_tarea_m($datos);
            
            //$this->tareas->eliminar_tarea_m(1);

        }
        
    }

?>
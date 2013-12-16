<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('url'));
        
        $this->load->library(array('session'));

        $this->load->model(array('usuarios'));
        
    }
    
    public function autenticar_c(){
        
        //$datos['nombre_usuario'] = 'jedi';
        
        //$datos['contrasena'] = '2323sad';

        $datos = array('nombre_usuario' => $_POST['nombre_usuario'],'contrasena' =>  $_POST['contrasena']);
        
        $this->load->model(array('usuarios'));
        
        $respuesta = $this->usuarios->autenticar_m($datos);
        
        if(isset($respuesta['mensaje']) && $respuesta['mensaje'] == 0){
            
            redirect(base_url().'/index.php/bienvenido/index/usuario_o_contrasena_incorrectos');
            
        } else {
            
            $this->session->set_userdata($respuesta);
            
            $url = base_url().'index.php/tareas/mostrar_vistas_c/tarea_dia';

            redirect($url);
            
        }
        
        //print_r($repuestas);
        
    }
    
    public function destruir_sesion_c(){
        
        $this->session->sess_destroy();
        
        redirect(base_url());
        
    }
    
    public function traer_tareas_dia_c(){
        
        if(isset($_GET['callback'])){ // Si es una petición cross-domain
           
        } else { // Si es una normal, respondemos de forma normal
            
            $datos['date'] = '2013/01/15';
            
            //Se llama al modelo;
            
            $datos['encabezado'] = $this->load->view('general/encabezado', '', TRUE);
            $datos['contenido'] = 'Aqui van las tareas del dia '.$datos['date'];
            $datos['pie'] = $this->load->view('general/pie', '', TRUE);
            $this->load->view('general/indice', $datos);
            
        }
           
            
        
    }

    public function agregar_usuario(){

        foreach ($_POST as $campo => $valor){

                $datos[$campo] = $valor;

        }

        $mensaje = $this->usuarios->agregar_usuario_m($datos);

        if($mensaje > 0 ){
            $mensaje = 'usuario_agregado_exitosamente';
        } else {
            $mensaje = 'usuario_no_agregado';
        }

        redirect(base_url().'index.php/tareas/mostrar_vistas_c/agregar_usuario/'.$mensaje);

    }
    
}

/* fin del archivo usuario.php */
/* Ubicación: ./application/controllers/usuario.php */
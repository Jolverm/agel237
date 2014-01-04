<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tareas extends CI_Controller {
        
        public function __construct() {
            
            parent::__construct();
            
            $this->load->helper(array('url', 'date', 'fechas'));

            $this->load->library(array('session'));

            $this->load->model(array('tareas_m', 'usuarios'));
            
        }
        
        /* 
         * Metodo que decide que vista mostrar.
         * @author Emmanuelle Laguna
         * @date 2013.01.31
         * @updated AAAA.MM.DD
         * @param char $vista | Esta cadena contiene el nombre de la vista a cargar
         * @param char $mensaje | En caso de existir alguna mensaje, se puede pasar por medio de este parametro
         */

        public function mostrar_vistas_c($vista, $tarea_id = 0, $mensaje = '', $id_usuario = 0){

            $sesion = $this->session->userdata('id_usuario');

            if(empty($sesion)){

                redirect($base_url);

                die();

            }

            if($mensaje != ''){

                //echo $mensaje;

                $encabezado['mensaje'] = $mensaje;

                $encabezado['mensaje'] = ucwords(str_replace(array('_', 'sm', 'nm'), array(' ', '', ''), $encabezado['mensaje']));

            } else {

                $encabezado = '';

            }
     
            date_default_timezone_set("America/Mexico_City");

            if($id_usuario != 0){

                $data['id_usuario'] = $id_usuario;

            } else {

                $data['id_usuario'] = $this->session->userdata('id_usuario');                

            }
            
            if($mensaje!=''){
                
                $datos['mensaje'] = strtoupper(str_replace('_', ' ', $mensaje));
                
            }
            
            switch ($vista):
                
                case 'agregar_tarea':
                    
                    $respuesta['tipo_formulario'] = 'agregar_tarea_c';
                    
                    $respuesta['usuarios'] = $this->usuarios->traer_usuarios();

                    $datos['contenido'] = $this->load->view('tareas/agregar-editar_tarea', $respuesta, TRUE);
                    
                    break;
            
                case 'editar_tarea':
                    
                    //$datos = array('id_tarea' => '27');
                    
                    if($tarea_id != 0){
                        
                        $datos['id_tarea'] = $tarea_id;
                        
                        $respuesta['tareas'] = $this->consulta_tareas_id_c($datos);

                         $respuesta['usuarios'] = $this->usuarios->traer_usuarios();
                        
                    } else {
                        
                        $datos['mensaje'] = 'Tarea no existente';
                        
                    }
                    
                   $respuesta['tipo_formulario'] = 'editar_tarea_c';
                                        
                   $datos['contenido'] = $this->load->view('tareas/agregar-editar_tarea', $respuesta, TRUE);
                    
                    break;
                
                case 'eliminar_tarea':
                    
                    //$datos = array('id_tarea' => '27');
                    
                    if($tarea_id != 0){
                        
                        $datos['id_tarea'] = $tarea_id;
                        
                        $respuesta['tareas'] = $this->consulta_tareas_id_c($datos);
                        
                    } else {
                        
                        $datos['mensaje'] = 'Tarea no existente';
                        
                    }
                    
                   $respuesta ['tarea']= 'eliminar_tarea_c';
                                        
                   $datos['contenido'] = $this->load->view('tareas/eliminar_tarea', $respuesta, TRUE);
                    
                    break;
                    
                case 'tarea_usuario':

                    $datos['dia'] = date('Y-m-d');
                    
                    $datos = array('fecha' => $datos['dia']);

                    $datos['dia'] = traducir_fecha(standard_date());

                    $datos['id_usuario'] = $data['id_usuario'];

                    $datos['fecha'] = date('Y-m-d');

                    $datos['tareas'] = $this->tareas_m->consulta_tareas_usuario_m($datos);

                    $datos['usuarios'] = $this->usuarios->traer_usuarios();
                    
                    $datos['contenido'] = $this->load->view('tareas/tarea_usuario', $datos, TRUE);
                    
                    break;
                
                case 'tarea_dia':
                    
                    $respuesta['dia'] = date('Y-m-d');
                    
                    $datos = array('fecha' => $respuesta['dia']);

                    $respuesta['dia'] = traducir_fecha(standard_date());
                    
                    $respuesta['manana'] = false;

                    $respuesta['tareas'] = $this->consulta_tareas_dia_c($datos);

                    $respuesta['usuarios'] = $this->usuarios->traer_usuarios();
                    
                    $datos['contenido'] = $this->load->view('tareas/tarea_dia', $respuesta, TRUE);
                    
                  break;

                  case 'tarea_dia_usuario':
                    
                    $respuesta['dia'] = date('Y-m-d');

                    $respuesta['manana'] = true;
                    
                    $datos = array('fecha' => $respuesta['dia'], 'id_usuario' => $data['id_usuario']);

                    $respuesta['dia'] = traducir_fecha(standard_date());

                    $respuesta['tareas'] = $this->consulta_tareas_dia_c($datos);

                    $respuesta['usuarios'] = $this->usuarios->traer_usuarios();
                    
                    $datos['contenido'] = $this->load->view('tareas/tarea_dia', $respuesta, TRUE);
                    
                  break;

                  case 'tarea_manana':
                    
                    $hoy = date('Y-m-d');

                    $respuesta['dia'] = date("Y-m-d", strtotime( "$hoy + 1 day")) ; 
                    
                    $datos = array('fecha' => $respuesta['dia']);

                    $respuesta['manana'] = true;

                    $fecha_dia_siguiente =  str_replace('-', 'de', date("D d - M - Y", strtotime( "$hoy + 1 day")));

                    $respuesta['dia'] = traducir_fecha($fecha_dia_siguiente);
                    
                    $respuesta['tareas'] = $this->consulta_tareas_dia_c($datos);

                     $respuesta['usuarios'] = $this->usuarios->traer_usuarios();
                    
                    $datos['contenido'] = $this->load->view('tareas/tarea_dia', $respuesta, TRUE);
                    
                  break;
                
                case 'consulta_tareas_id':
                    
                    if($tarea_id != 0){
                        
                        $datos['id_tarea'] = $tarea_id;
                        
                        $respuesta['tareas'] = $this->consulta_tareas_id_c($datos);
                        
                    } else {
                        
                        $datos['mensaje'] = 'Tarea no existente';
                        
                    }

                     $respuesta['usuarios'] = $this->usuarios->traer_usuarios();
                    
                    $respuesta['id_tarea']= 'consulta_tarea_id_c';
                                        
                   $datos['contenido'] = $this->load->view('tareas/consulta_tareas_id', $respuesta, TRUE);
                   
                    
                  break;
                
                case 'resumen':

                    if(isset($_POST['date_resume'])){

                        $datos['contenido'] = $this->resumen_c($_POST['date_resume']);

                    } else {

                        $datos['contenido'] = $this->resumen_c();

                    }

                break;

                case 'asignar_tramites':

                    $respuesta['usuarios'] = $this->usuarios->traer_usuarios();

                    $hoy = date('Y-m-d');

                    $respuesta['dia'] = date("Y-m-d", strtotime( "$hoy + 1 day")) ; 
                    
                    $datos = array('fecha' => $respuesta['dia']);

                    $respuesta['tareas'] = $this->consulta_tareas_dia_c($datos);

                    $respuesta['dia'] = traducir_fecha(str_replace('-', 'de', date("D d - M - Y", strtotime( "$hoy + 1 day"))));

                    $datos['contenido'] = $this->load->view('tareas/asignacion_tramites', $respuesta, TRUE);

                break;

                case 'asignar_ta':

                    if(isset($_POST['date_resume'])){

                        $datos['contenido'] = $this->resumen_c($_POST['date_resume'], 'asignar_ta');

                    } else {

                        $hoy = date('Y-m-d');

                        $dia_siguiente = date("D d - M - Y", strtotime( "$hoy + 1 day"));

                        $datos['contenido'] = $this->resumen_c($dia_siguiente, 'asignar_ta');

                    }

                break;

                case 'agregar_usuario':

                    $respuesta['campos'] = $this->usuarios->traer_estructura();

                    $respuesta['roles'] = $this->usuarios->traer_roles();

                    $datos['contenido'] = $this->load->view('usuarios/agregar-editar', $respuesta, TRUE);

                break;
                
            endswitch;

            $datos['encabezado'] = $this->load->view('general/encabezado', $encabezado, TRUE);

            $datos['permisos'] = $this->session->all_userdata();

            $datos['barra_herramientas'] = $this->load->view('general/barra_herramientas', $datos, TRUE);

            $datos['pie'] = $this->load->view('general/pie', '', TRUE);

            $this->load->view('general/indice', $datos);
            
        }

        /* 
         * Metodo que agrega una nueva tarea por medio del modelo tareas.
         * @author Jorge Olvera
         * @author Emmanuelle Laguna
         * @date 2013.01.31
         * @updated 2013.01.31
         */
        
        public function agregar_tarea_c(){
            
            //Se reciben las variables POST y se forma el arreglo $datos

            foreach ($_POST as $campo => $valor){

                $datos[$campo] = $valor;

            }

            //Se carga el modelo tareas

            $this->load->model(array('tareas_m'));
            
            //Se manda la información al metodo que agrega una tarea
            
            $respuesta = $this->tareas_m->agregar_tarea_m($datos);
            
            //Se revisa si la inserción fue exitosa o no y se manda un aviso en cualquier caso

            if($respuesta == 1){

                $mensaje = 'tarea_agregada_exitosamente';
                 

            } else {

                $mensaje = 'tarea_no_agregada';

            }
            
            /*
             * Por ultimo se redirecciona 
             * NOTA: Aqui se redirecciona al metodo para agregar tareas, pero aún esta por definirse el metodo
             */
             redirect(base_url().'index.php/tareas/mostrar_vistas_c/agregar_tarea/0/'.$mensaje);
            
        }// fin de Agregar tarea

        public function resumen_c($date = '', $opc = ''){
            

            if($date == ''){

                $hoy = date('Y-m-d');   

                $respuesta['dia'] = date("Y-m-d");

                $datos['dia'] = traducir_fecha(standard_date());
                
                $datos['fecha_resumen']=$hoy;

                $datos['tareas'] = $this->tareas_m->consulta_tareas_resumen_m($respuesta);

            } else {
                
                 
                $respuesta['dia'] = date("Y-m-d");

                $datos['dia'] = $date;
                
                $datos['tareas'] = $this->tareas_m->consulta_tareas_resumen_m($datos);

                $datos['dia'] =  traducir_fecha( str_replace('-', 'de', date("D d - M - Y", strtotime( "$date"))));
                
                $datos['fecha_resumen']=$date;
            
                
            }

            $datos['fechas'] = $this->tareas_m->obtener_fechas();

            $datos['usuarios'] = $this->usuarios->traer_usuarios();

            if($opc != ''){

                $datos['atributos'] = $this->tareas_m->catalogo_atributos();

                //print_r($datos['atributos']);

                $datos['contenido'] = $this->load->view('tareas/asignacion_tel_auto', $datos, TRUE);

            } else {

                $datos['atributos'] = $this->tareas_m->catalogo_atributos_por_usuario();
                
                $datos['contenido'] = $this->load->view('tareas/resumen', $datos, TRUE);

            }            

            return $datos['contenido'];

        }
        
            
          /* 
         * Metodo que edita una tarea por medio del modelo tareas.
         * @author Jorge Olvera
         * @date 2013.01.31
         */
        
        
       public function editar_tarea_c(){
            
           //Se reciben las variables POST y se forma el arreglo $datos

            foreach ($_POST as $campo => $valor){

                $datos[$campo] = $valor;

            }
           
            //Se carga el modelo tareas

            $this->load->model(array('tareas_m'));
            
            //Se manda la información al metodo que agrega una tarea
            
            $respuesta = $this->tareas_m->editar_tarea_m($datos);
            
         
            //Se revisa si la inserción fue exitosa o no y se manda un aviso en cualquier caso

            if($respuesta == 1){

                $mensaje = 'tarea_modificada_exitosamente';
                 

            } else {

                $mensaje = 'tarea_no_modificada';

            }
            
            /*
             * Por ultimo se redirecciona 
             * NOTA: Aqui se redirecciona al metodo para agregar tareas, pero aún esta por definirse el metodo
             */
            
            redirect(base_url().'index.php/tareas/mostrar_vistas_c/editar_tarea/'.$_POST['id_tarea'].'/'.$mensaje);
            
        }// fin de Agregar tarea
        
            
            
             /* 
         * Metodo que elimina una tarea por medio del modelo tareas (no la borra unicamente cambia su estatus).
         * @author Jorge Olvera
         * @date 2013.01.31
         */
        
        public function eliminar_tarea_c(){
            
             
            //Se carga el modelo tareas

            $this->load->model(array('tareas_m'));
            
            //Se manda la información al metodo que agrega una tarea
            
            $respuesta = $this->tareas_m->eliminar_tarea_m($_POST['id_tarea']);
            
          
            //Se revisa si la inserción fue exitosa o no y se manda un aviso en cualquier caso

            if($respuesta == 1){

                $mensaje = 'tarea_eliminada';
                 

            } else {

                $mensaje = 'tarea_no_eliminada';

            }
            
            /*
             * Por ultimo se redirecciona 
             * NOTA: Aqui se redirecciona al metodo para agregar tareas, pero aún esta por definirse el metodo
             */
            
            redirect(base_url().'index.php/tareas/mostrar_vistas_c/tarea_dia/0/'.$mensaje);
            
        }// fin de Agregar tarea
        
         
        
            
             /* 
         * Metodo que consulta las tareas por Usuario por medio del modelo tareas.
         * @author Jorge Olvera
         * @date 2013.01.31
         */
        
        
         public function consulta_tareas_usuario_c($datos){
            
                $this->load->model(array('tareas_m'));

                $datos = array('fecha' => '2013-01-30', 'id_usuario' => $datos['id_usuario']);

                $respuesta['tareas'] = $this->tareas_m->consulta_tareas_usuario_m($datos);
            
            }// Fin de Consulta_tareas Usuarios
        
            
             /* 
         * Metodo que consulta todas las tareas del dia por medio del modelo tareas.
         * @author Jorge Olvera
         * @date 2013.01.31
         */
        
        
                public function consulta_tareas_dia_c($datos){

                $this->load->model(array('tareas_m'));

                $respuesta = $this->tareas_m->consulta_tareas_dia_m($datos);
                
                return $respuesta;

                }// Fin de Consulta_tareas dia
        
        
                
             /* 
         * Metodo que consulta todas las tareas del dia por medio del modelo tareas.
         * @author Jorge Olvera
         * @date 2013.01.31
         */
        
        
                public function consulta_tareas_id_c($datos){

                $this->load->model(array('tareas_m'));

                $respuesta = $this->tareas_m->consulta_tareas_id_m($datos);
                
                return $respuesta;

                }// Fin de Consulta_tareas dia

        /* 
         * Metodo que actualiza al usuario asignado en una tarea.
         * @author Emmanuelle Laguna
         * @date 2013.04.08
         */
        
        
        public function asigna_tareas(){

            if(isset($_POST['id_usuario']) && isset($_POST['id_tarea'])){

                $datos = array('tbl_usuarios_ag_id_usuario' => $_POST['id_usuario'], 'id_tarea' => $_POST['id_tarea']);

                $mensaje = $this->tareas_m->actualiza_asignado($datos);

                //echo $mensaje;

            }

        }// Fin de Consulta_tareas dia
        
    public function agregar_atributo(){
        
        foreach ($_POST as $campo => $valor){

                $datos[$campo] = $valor;

            }
        
        //$datos = array('nombre_atributo' => 'Chevy Rojo', 'tipo_atributo' => 'AUTOMOVIL', 'fecha' => '2013-04-28', 'tbl_usuarios_ag_id_usuario' => '1');

        $hoy = date('Y-m-d');

        $datos['fecha'] = date("Y-m-d", strtotime( "$hoy + 1 day")) ; 

        $select = $this->tareas_m->select_add_atr($datos);

        if($select['mensaje'] == 0){
            
            unset($datos['mensaje']);
            
            $this->tareas_m->insertar_atributo($datos);
            
        } else {
            
            unset($datos['mensaje']);
            
            $this->tareas_m->update_atributo($datos);
            
        }
        
    }

    /* Las dos funciones siguientes traen listas que son devueltes como json */

    public function traer_clientes(){

      $clientes = $this->tareas_m->select_clientes();

      $clientes = json_encode($clientes);

      print_r($clientes);

    }



    public function traer_usuarios_lista(){

      $usuarios = $this->usuarios->traer_usuarios();

      foreach ($usuarios as $usuario ) {
        
        $lista[$usuario['id_usuario']] = array('label' => $usuario['nombre_real'].' '.$usuario['apellido_paterno'], 'value' => $usuario['id_usuario']);

      }

      $lista = json_encode($lista);

      print_r($lista);

    }
       
        
        
}// fin de Clase Tareas

?>
<?php
class Tareas_m extends CI_Model {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->database();
        
    }
    
    /* 
    * Método agrega una nueva tarea a la base de datos
    * @author Emmanuelle Laguna
    * @date 2013.01.30
    * @updated 0000.00.00
    * @param array datos | Este arreglo contiene los datos de las tareas, por ejemplo: id del usuario asignado, fecha de la tarea, hora de la tarea, etc.
    * @return int | Este entero se obtiene de contabilizar las fila afectadas.
    * @ejem 1;
    */
    
    public function agregar_tarea_m($datos){
        
        $query = $this->db->insert('tareas_ag', $datos);
        
        return $this->db->count_all_results();
        
    }
    
    /* 
    * Método edita una tarea en la base de datos
    * @author Emmanuelle Laguna
    * @date 2013.01.30
    * @updated 0000.00.00
    * @param array datos | Este arreglo contiene los datos a editar en una tarea, por ejemplo: id del usuario asignado, fecha de la tarea, hora de la tarea, etc.
    * Nota: Es necesario pasar el id_tarea para que se pueda realizar la consulta.
    * @return int | Este entero se obtiene de contabilizar las fila afectadas.
    * @ejem 1;
    */
    
    public function editar_tarea_m($datos){
        
        $this->db->where('id_tarea', $datos['id_tarea']);
        
        $this->db->update('tareas_ag', $datos);
        
        return $this->db->count_all_results();
        
    }
    
    /* 
    * Método cambia el estatus de una tarea. 1 Para tareas activas | 0 Para tareas inactivas
    * @author Emmanuelle Laguna
    * @date 2013.01.30
    * @updated 0000.00.00
    * @param int id_tarea | Contiene el id de la tarea a eliminar
    * @return int | Este entero se obtiene de contabilizar las fila afectadas.
    * @ejem 1;
    */
    
    public function eliminar_tarea_m($id_tarea){
        
        $this->db->where('id_tarea', $id_tarea);
        
        $datos['estatus'] = 0;
        
         $this->db->from('tareas_ag');
        
        $this->db->update('tareas_ag', $datos);
        
        return $this->db->count_all_results();
        
        
    }
    
    /* 
    * Método consulta las tareas por usuario a la base de datos
    * @author Emmanuelle Laguna
    * @date 2013.01.30
    * @updated 0000.00.00
    * @param array datos | Este arreglo contiene los datos de las tareas, por ejemplo: id del usuario asignado, fecha de la tarea, hora de la tarea, etc.
    * @return datos | Regresa los datos de la consulta.
    * @ejem id_tarea, id_tipo_tarea, hora, fecha, calle, institucion.
    */
    
    public function consulta_tareas_usuario_m($datos){
        
        $this->db->select();
        
        $this->db->from('tareas_ag');
        
        $this->db->where('fecha', $datos['fecha']);
        
        if(isset($datos['id_usuario']) && $datos['id_usuario'] != 0){
            
            $this->db->where('tbl_usuarios_ag_id_usuario', $datos['id_usuario']);
            
        }
        
        $query = $this->db->get();
        
        unset($datos);
        
        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[$row['id_tarea']] = $row;
                
            }
        
        }
        
        return $datos;
        
        
        
    }
    
     /* 
    * Método consulta las tareas por usuario por dia a la base de datos
    * @author Emmanuelle Laguna
    * @date 2013.01.30
    * @updated 2013.01.04
    * @param array datos | Este arreglo contiene los datos de las tareas, por ejemplo: id del usuario asignado, fecha de la tarea, hora de la tarea, etc.
    * @return datos | Regresa los datos de la consulta.
    * @ejem id_tarea, id_tipo_tarea, hora, fecha, calle, institucion.
    */
    
    
     public function consulta_tareas_dia_m($datos){
        
        $this->db->select();
        
        $this->db->from('tareas_ag');
        
        $this->db->where('fecha', $datos['fecha']);
        
        $this->db->where('estatus', 1);

        if(isset($datos['id_usuario']) && $datos['id_usuario'] != 0){
            
            $this->db->where('tbl_usuarios_ag_id_usuario', $datos['id_usuario']);
            
        }
        
        $this->db->order_by('hora', 'asc'); 
        
        $query = $this->db->get();
        
        unset($datos);
        
        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[$row['id_tarea']] = $row;
                
            }
        
        }
        
        return $datos;
        
    }

    public function consulta_tareas_resumen_m($datos){
        
        $this->db->select();
        
        $this->db->from('tareas_ag');
        
        if(!isset($datos['dia'])){

            $this->db->where('fecha', date('Y-m-d'));

        } else {

            $this->db->where('fecha', $datos['dia']);

        }
        
        $this->db->where('estatus', 1);
        
        $this->db->order_by('tbl_usuarios_ag_id_usuario', 'asc'); 
        
        $query = $this->db->get();
        
        //print_r($this->db->last_query());

        unset($datos);
        
        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[$row['tbl_usuarios_ag_id_usuario']][$row['id_tarea']] = $row;
                
            }
        
        }
        
        return $datos;
        
    }
    
    
     /* 
    * Método consulta las tareas por usuario por dia a la base de datos
    * @author Emmanuelle Laguna
    * @date 2013.01.30
    * @updated 0000.00.00
    * @param array datos | Este arreglo contiene los datos de las tareas, por ejemplo: id del usuario asignado, fecha de la tarea, hora de la tarea, etc.
    * @return datos | Regresa los datos de la consulta.
    * @ejem id_tarea, id_tipo_tarea, hora, fecha, calle, institucion.
    */
    
    
     public function consulta_tareas_id_m($datos){
        
        $this->db->select();
        
        $this->db->from('tareas_ag');
        
        $this->db->where('id_tarea', $datos['id_tarea']);
        
        $query = $this->db->get();
        
        unset($datos);
        
        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[$row['id_tarea']] = $row;
                
            }
        
        }
        
        return $datos;
        

        
    }//fin de consulta_tareas

    public function obtener_fechas(){

        $hoy = date('Y-m-d');

        $this->db->select('fecha');

        $this->db->from('tareas_ag');

        $this->db->where('fecha >=', $hoy);

        $this->db->order_by('fecha desc');

        $this->db->group_by('fecha');

        $query = $this->db->get();
        
        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[] = $row;
                
            }
        
        }
        
        return $datos;

    }

    /* 
    * Método actualiza a un usuario asignado a una tarea
    * @author Emmanuelle Laguna
    * @date 2013.04.08
    * @updated 0000.00.00
    * @param array datos | id_usuario e id_tarea.
    * @return datos | Mensaje de error o exito.
    * @ejem mensaje => 0 || mensaje => 1.
    */
    
    
     public function actualiza_asignado($datos){

        $this->db->where('id_tarea', $datos['id_tarea']);
        
        $query = $this->db->update('tareas_ag', $datos); 

        $query = $this->db->get();

        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[] = $row;
                
            }
        
        }
        
        return $datos;

     }//Termina funcion actualiza asignado

     public function catalogo_atributos(){

        $this->db->select();

        $this->db->from('atributos_ag');

        $this->db->group_by('nombre_atributo');

        $query = $this->db->get();

        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[$row['tipo_atributo']][] = $row;
                
            }
        
        }
        
        return $datos;   
     }

     public function catalogo_atributos_por_usuario(){

        $this->db->select();

        $this->db->from('atributos_ag');

        $this->db->group_by('nombre_atributo');

        $query = $this->db->get();

        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos[$row['tipo_atributo']][$row['tbl_usuarios_ag_id_usuario']] = $row;
                
            }
        
        }
        
        return $datos;   
     }
     
     public function insertar_atributo($datos){
         
         $this->db->insert('atributos_ag', $datos);
         
     }
     
     public function update_atributo($datos){
         
        $this->db->where('tipo_atributo', $datos['tipo_atributo']);
         
        $this->db->where('fecha', $datos['fecha']);

        $this->db->where('tbl_usuarios_ag_id_usuario', $datos['tbl_usuarios_ag_id_usuario']);

        $this->db->update('atributos_ag', $datos);
         
     }
     
     public function select_add_atr($datos){
         
         $this->db->select();
         
         $this->db->from('atributos_ag');
         
         $this->db->where('tipo_atributo', $datos['tipo_atributo']);
         
         $this->db->where('fecha', $datos['fecha']);

         $this->db->where('tbl_usuarios_ag_id_usuario', $datos['tbl_usuarios_ag_id_usuario']);
         
         $query = $this->db->get();
         
         if($query->num_rows() > 0){
        
            $datos['mensaje'] = 1;
        
        } else {
        
            $datos['mensaje'] = 0;
        
        }
        
        return $datos;
         
     }
    
    
}// FIn de Clase Tareas_m
?>

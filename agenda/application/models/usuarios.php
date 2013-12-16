<?php
class Usuarios extends CI_Model {
    
    public function __construct() {
        parent::__construct();
            $this->load->database();
    }

   /* 
    * Método que verifica que la paridad usuario contraseña exista
    *
    * @param array datos | Este arreglo contiene los indices nombre_usuario y contrasena
    * @return array datos | Este arreglocontiene un indice que se llama mensaje
    * en caso de existir la paridad devuelve 1 y los datos de usuario, de lo contrario devuelve 0
    * @ejem $datos([mensaje] => 1 [0] => [id_usuario] => 2 [nombre_usuario] => juan [nombre_real] => Juan Manuel [apellido_paterno] => HernÃ¡ndez [apellido_materno] => HernÃ¡ndez [id_rol] => 1 ) )
    */
    
    public function autenticar_m($datos){
        
        $this->db->select('id_usuario, nombre_usuario, nombre_real, apellido_paterno, apellido_materno, tbl_roles_ag_id_rol');
        
        $this->db->from('usuarios_ag');
        
        $this->db->where('nombre_usuario', $datos['nombre_usuario']);
        
        $this->db->where('contrasena', $datos['contrasena']);
        
        $query = $this->db->get();
        
        unset($datos);
        
        if($query->num_rows() < 1){
        
            $datos['mensaje'] = 0;
        
        } else {
        
            foreach($query->result_array() as $row){
            
                $datos = $row;
                
            }
        
        }
        
        return $datos;
        
    }

    /* Trae los roles de un usuario */

    public function traer_roles(){

        $this->db->select();

        $this->db->from('roles_ag');

        $roles = $this->db->get();

        foreach($roles->result_array() as $rol){
            
            $datos[$rol['id_rol']] = $rol;
            
        }

        return $datos;

    }

    public function traer_usuarios(){

        $this->db->select();

        $this->db->from('usuarios_ag');

        $usuarios = $this->db->get();

        if($usuarios->num_rows() < 1){

            $datos['mensaje'] = 0;

        } else {

            foreach($usuarios->result_array() as $row){
            
                $datos[$row['id_usuario']] = $row;
                
            }

        }

        return $datos;


    }

    function traer_estructura(){

        $fields = $this->db->field_data('usuarios_ag');

        foreach ($fields as $field){
            
            $fields_data[] = $field;

        }

        return $fields_data;

    }

    public function agregar_usuario_m($datos){
        
        $query = $this->db->insert('usuarios_ag', $datos);
        
        return $this->db->count_all_results();
        
    }
    
}
?>

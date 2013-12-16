<?php
class Visitantes_m extends CI_Model {
    
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
  

    public function agregar_visita_m($datos){
        
        $query = $this->db->insert('tbl_visitantes', $datos);
        
        return $this->db->count_all_results();
        
    }
    
   public function agregar_visita_primera_m($datos){
        
        $query = $this->db->insert('tbl_visitantes_primera', $datos);
        
        return $this->db->count_all_results();
        
    }


     public function consulta_visitantes_m(){
        
        $query = $this->db->get('tbl_visitantes');
              if($query->num_rows() > 0)
              {
                 foreach ($query->result() as $fila)
                 {
                    $data[] = $fila;
                 }
                 return $data;
              }
              else
              {
                 return False;
              }
          }
        
    








        
       



}
?>



<?php 
class Usuario_model extends CI_Model {

public function __construct()
    {
        $this->load->database();
    }



public function get_usuarios()
    {
    $query = $this->db->get('usuario');
        
    return $query->result_array();
    }

public function set_usuario($data)
    {
    $this->load->helper('url');

    // $data = array('usuario' => $this->input->post('usuario'),
    //     'nome' => $this->input->post('nome'),
    //     'senha' => $this->input->post('senha'));

    return $this->db->insert('usuario', $data);
    } 

public function verificar_usuario($usuario, $senha){

  $query = $this->db->get_where('usuario', array('usuario' => $usuario,
                                                  'senha' => md5($senha)));
  
      
if ($query->num_rows() > 0) {
      
  return $query->result_array(); 
 } else {
   return false;
    
 }
  
  
  


}

public function delete_usuario_id($id)
{
return    $this->db->delete('usuario', array('id_usuario' => $id)); 
}

public function get_usuario_id($id)
{
  $usuario = $this->db->get_where('usuario', array('id_usuario' =>$id));
 
  return  $usuario->row();
 
}


public function atualizar_usuario_id($id,$data){  
$this->db->where('id_usuario', $id);
return $this->db->update('usuario', $data);
}



public function record_count() {
 
       return $this->db->count_all_results("Usuario");
 
   }

public function fetch_usuarios($limit, $start) {
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("Usuario");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }

}

 ?>
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Local_model extends CI_Model{


	public function __construct(){
			$this->load->database();
	}

	public function get_locais(){
		$query = $this->db->get('local');


		return $query->result_array();
	}

	public function set_local($data){

		return $this->db->insert('local', $data);
	}

	public function get_local_id($id){
		$local = $this->db->get_where('local', array('id_local' => $id));

		return $local->row();
	}

	public function delete_local_id($id){

	return $this->db->delete('local', array('id_local' => $id));
	}

	public function atualizar_local_id($id,$data){
		$this->db->where('id_local', $id);
		
	return 	$this->db->update('local', $data);

	}

	public function get_detalhes_local_id($id){
		
		$query = $this->db->select('*')->join('equipamento', 'estoque_gerencia.fk_equipamento_id = equipamento.id_equipamento')->join('local','estoque_gerencia.fk_local_id = local.id_local')->get_where('estoque_gerencia', array('fk_local_id' => $id));
		
		

		return $query->result();

	}

	public function buscar($buscar = null){
        
        $query = $this
                ->db
                ->select('*')
                ->from('local')
                ->like('nome_local',$buscar)
                ->get();
        
        

        if($query->num_rows()>0)
        {
      
            return $query->result(); 
            
        }
        else
        {
     
            return null;
            
        }
    }


}	


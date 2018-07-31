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
		$query = $this->db->
				->select('*')
				>join('equipamento', 'local.fk_equipamento_id = equipamento.id_equipamento')

		$query = $this->db->select('*')->join('equipamento', 'baixa_estoque.fk_equipamento_id = equipamento.id_equipamento')->join('local','baixa_estoque.fk_local_id = local.id_local')->join('setor','baixa_estoque.fk_setor_id = setor.id_setor')->get_where('baixa_estoque', array('fk_equipamento_id' => $id));
		
		

		return $query->result_array();

	}

	public function buscar($buscar){
        
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


<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Setor_model extends CI_Model{


	public function __construct(){
			$this->load->database();
	}

	public function get_setors(){
		$query = $this->db->get('setor');


		return $query->result_array();
	}

	public function set_setor($data){

		return $this->db->insert('setor', $data);
	}

	public function get_setor_id($id){
		$setor = $this->db->get_where('setor', array('id_setor' => $id));

		return $setor->row();
	}

	public function delete_setor_id($id){

	return $this->db->delete('setor', array('id_setor' => $id));
	}

	public function atualizar_setor_id($id,$data){
		$this->db->where('id_setor', $id);
		
	return 	$this->db->update('setor', $data);

	}

	public function buscar($buscar){
        
        $query = $this
                ->db
                ->select('*')
                ->from('setor')
                ->like('nome_setor',$buscar)
                ->or_like('responsavel',$buscar)
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


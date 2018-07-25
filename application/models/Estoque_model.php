<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Estoque_model extends CI_Model{


	public function __construct(){
			$this->load->database();
	}

	public function get_estoques1(){
		$query = $this->db->get('estoque_gerencia');


		return $query->result_array();
	}

	 public function get_estoques(){
        $query = $this->db->select('*')->from('estoque_gerencia')->join('equipamento','estoque_gerencia.fk_equipamento_id = equipamento.id_equipamento')->join('local','estoque_gerencia.fk_local_id = local.id_local')->get();
        return $query->result_array();
    }

	public function set_estoque($data){

		return $this->db->insert('estoque_gerencia', $data);
	}

	public function set_baixa($data){
		return $this->db->insert('baixa_estoque', $data);
	}

	public function get_estoque_id1($id){
		$query = $this->db->get_where('estoque_gerencia', array('id_estoque' => $id));


		return $query->row();
	}

	public function get_estoque_id($id){
		$query = $this->db->select('*')->join('equipamento', 'estoque_gerencia.fk_equipamento_id = equipamento.id_equipamento')->join('local','estoque_gerencia.fk_local_id = local.id_local')->get_where('estoque_gerencia', array('id_estoque' => $id));
		


		return $query->row();
	}

	public function get_detalhes_baixa_id($id){
		$query = $this->db->select('*')->join('equipamento', 'baixa_estoque.fk_equipamento_id = equipamento.id_equipamento')->join('local','baixa_estoque.fk_local_id = local.id_local')->join('setor','baixa_estoque.fk_setor_id = setor.id_setor')->get_where('baixa_estoque', array('fk_equipamento_id' => $id));
		
		

		return $query->result_array();
	}

	public function delete_estoque_id($id){

	return $this->db->delete('estoque_gerencia', array('id_estoque' => $id));
	}

	public function atualizar_estoque_id($id,$data){
		$this->db->where('id_estoque', $id);
		
	return 	$this->db->update('estoque_gerencia', $data);

	}

	public function atualizar_estoque_baixa_id($id,$quantidade_atualizada){
		$this->db->where('id_estoque', $id);
		
	return 	$this->db->update('estoque_gerencia', array('quantidade' => $quantidade_atualizada));

	}

	public function buscar($buscar){
		
        $query = $this
                ->db
                ->select('*')
                ->from('estoque_gerencia')
                ->join('equipamento', 'estoque_gerencia.fk_equipamento_id = equipamento.id_equipamento')->join('local','estoque_gerencia.fk_local_id = local.id_local')
                ->like('nome_equipamento',$buscar)
                ->or_like('nome_local', $buscar)
                ->or_like('patrimonio',$buscar)
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


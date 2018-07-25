<?php
class Emprestimo_model extends CI_Model {

        public function __construct(){
            $this->load->database();
    }

    public function get_emprestimos1(){
        $query = $this->db->get('emprestimo');
        return $query->result_array();
    }

    public function get_emprestimos(){
        $query = $this->db->select('*')->from('emprestimo')->join('equipamento', 'emprestimo.fk_equipamento_id = equipamento.id_equipamento')->join('setor', 'emprestimo.fk_setor_id = setor.id_setor')->get();
        return $query->result_array();
    }
    

    public function set_emprestimo($data){

        return $this->db->insert('emprestimo', $data);
    }

    public function get_equipamento_id1($id){
        //$equipamento = $this->db->get_where('equipamento', array('id_equipamento' => $id));
        $query = $this->db->select('*')->from('equipamento')->join('fabricante','equipamento.fk_fabricante_id = fabricante.id_fabricante')->where('id_equipamento',$id)->get();

        //return $equipamento->row();
        return $query->row();
    }

     public function get_emprestimo_id($id){
        $query = $this->db->select('*')->from('emprestimo')->join('equipamento', 'emprestimo.fk_equipamento_id = equipamento.id_equipamento')->join('setor', 'emprestimo.fk_setor_id = setor.id_setor')->where('id_emprestimo', $id)->get();

        return $query->row();
    }

    public function delete_emprestimo_id($id){

    return $this->db->delete('emprestimo', array('id_emprestimo' => $id));
    }

    public function atualizar_emprestimo_id($id,$data){
    
    $this->db->where('id_emprestimo', $id); 
        
    return  $this->db->update('emprestimo', $data);

    }

    public function buscar($buscar){
        $query = $this
                ->db
                ->select('*')
                ->from('emprestimo')
                ->join('equipamento', 'emprestimo.fk_equipamento_id = equipamento.id_equipamento')->join('setor', 'emprestimo.fk_setor_id = setor.id_setor')
                ->like('nome_equipamento',$buscar)
                ->or_like('nome_setor',$buscar)
                ->or_like('situacao',$buscar)
                ->or_like('data_fim',$buscar)
                ->or_like('data_inicio',$buscar)
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
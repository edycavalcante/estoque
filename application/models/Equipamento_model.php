<?php
class Equipamento_model extends CI_Model {

        public function __construct(){
            $this->load->database();
    }

    public function get_equipamentos1(){
        $query = $this->db->get('equipamento');
        return $query->result_array();
    }

    public function get_equipamentos(){
        $query = $this->db->select('*')->from('equipamento')->join('fabricante','equipamento.fk_fabricante_id = fabricante.id_fabricante')->get();
        return $query->result_array();
    }
    // public function get_equipamentos($data_filter){
    //     $query = $this->db->select('*')->from('equipamento')->join('fabricante','equipamento.fk_fabricante_id = fabricante.id_fabricante')->get();
    //     return $query->result_array();
    // }

    public function set_equipamento($data){

        return $this->db->insert('equipamento', $data);
    }

    public function get_equipamento_id($id){
        //$equipamento = $this->db->get_where('equipamento', array('id_equipamento' => $id));
        $query = $this->db->select('*')->from('equipamento')->join('fabricante','equipamento.fk_fabricante_id = fabricante.id_fabricante')->where('id_equipamento',$id)->get();

        //return $equipamento->row();
        return $query->row();
    }

     public function get_equipamento_id1($id){
        $equipamento = $this->db->get_where('equipamento', array('id_equipamento' => $id));

        return $equipamento->row();
    }

    public function delete_equipamento_id($id){

    return $this->db->delete('equipamento', array('id_equipamento' => $id));
    }

    public function atualizar_equipamento_id($id,$data){
    
    $this->db->where('id_equipamento', $id); 
        
    return  $this->db->update('equipamento', $data);

    }

    public function buscar($buscar){
        $query = $this
                ->db
                ->select('*')
                ->from('equipamento')
                ->join('fabricante','equipamento.fk_fabricante_id = fabricante.id_fabricante')
                ->like('nome_equipamento',$buscar)
                ->or_like('nome_fabricante',$buscar)
                ->or_like('tipo',$buscar)
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
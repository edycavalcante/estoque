<?php
class Fabricante_model extends CI_Model {

        public function __construct(){
            $this->load->database();
    }

    public function get_fabricantes(){
        $query = $this->db->get('fabricante');


        return $query->result_array();
    }

    public function set_fabricante($data){

        return $this->db->insert('fabricante', $data);
    }

    public function get_fabricante_id($id){
        $fabricante = $this->db->get_where('fabricante', array('id_fabricante' => $id));

        return $fabricante->row();
    }

    public function delete_fabricante_id($id){

    return $this->db->delete('fabricante', array('id_fabricante' => $id));
    }

    public function atualizar_fabricante_id($id,$data){
        $this->db->where('id_fabricante', $id);
        
    return  $this->db->update('fabricante', $data);

    }

    public function buscar($buscar){
        
        $query = $this
                ->db
                ->select('*')
                ->from('fabricante')
                ->like('nome_fabricante',$buscar)
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
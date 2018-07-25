<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -hel
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	// public function index()
	// {
	// 	// echo 'asasasasa';
	// 	// exit;
	
	// 	// $this->load->view('equipamento/cadastro.php');
	// 	$this->cadastro();
	// }
	private static $URL_EDITAR= 'estoque/editar/';
	private static $URL_EXCLUIR= 'estoque/excluir/';
	private static $URL_BAIXA= 'estoque/baixa/';

	public function __construct(){
			parent::__construct();
            $this->load->model('estoque_model');
             $this->load->model('setor_model');
            $this->load->model('fabricante_model');
            $this->load->model('local_model');
            $this->load->model('equipamento_model');
            $this->load->helper('url_helper');

            if($this->session->userdata('usuario')==null) {
            	redirect('usuario/index');
            }
	}

	public function index(){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['equipamento'] = $this->equipamento_model->get_equipamentos();
		$data['local'] = $this->local_model->get_locais();
 
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('estoque/form_estoque.php', $data);
		$this->load->view('template/footer.php');


	}

	public function cadastrar(){	
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('equipamento','equipamento', 'required');
		$this->form_validation->set_rules('local','local', 'required');
		$this->form_validation->set_rules('quantidade','quantidade', 'required');

		if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header');
                $this->load->view('template/menu.php');
                $this->load->view('estoque/form_estoque.php');
                $this->load->view('template/footer');

        }
        else
        {		
        		$data = array('fk_equipamento_id' => $this->input->post('equipamento'),
        			'fk_local_id' => $this->input->post('local'),
        			'quantidade' => $this->input->post('quantidade'));
        						

                $this->estoque_model->set_estoque($data);
                $this->listar();
        }


	}

	public function listar(){

		$this->load->helper('form');
		$join =  $this->estoque_model->get_estoques();

		

		$data['estoque'] = array();
		if(!empty($join)){
			foreach ($join as $key => $est) {
				$data['estoque'][$key] = $est;
				$data['estoque'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$est['id_estoque']);
				$data['estoque'][$key]['url_excluir'] = site_url(self::$URL_EXCLUIR.$est['id_estoque']);
				$data['estoque'][$key]['url_baixa'] = site_url(self::$URL_BAIXA.$est['id_estoque']);
			}
		}
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('estoque/list_estoque.php', $data);
		$this->load->view('template/footer.php');





	}

	public function editar($id){

		$this->load->helper('form');
        $this->load->library('form_validation');
		$data['estoque'] = $this->estoque_model->get_estoque_id($id);
		//$data['estoque'] = json_decode(json_encode($estoque),TRUE);
 		$data['local'] = $this->local_model->get_locais();
 			
 	// 	echo '<pre>';
		// var_dump($estoque);
	 // 	echo '</pre>';
	 // 	echo '--------------------'.'</br>';
	 // 	echo '<pre>';
		// var_dump($data['estoque']);
	 // 	echo '</pre>';
	 	
	 	
	 	
	 	

	 	
		

		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('estoque/edit_estoque.php', $data);
		$this->load->view('template/footer.php');


	}

	public function baixa($id){

		$data['estoque'] = $this->estoque_model->get_estoque_id($id);
		$data['setor'] = $this->setor_model->get_setors();


		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('estoque/baixa_estoque.php', $data);
		$this->load->view('template/footer.php');
	}

	public function atualizar_baixa(){
		 $id = $this->input->post('id');
		 $quantidade = $this->input->post('quantidade');
		 echo $id.' ---id--'.'</br>';
		 echo $quantidade.' ---quantidade--'.'</br>';
		 $data['estoque'] = $this->estoque_model->get_estoque_id($id);
		 $quantidade_atualizada = $data['estoque']->quantidade - $quantidade;
		 echo '<pre>';
		 echo $data['estoque']->quantidade;
		 echo '</pre>';
		  echo '<pre>';
		 echo print_r($this->input->post());
		 echo '</pre>';
		 
		 
		$data = array('quantidade' => $this->input->post('quantidade'),
					'data_baixa' => $this->input->post('date_baixa'),
					'fk_equipamento_id' => $this->input->post('equipamento'),
					'fk_local_id' => $this->input->post('local'),
					'fk_setor_id' => $this->input->post('setor'),
					'descricao' => $this->input->post('descricao'));
        						
		$this->estoque_model->set_baixa($data);
		$this->estoque_model->atualizar_estoque_baixa_id($id,$quantidade_atualizada);
		$this->listar();


	}



	public function atualizar(){

		$this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->post('id');

        
        $data = array('fk_equipamento_id' => $this->input->post('equipamento'),
        			'fk_local_id' => $this->input->post('local'),
        			'quantidade' => $this->input->post('quantidade'));

        $this->estoque_model->atualizar_estoque_id($id,$data);
        $this->listar();


	}

	public function excluir($id){

		$this->estoque_model->delete_estoque_id($id);
		$this->listar();

	}

	public function buscar(){

		if(is_null($this->input->get('buscar'))){
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
        $this->load->view('estoque/buscar_estoque.php');  
        $this->load->view('template/footer.php'); 
        

	}
	else{
		 $data['estoque']= $this->estoque_model->buscar($this->input->get('buscar'));
		 


		 // $data['emprestimo']['url_editar']= site_url(self::$URL_EDITAR);
		 // $data['emprestimo']['url_excluir'] = site_url(self::$URL_EXCLUIR);
		
		 
        
        $this->load->view('estoque/buscar_estoque1.php',$data);
	}
	}



}

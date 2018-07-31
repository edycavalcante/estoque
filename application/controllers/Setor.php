<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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
	private static $URL_EDITAR = 'setor/editar/';
	private static $URL_EXCLUIR = 'setor/excluir/';

	public function __construct(){
		parent::__construct();
            $this->load->model('setor_model');
            $this->load->helper('url_helper');
            if($this->session->userdata('usuario')==null) {
            	redirect('usuario/index');
            }

	}
	public function index(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');


		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('setor/form_setor.php');
		$this->load->view('template/footer.php');

	}

	public function cadastrar(){	
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','nome', 'required');
		$this->form_validation->set_rules('responsavel','responsavel', 'required');

		if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header');
                $this->load->view('template/menu.php');
                $this->load->view('setor/form_setor');
                $this->load->view('template/footer');

        }
        else
        {		
        		$data = array('nome_setor' => $this->input->post('nome'),
        						'responsavel' => $this->input->post('responsavel'));
        						

                $this->setor_model->set_setor($data);
                $this->listar();
        }


	}

	public function listar(){

		$this->load->helper('form');
		$setor =  $this->setor_model->get_setors();

		$data['setor'] = array();
		if(!empty($setor)){
			foreach ($setor as $key => $set) {
				$data['setor'][$key] = $set;
				$data['setor'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$set['id_setor']);
				$data['setor'][$key]['url_excluir'] = site_url(self::$URL_EXCLUIR.$set['id_setor']);
				
		
			}
		}

		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('setor/list_setor.php', $data);
		$this->load->view('template/footer.php');





	}

	public function editar($id){

		$this->load->helper('form');
        $this->load->library('form_validation');
		$setor = $this->setor_model->get_setor_id($id);

		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('setor/edit_setor.php', $setor);
		$this->load->view('template/footer.php');


	}

	public function atualizar(){

		$this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->post('id');

        $data = array('nome_setor' => $this->input->post('nome'),
    				'responsavel' => $this->input->post('responsavel'));

        $this->setor_model->atualizar_setor_id($id,$data);
        $this->listar();


	}
	
	public function excluir($id){
		$this->setor_model->delete_setor_id($id);
		$this->listar();
	}

	public function buscar(){

		if(is_null($this->input->get('buscar'))){
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
        $this->load->view('estoque/buscar_setor.php');  
        $this->load->view('template/footer.php'); 
        

	}
	else{
		 if(empty($this->input->get('buscar'))){
		 	$data['setor']= $this->setor_model->buscar();
		 } else {
		 	$data['setor']= $this->setor_model->buscar($this->input->get('buscar'));
		 	
		 }
		 
		  if(!empty($data['setor'])) {

			 foreach ($data['setor'] as $key => $setor_item)    
			 {   
			 	// echo '<pre>';
			 	// echo print_r($emprestimo_item);
			 	// echo '</pre>';
			 	
			 	//print_r($emprestimo_item->id_emprestimo);exit;

			 	
			 	$data['setor'][$key]->url_editar = site_url(self::$URL_EDITAR.$setor_item->id_setor);
				$data['setor'][$key]->url_excluir = site_url(self::$URL_EXCLUIR.$setor_item->id_setor);
				//print_r($emprestimo_item->id_emprestimo);exit;

			 }
		} else{
			$data['setor'] = array();
		 	$data['setor']['error'] = 'Não existe setor com esse nome.';
		}


		 	$this->output->set_content_type('application/json');
       		$this->output->set_output(json_encode($data['setor']));

		
		 

        
        //$this->load->view('emprestimo/buscar_emprestimo1.php',$data);
	}
	}

}

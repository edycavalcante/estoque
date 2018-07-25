<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local extends CI_Controller {

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
	private static $URL_EDITAR= 'local/editar/';
	private static $URL_EXCLUIR= 'local/excluir/';

	public function __construct(){
			parent::__construct();
            $this->load->model('local_model');
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
		$this->load->view('local/form_local.php');
		$this->load->view('template/footer.php');


	}

	public function cadastrar(){	
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','nome', 'required');

		if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header');
                $this->load->view('template/menu.php');
                $this->load->view('local/form_local');
                $this->load->view('template/footer');

        }
        else
        {		
        		$data = array('nome_local' => $this->input->post('nome'));
        						

                $this->local_model->set_local($data);
                $this->listar();
        }


	}

	public function listar(){

		$this->load->helper('form');
		$local =  $this->local_model->get_locais();

		$data['local'] = array();
		if(!empty($local)){
			foreach ($local as $key => $loc) {
				$data['local'][$key] = $loc;
				$data['local'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$loc['id_local']);
				$data['local'][$key]['url_excluir'] = site_url(self::$URL_EXCLUIR.$loc['id_local']);
			}
		}
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('local/list_local.php', $data);
		$this->load->view('template/footer.php');





	}

	public function editar($id){

		$this->load->helper('form');
        $this->load->library('form_validation');
		$local = $this->local_model->get_local_id($id);

		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('local/edit_local.php', $local);
		$this->load->view('template/footer.php');


	}

	public function atualizar(){

		$this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->post('id');

        $data = array('nome_local' => $this->input->post('nome'));

        $this->local_model->atualizar_local_id($id,$data);
        $this->listar();


	}

	public function excluir($id){

		$this->local_model->delete_local_id($id);
		$this->listar();

	}

	public function buscar(){

		if(is_null($this->input->get('buscar'))){
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
        $this->load->view('local/buscar_local.php');  
        $this->load->view('template/footer.php'); 

	}
	else{
		 $data['local']= $this->local_model->buscar($this->input->get('buscar'));
		 // $data['emprestimo']['url_editar']= site_url(self::$URL_EDITAR);
		 // $data['emprestimo']['url_excluir'] = site_url(self::$URL_EXCLUIR);
		
		 // echo '<pre>';
		 // echo var_dump($data);
		 // echo '</pre>';
		 

        
        $this->load->view('local/buscar_local1.php',$data);
	}
	}



}

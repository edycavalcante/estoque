<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimo extends CI_Controller {

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
	private static $URL_EDITAR= 'emprestimo/editar/';
	private static $URL_EXCLUIR= 'emprestimo/excluir/';
	
	
	public function __construct(){
			parent::__construct();
			$this->load->model('emprestimo_model');
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
		$data['setor'] = $this->setor_model->get_setors();
 
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('emprestimo/form_emprestimo.php', $data);
		$this->load->view('template/footer.php');


	}

	public function cadastrar(){	
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('equipamento','equipamento', 'required');
		$this->form_validation->set_rules('date_inicio','date_inicio', 'required');
		$this->form_validation->set_rules('date_fim','date_fim', 'required');
		$this->form_validation->set_rules('setor','setor', 'required');
		$this->form_validation->set_rules('quantidade','quantidade', 'required');
		$this->form_validation->set_rules('situacao','situacao', 'required');

		// $data = array('fk_equipamento_id' => $this->input->post('equipamento'),
  //       			'data_inicio' => $this->input->post('date_inicio'),
  //       			'data_fim' => $this->input->post('date_fim'),
  //       			'fk_setor_id' => $this->input->post('setor'),
  //       			'quantidade' => $this->input->post('quantidade'),
  //       			'situacao' => $this->input->post('situacao'));;
		// 		echo '<pre>';
  //       		echo var_dump($data);
  //       		echo '</pre>';
        		

		if ($this->form_validation->run() === FALSE)
            {
            	echo 'entrou';
                $this->load->view('template/header');
                $this->load->view('template/menu.php');
                $this->load->view('equipamento/success.php');
                $this->load->view('template/footer');

        }
        else
        {		
        		$data = array('data_inicio' => $this->input->post('date_inicio'),
        			'data_fim' => $this->input->post('date_fim'),
        			'situacao' => $this->input->post('situacao'),
        			'quantidade' => $this->input->post('quantidade'),
        			'fk_equipamento_id' => $this->input->post('equipamento'),
        			'fk_setor_id' => $this->input->post('setor'));
        						

                $this->emprestimo_model->set_emprestimo($data);
                $this->listar();


        }


	}

	public function listar(){

		$this->load->helper('form');
		$join =  $this->emprestimo_model->get_emprestimos();


		

		$data['emprestimo'] = array();
		if(!empty($join)){
			foreach ($join as $key => $emp) {
				$data['emprestimo'][$key] = $emp;
				$data['emprestimo'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$emp['id_emprestimo']);
				$data['emprestimo'][$key]['url_excluir'] = site_url(self::$URL_EXCLUIR.$emp['id_emprestimo']);
			}
		}
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('emprestimo/list_emprestimo.php', $data);
		$this->load->view('template/footer.php');





	}

	public function editar($id){

		$this->load->helper('form');
        $this->load->library('form_validation');
       $data['emprestimo'] = $this->emprestimo_model->get_emprestimo_id($id);
		//$data['estoque'] = json_decode(json_encode($estoque),TRUE);
 		$data['local'] = $this->local_model->get_locais();
 		$data['setor'] = $this->setor_model->get_setors();	
 		echo '<pre>';
		var_dump($data['emprestimo']);
	 	echo '</pre>';
	 	echo '--------------------'.'</br>';

	 // 	echo '<pre>';
		// var_dump($data['estoque']);
	 // 	echo '</pre>';
	 	
	 	
	 	
	 	

	 	
		

		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('emprestimo/edit_emprestimo.php', $data);
		$this->load->view('template/footer.php');


	}

	public function atualizar(){

		$this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->post('id');

        
       $data = array('data_inicio' => $this->input->post('date_inicio'),
        			'data_fim' => $this->input->post('date_fim'),
        			'situacao' => $this->input->post('situacao'),
        			'quantidade' => $this->input->post('quantidade'),
        			'fk_equipamento_id' => $this->input->post('equipamento'),
        			'fk_setor_id' => $this->input->post('setor'));

        $this->emprestimo_model->atualizar_emprestimo_id($id,$data);
        $this->listar();


	}

	public function buscar(){

		if(is_null($this->input->get('buscar'))){
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
        $this->load->view('emprestimo/buscar_emprestimo.php');  
        $this->load->view('template/footer.php'); 

	}
	else{
		 $data['emprestimo']= $this->emprestimo_model->buscar($this->input->get('buscar'));
		 // $data['emprestimo']['url_editar']= site_url(self::$URL_EDITAR);
		 // $data['emprestimo']['url_excluir'] = site_url(self::$URL_EXCLUIR);
		
		 // echo '<pre>';
		 // echo var_dump($data);
		 // echo '</pre>';
		 

        
        $this->load->view('emprestimo/buscar_emprestimo1.php',$data);
	}
	}

	




	public function excluir($id){

		$this->emprestimo_model->delete_emprestimo_id($id);
		$this->listar();

	}


}

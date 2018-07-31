<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabricante extends CI_Controller {

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
	public static $URL_EDITAR = 'fabricante/editar/';
	public static $URL_EXCLUIR = 'fabricante/excluir/';


	public function __construct()
        {
                parent::__construct();
                $this->load->model('fabricante_model');
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
		$this->load->view('fabricante/form_fabricante.php');
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
                $this->load->view('fabricante/form_fabricante');
                $this->load->view('template/footer');

        }
        else
        {		
        		$data = array('nome_fabricante' => $this->input->post('nome'));
        						

                $this->fabricante_model->set_fabricante($data);
                $this->listar();
        }


	}

	public function listar(){

		$this->load->helper('form');
		$fabricante =  $this->fabricante_model->get_fabricantes();

		$data['fabricante'] = array();
		if(!empty($fabricante)){
			foreach ($fabricante as $key => $fab) {
				$data['fabricante'][$key] = $fab;
				$data['fabricante'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$fab['id_fabricante']);
				$data['fabricante'][$key]['url_excluir'] = site_url(self::$URL_EXCLUIR.$fab['id_fabricante']);
			}
		}
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('fabricante/list_fabricante.php', $data);
		$this->load->view('template/footer.php');





	}

	public function editar($id){

		$this->load->helper('form');
        $this->load->library('form_validation');
		$fabricante = $this->fabricante_model->get_fabricante_id($id);

		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('fabricante/edit_fabricante.php', $fabricante);
		$this->load->view('template/footer.php');


	}

	public function atualizar(){

		$this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->post('id');

        $data = array('nome_fabricante' => $this->input->post('nome'));
    				

        $this->fabricante_model->atualizar_fabricante_id($id,$data);
        $this->listar();


	}

	public function excluir($id){

		$this->fabricante_model->delete_fabricante_id($id);
		$this->listar();

	}

	public function buscar(){

		if(is_null($this->input->get('buscar'))){
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
        $this->load->view('estoque/buscar_fabricante.php');  
        $this->load->view('template/footer.php'); 
        

	}
	else{
		 if(empty($this->input->get('buscar'))){
		 	$data['fabricante']= $this->fabricante_model->buscar();
		 } else {
		 	$data['fabricante']= $this->fabricante_model->buscar($this->input->get('buscar'));
		 	
		 }
		 
		  if(!empty($data['fabricante'])) {

			 foreach ($data['fabricante'] as $key => $fabricante_item)    
			 {   
			 	// echo '<pre>';
			 	// echo print_r($emprestimo_item);
			 	// echo '</pre>';
			 	
			 	//print_r($emprestimo_item->id_emprestimo);exit;

			 	
			 	$data['fabricante'][$key]->url_editar = site_url(self::$URL_EDITAR.$fabricante_item->id_fabricante);
				$data['fabricante'][$key]->url_excluir = site_url(self::$URL_EXCLUIR.$fabricante_item->id_fabricante);
				//print_r($emprestimo_item->id_emprestimo);exit;

			 }
		} else{
			$data['fabricante'] = array();
		 	$data['fabricante']['error'] = 'Não existe fabricante com esse nome.';
		}


		 	$this->output->set_content_type('application/json');
       		$this->output->set_output(json_encode($data['fabricante']));

		
		 

        
        //$this->load->view('emprestimo/buscar_emprestimo1.php',$data);
	}
	}

}

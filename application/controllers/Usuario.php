<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
	private static $URL_EDITAR= 'usuario/editar/';


	 public function __construct()
        {
                parent::__construct();
                $this->load->model('usuario_model');
                $this->load->helper('url_helper');

               
        }


	public function index(){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->view('template/header.php');
		//$this->load->view('template/menu.php');
		$this->load->view('usuario/login_usuario.php');
		$this->load->view('template/footer.php');

	}

	public function login(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('usuario', 'usuario', 'required');
		$this->form_validation->set_rules('senha', 'senha', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('template/header.php');
			$this->load->view('usuario/login_usuario.php');
			$this->load->view('template/footer.php');	
		}
		else {
		$usuario = $this->usuario_model->verificar_usuario($this->input->post('usuario'), $this->input->post('senha'));
		

		if ($usuario !== false) {
			$this->load->library('session');
			//$this->session->userdata('logado');
			$this->session->set_userdata($usuario[0]);
			

			$teste = $this->session->userdata('id_usuario');
			$teste1 = $this->session->userdata('nome_usuario');
			$this->load->view('template/header.php');
			$this->load->view('template/menu.php');
			$this->load->view('usuario/form_usuario.php');
			$this->load->view('template/footer.php');
		} else {
			$this->load->view('template/header.php');
			$this->load->view('usuario/login_usuario.php');
			$this->load->view('template/footer.php');
		}
		
		


	}
	}

	public function logout(){
		$this->session->sess_destroy();
		$this->load->view('template/header.php');
		$this->load->view('usuario/login_usuario.php');
		$this->load->view('template/footer.php');

	}

	public function cadastrar(){

		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('usuario', 'usuario', 'required');
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('template/header');
                $this->load->view('template/menu.php');
                $this->load->view('usuario/form_usuario');
                $this->load->view('template/footer');

        }
        else
        {		
        		$data = array('usuario' => $this->input->post('usuario'),
        						'nome_usuario' => $this->input->post('nome'),
       						 'senha' => md5($this->input->post('senha')));

                $this->usuario_model->set_usuario($data);
                $this->listar();
        }



	}


	public function listar(){
			

		$this->load->helper('form');
		$usuario =  $this->usuario_model->get_usuarios();

		// echo '<pre>';
		// var_dump($usuario);
	 // 	echo '</pre>';
		// exit;


		// $data['usuario'] = array();
		// if(!empty($usuario)){
		// 	foreach ($usuario as $key => $usu) {
		// 		$data['usuario'][$key] = $usu;
		// 		$data['usuario'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$usu['id_usuario']);
		// 		$data['usuario'][$key]['url_excluir'] = site_url('usuario/excluir/'.$usu['id_usuario']);

		// 	}
		// }

		$data['usuario'] = array();
		if(!empty($usuario)){
			foreach ($usuario as $usu) {
				$usu['url_editar'] = site_url(self::$URL_EDITAR.$usu['id_usuario']);
				$usu['url_excluir'] = site_url('usuario/excluir/'.$usu['id_usuario']);
				$data['usuario'][] = $usu;
				
			}
		}
		// echo '<pre>';
		// var_dump($data['usuario']);
		// echo '</pre>';
		// exit;
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('usuario/list_usuario.php', $data);
		$this->load->view('template/footer.php');


    }

    public function editar($id)
	{

		$this->load->helper('form');
        $this->load->library('form_validation');
		$usuario = $this->usuario_model->get_usuario_id($id);


		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('usuario/edit_usuario.php', $usuario);
		$this->load->view('template/footer.php');

	
	}

	


	public function atualizar(){
		
		$this->load->helper('form');
        $this->load->library('form_validation');
        $id = $this->input->post('id');
        $data = array('usuario' => $this->input->post('usuario'),
        'nome_usuario' => $this->input->post('nome'),
        'senha' => md5($this->input->post('senha')));
        		
        $this->usuario_model->atualizar_usuario_id($id,$data);
        $this->listar();
        

	}

    

    public function excluir($id)
    {
		
    	$this->usuario_model->delete_usuario_id($id);

		$this->load->helper('form');
		$data['usuario'] =  $this->usuario_model->get_usuarios();
		

		$this->listar();
		


    }

    public function usuariopg() {
 
       $config = array();
 
       $config["base_url"] = base_url() . "usuario/listar";
 
       $config["total_rows"] = $this->Usuario_model->record_count();
 
       $config["per_page"] = 1;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["results"] = $this->Usuario_model->
 
           fetch_usuarios($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();
 
       $this->load->view("usuario/list_usuario.php", $data);
   }
}




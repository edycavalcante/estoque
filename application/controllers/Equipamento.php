<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipamento extends CI_Controller {

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
	public static $URL_EDITAR = 'equipamento/editar/';
	public static $URL_DETALHES = 'equipamento/detalhes/';
	public static $URL_EXCLUIR = 'equipamento/excluir/';
	

	public function __construct(){

		parent::__construct();
		$this->load->model('equipamento_model');
		$this->load->model('estoque_model');
		$this->load->model('usuario_model');
		$this->load->model('fabricante_model');
		$this->load->model('local_model');
		$this->load->helper('url_helper');

		if($this->session->userdata('usuario')==null) {
			redirect('usuario/index');
		}


	}
	public function imprimir()
	{
	// 	$mpdf = new \Mpdf\mPDF();
	// // Ao invés de imprimir a view 'welcome_message' na tela, passa o código
	// // HTML dela para a variável $html
	// $html = $this->load->view('equipamento/list_equipamento.php','',TRUE);
	// // Define um Cabeçalho para o arquivo PDF
	// $mpdf->SetHeader('Gerando PDF no CodeIgniter com a biblioteca mPDF');
	// // Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
	// // página através da pseudo-variável PAGENO
	// $mpdf->SetFooter('{PAGENO}');
	// // Insere o conteúdo da variável $html no arquivo PDF
	// //$mpdf->writeHTML($html);
	// // Cria uma nova página no arquivo
	// $mpdf->AddPage();
	// // Insere o conteúdo na nova página do arquivo PDF
	// $mpdf->WriteHTML('<p><b>Minha nova página no arquivo PDF</b></p>');
	// // Gera o arquivo PDF
	// $mpdf->Output();

		if(is_null($this->input->get('buscar_imprimir'))){
			
			$this->load->view('template/header.php');
			$this->load->view('template/menu.php');
			$this->load->view('equipamento/buscar_equipamento.php');  
			$this->load->view('template/footer.php'); 

		}
		else{
			if(empty($this->input->get('buscar_imprimir'))){
				$data['equipamento']= $this->equipamento_model->buscar();
			}else{
				$data['equipamento'] = $this->equipamento_model->buscar($this->input->get('buscar_imprimir'));
			}
			$mpdf = new \Mpdf\mPDF();
			if(!empty($data['equipamento'])){
				$mpdf = new \Mpdf\mPDF();
	// Ao invés de imprimir a view 'welcome_message' na tela, passa o código
	// HTML dela para a variável $html
				$html = $this->load->view('equipamento/list_equipamento.php','',TRUE);
	// Define um Cabeçalho para o arquivo PDF
				$mpdf->SetHeader('Estoque CMSI - ');
	// Define um rodapé para o arquivo PDF, nesse caso inserindo o número da
	// página através da pseudo-variável PAGENO
				$mpdf->SetFooter('{PAGENO}');
	// Insere o conteúdo da variável $html no arquivo PDF
	//$mpdf->writeHTML($html);
	// Cria uma nova página no arquivo
				$mpdf->AddPage('L');
				//$mpdf->AddPage();
	// Insere o conteúdo na nova página do arquivo PDF
				$text1 = '
				<table class="table" style="text-align: center;border: 1px solid black;margin: 0 auto;border-collapse: collapse;
				width: 100%;">
				<thead>
				<tr>
				<th>NOME</th>
				<th>TIPO</th>
				<th>PATRIMÔNIO</th>
				<th>FABRICANTE</th>
				</tr>
				</thead>
				
				<tbody>

				';
				$text = '<table class="table" id="listbase" style="text-align: center;border-collapse: collapse;border:1px solid black;
				width: 100%;">
				<thead id="head_table">
				<tr style="border:1px solid black;border-collapse:collapse;">
				
				<th scope="col" style="border:1px solid black;border-collapse:collapse;">NOME</th>
				<th scope="col" style="border:1px solid black;border-collapse:collapse;">TIPO</th>
				<th scope="col" style="border:1px solid black;border-collapse:collapse;">PATRIMÔNIO</th>
				<th scope="col" style="border:1px solid black;border-collapse:collapse;">FABRICANTE</th>
				</tr>
				</thead>
				<tbody id="conteudo_table">';
				foreach ($data['equipamento'] as $key => $equipamento_item) {
					$text .= '<tr style="border:1px solid black;border-collapse:collapse;">';
					$text .='<td style="border:1px solid black;border-collapse:collapse;">'.$data['equipamento'][$key]->nome_equipamento.'</td>';
					$text .='<td style="border:1px solid black;border-collapse:collapse;">'.$data['equipamento'][$key]->tipo.'</td>';
					$text .='<td style="border:1px solid black;border-collapse:collapse;">'.$data['equipamento'][$key]->patrimonio.'</td>';
					$text .='<td style="border:1px solid black;border-collapse:collapse;">'.$data['equipamento'][$key]->nome_fabricante.'</td>';
					$text .= '</tr>';
					# code...
				}
				$text .= '</tbody></table>';
	// echo '<pre>';
	// var_dump($text);
	// echo '</pre>';
	// exit;
				$mpdf->WriteHTML($text);
					// Gera o arquivo PDF
				$mpdf->Output();
			}else{
				// $data['equipamento'] = array();
				// $data['equipamento']['error'] = 'Não existe equipamento com esse nome';
				
				$mpdf->WriteHTML('<p><b>Não existe equipamento com esse nome</b></p>');
				$mpdf->Output();

			}
			return;


			 // $data['emprestimo']['url_editar']= site_url(self::$URL_EDITAR);
			 // $data['emprestimo']['url_excluir'] = site_url(self::$URL_EXCLUIR);
			
			 // echo '<pre>';
			 // echo var_dump($data);
			 // echo '</pre>';

			// $this->output->set_content_type('application/json');
			// $this->output->set_output(json_encode($data['equipamento']));


		}
	}


	public function index(){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['fabricante'] =  $this->fabricante_model->get_fabricantes();
		$data['local'] = $this->local_model->get_locais();
		

		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('equipamento/form_equipamento.php', $data);
		$this->load->view('template/footer.php');
		$this->pagination->create_links();
	}

	public function cadastrar()
	{	
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','nome', 'required',array('required' => 'Informe nome do equipamento1'));
		$this->form_validation->set_rules('tipo','tipo', 'required',array('required' => 'Informe tipo do equipamento'));
		$this->form_validation->set_rules('fabricante','fabricante', 'required',array('required' => 'Informe fabricante do equipamento'));
		
		if ($this->form_validation->run() === FALSE)
		{
			
			$this->index();
			

		}
		else
		{		
			$data = array('nome_equipamento' => $this->input->post('nome'),
				'tipo' => $this->input->post('tipo'),
				'patrimonio' => $this->input->post('patrimonio'),
				'fk_fabricante_id' => $this->input->post('fabricante'),
				'fk_usuario_id' => $this->session->userdata('id_usuario'));
			

			$this->equipamento_model->set_equipamento($data);
			$this->listar();
		}


	}

	public function listar(){

		$join = $this->equipamento_model->get_equipamentos();
		// var_dump($join);
		// exit;
		$data['equipamento'] = array();
		if(!empty($join)){
			foreach ($join as $key => $equ) {
				$data['equipamento'][$key] = $equ;
				$data['equipamento'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$equ['id_equipamento']);
				$data['equipamento'][$key]['url_detalhes'] = site_url(self::$URL_DETALHES.$equ['id_equipamento']);
				$data['equipamento'][$key]['url_excluir'] = site_url(self::$URL_EXCLUIR.$equ['id_equipamento']);
				
			}
		}
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('equipamento/list_equipamento.php', $data);
		$this->load->view('template/footer.php');




	}

	public function detalhes($id){
		$data['detalhes'] = $this->estoque_model->get_detalhes_baixa_id($id);
		// echo '<pre>';
		// echo print_r($data['detalhes']);
		// echo '</pre>';
		// exit;
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('equipamento/detalhes_equipamento.php', $data);
		$this->load->view('template/footer.php');
	}

	public function editar($id)
	{

		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['equipamento'] = $this->equipamento_model->get_equipamento_id($id);
		//$data['equipamento'] = $equipamento;
		$data['fabricante'] =  $this->fabricante_model->get_fabricantes();
		// if(!empty($equipamento)){
		// 	foreach ($equipamento as $key => $equ) {
		// 		$data['equipamento'][$key] = $equ;
		// 	}
		
		// }
		
		// echo '<pre>';
		// print_r($data['equipamento']);
		// echo '<br>';
		
		// echo '</pre>';
		


		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('equipamento/edit_equipamento.php', $data);
		$this->load->view('template/footer.php');

		
	}

	public function atualizar(){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$id = $this->input->post('id');
		
		
		$data = array('nome_equipamento' => $this->input->post('nome'),
			'tipo' => $this->input->post('tipo'),
			'patrimonio' => $this->input->post('patrimonio'),
			'fk_fabricante_id' => $this->input->post('fabricante'));
		

		$this->equipamento_model->atualizar_equipamento_id($id,$data);
		$this->listar();


	}

	public function excluir($id){

		$this->equipamento_model->delete_equipamento_id($id);

		$this->load->helper('form');
		//$data['equipamento'] =  $this->usuario_model->get_equipamentos();
		

		$this->listar();



	}

	public function alocar(){

		$join = $this->equipamento_model->get_equipamentos();
		$data['equipamento'] = array();
		if(!empty($join)){
			foreach ($join as $key => $equ) {
				$data['equipamento'][$key] = $equ;
				$data['equipamento'][$key]['url_editar'] = site_url(self::$URL_EDITAR.$equ['id_equipamento']);
				$data['equipamento'][$key]['url_excluir'] = site_url(self::$URL_EXCLUIR.$equ['id_equipamento']);
				
			}
		}
		
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('equipamento/alocar.php', $data);
		$this->load->view('template/footer.php');




	}

	public function buscar(){

		if(is_null($this->input->get('buscar'))){
			
			$this->load->view('template/header.php');
			$this->load->view('template/menu.php');
			$this->load->view('equipamento/buscar_equipamento.php');  
			$this->load->view('template/footer.php'); 

		}
		else{
			if(empty($this->input->get('buscar'))){
				$data['equipamento']= $this->equipamento_model->buscar();
			}else{
				$data['equipamento'] = $this->equipamento_model->buscar($this->input->get('buscar'));
			}

			if(!empty($data['equipamento'])){
				foreach ($data['equipamento'] as $key => $equipamento_item) {

					$data['equipamento'][$key]->url_detalhes = site_url(self::$URL_DETALHES.$equipamento_item->id_equipamento);
					$data['equipamento'][$key]->url_editar = site_url(self::$URL_EDITAR.$equipamento_item->id_equipamento);
					$data['equipamento'][$key]->url_excluir = site_url(self::$URL_EXCLUIR.$equipamento_item->id_equipamento);
				# code...
				}
			}else{
				$data['equipamento'] = array();
				$data['equipamento']['error'] = 'Não existe equipamento com esse nome';

			}

			
		 // $data['emprestimo']['url_editar']= site_url(self::$URL_EDITAR);
		 // $data['emprestimo']['url_excluir'] = site_url(self::$URL_EXCLUIR);
			
		 // echo '<pre>';
		 // echo var_dump($data);
		 // echo '</pre>';
			
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode($data['equipamento']));
			
			
		}
	}

}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

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
	 

	public function index()
	{
		$this->load->view('template/header.php');
		$this->load->view('template/menu.php');
		$this->load->view('relatorio/relatorio.php');
		$this->load->view('template/footer.php');
		
	}

	public function teste()
	{	
		$var1 = 'wwwwwww';
		$var2 = 14;
		echo "$var1" . '<hr>';
		echo "$var1";
	}
}

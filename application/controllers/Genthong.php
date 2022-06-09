<?php 
	

	/**
	 * 
	 */
	class Genthong extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function index(){

			 $this->load->view('template_baru/header');
			$this->load->view('baru/index');
			 $this->load->view('template_baru/footer');
		}
	}

 ?>
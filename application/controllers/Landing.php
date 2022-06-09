<?php 
	
	/**
	 * 
	 */
	class Landing extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}


		function index(){

			$kode_member = $this->input->get('id');
			$data['kode_member'] = $kode_member;
			$this->load->view('landing/index', $data);

			if ($this->input->post('name') != null) {
				
				$data = [

					'name' =>  $this->input->post('name'),
					'email' => $this->input->post('email'),
					'pesan' => $this->input->post('pesan'),
					'subject' => $this->input->post('subject'),
				];

				$this->db->insert('tbl_pesan', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Pesan anda berhasil dikirim", "success" );');
				redirect('landing/');
			}
		}

		function reffral($kode_member){

			
			$data['kode_member'] = $kode_member;
			$this->load->view('landing/index', $data);

			if ($this->input->post('name') != null) {
				
				$data = [

					'name' =>  $this->input->post('name'),
					'email' => $this->input->post('email'),
					'pesan' => $this->input->post('pesan'),
					'subject' => $this->input->post('subject'),
				];

				$this->db->insert('tbl_pesan', $data);
				$this->session->set_flashdata('message', 'swal("Yess!", "Pesan anda berhasil dikirim", "success" );');
				redirect('landing/');
			}
		}
	}

 ?>
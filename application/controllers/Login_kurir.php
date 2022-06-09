<?php 

	/**
	 *
	 */
	class Login_kurir extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('m_data');
		}


		function index(){

			$this->load->view('login_kurir/index');
		}

		function act_login(){

			$username = $this->input->post('username');
			$pass = $this->input->post('pass');

			
			
			$this->db->where('username', $username);
			$cek_kurir = $this->db->get('tbl_kurir')->row_array();
			if ($cek_kurir == true) {

				
				if (password_verify($pass, $cek_kurir['pass'])) {
					
					$data = [

						'username_kurir' => $cek_kurir['username'],
						'kode_kurir' => $cek_kurir['kode_kurir'],
						'nama_kurir' 	=> $cek_kurir['nama_kurir'],
						'id_store' => $cek_kurir['id_store'],
					];

					$this->session->set_userdata($data);
					redirect('kurir/');

				}else{

					$this->session->set_flashdata('message', 'swal("Opps!", "password anda selah", "warning" );');
					redirect('login_kurir/');
				}
			}else{

				$this->session->set_flashdata('message', 'swal("Opps!", "Akun anda tidak terdaftar", "error" );');
				redirect('login_kurir/');
			}	
		}



		



		function logout(){

			$this->session->unset_userdata('username');
			$this->session->unset_userdata('kode_kurir');
			
			$this->session->set_flashdata('message', 'swal("Yess!", "Anda berhasil keluar", "success");');
			redirect('login_kurir/');
		}



	}

 ?>
<?php 

	/**
	 * 
	 */
	class Login_admin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			

		}

		function index(){

			$this->load->view('login_admin/index');
		}

		function act_login(){

			$username = $this->input->post('username');
			$pass = $this->input->post('pass');

			$cek = $this->db->get_where('tbl_admin',['username' => $username])->row_array();
			if ($cek == true) {
				
				if (password_verify($pass, $cek['pass'])) {
					
					$data = [
						'name_admin' => $cek['username'],
						'role' => $cek['roel'],
					];

					$this->session->set_userdata($data);
					redirect('admin/');

				}else{

					$this->session->set_flashdata('message_admin', 'swal("Opps!", "password anda selah", "warning" );');
					redirect('login_admin/');
				}
			}else{

				$this->session->set_flashdata('message_admin', 'swal("Opps!", "Akun anda tidak terdaftar", "error" );');
				redirect('login_admin/');
			}

		}

		function logout(){


			$this->session->unset_userdata('name_admin');
			$this->session->unset_userdata('role');
			$this->session->set_flashdata('message_admin', 'swal("Yess!", "Anda berhasil keluar", "success");');
			redirect('login_admin/');
		}
	}

	?>
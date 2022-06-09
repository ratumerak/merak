<?php 



/**

*

*/

class Login extends CI_Controller

{



	function __construct()

	{

		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('m_data');

	}





	function index(){



		$this->load->view('login/index');

	}



	function act_login(){



		$email = $this->input->post('email');

		$pass = $this->input->post('pass');





		$this->db->where('status', 1);

		$this->db->where('email', $email);

		$cek_member = $this->db->get('tbl_register')->row_array();

		if ($cek_member == true) {





			if (password_verify($pass, $cek_member['pass'])) {



				$data = [



					'email' => $cek_member['email'],

					'kode_member' => $cek_member['kode_member'],

					'username' => $cek_member['username'],

					'rule' => $cek_member['rule'],

				];



				$this->session->set_userdata($data);
				redirect('utama/');



			}else{



				$this->session->set_flashdata('login', 'swal("Opps!", "password anda salah", "warning" );');

				redirect('login/');

			}

		}else{



			$this->session->set_flashdata('login', 'swal("Opps!", "Akun anda tidak terdaftar,cek verifikasi akun anda", "error" );');

			redirect('login/');

		}	

	}







	function register($member){



		$rule = $this->db->get_where('tbl_register',['kode_member' => $member])->row_array();



		if ($rule == false) {



			$this->session->set_flashdata('login', 'swal("Oops!", "Register memerlukan reffral dari affiliator", "error");');

			redirect("login/");

		}



		$this->form_validation->set_rules('username', 'username', 'required|trim');

		$this->form_validation->set_rules('email', 'email', 'required|trim');

		$this->form_validation->set_rules('no_telp', 'no telp', 'required|trim|is_unique[tbl_register.no_telp]');

		$this->form_validation->set_rules('nik', 'nik', 'required|trim|min_length[16]|max_length[16]|is_unique[tbl_register.nik]');
		$this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[tbl_register.email]');

// $this->form_validation->set_rules('no_rek', 'nomor rek', 'required|trim');

		$this->form_validation->set_rules('pass', 'password', 'required|trim|min_length[6]');

		$this->form_validation->set_rules('pass2', 'confirmation password', 'required|trim|min_length[6]|matches[pass]');



		if ($this->form_validation->run() == false) {



			$this->load->view('login/register');



		}else{



			$kode = rand(1, 100000);

			$kode_member = "member-".$kode;




			date_default_timezone_set("Asia/Bangkok");
			$dataMember = [

				'kode_member' => $kode_member,

				'username' =>$this->input->post('username'),

				'email' => $this->input->post('email'),

				'no_telp' => $this->input->post('no_telp'),

				'nik' => $this->input->post('nik'),

				'rule' =>$member." ".$rule['rule'],
// 'jumlah_paket' => $this->input->post('paket'),

				'member_get' => $member,

				'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
				'date' => date('Y-m-d'),

// 'ktp' => $_FILES['ktp']['name'],

// 'bank' => $this->input->post('bank'),

// 'no_rek' => $this->input->post('no_rek'),





			];



			$user = $this->input->post('username');

			$addMember = $this->m_data->add('tbl_register', $dataMember);	

			if ($addMember == true) {
				
				$datasession = [
					
					'kode_member' => $kode_member,
					'no_telp' => $this->input->post('no_telp'),
				];
				$this->session->set_userdata($datasession);

				$kode_aktivasi = rand(1, 1000000);
				$addaktivasi = [
					'kode_member' => $kode_member,
					'kode_aktivasi' => $kode_aktivasi,
					'status' => 0,
					'date' => date('Y-m-d'),
				];
				$this->db->insert('tbl_aktivasi', $addaktivasi);
				// $this->m_data->send_kode($this->input->post('no_telp'), $kode_aktivasi);

				$email = $this->input->post('email');
				$this->m_data->send_emailRegister($email, $kode_member);
				

				// $this->m_data->send_wa($this->input->post('no_telp'), $this->input->post('username'), $this->input->post('bank'));

				$this->session->set_flashdata('login', 'swal("Yess", "Anda berhasil mendaftar", "success" );');

				$this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissible fade show" role="alert">

					<strong>Hello</strong> Anda berhasil mendaftar silahkan cek inbox email anda atau spam email anda untuk melakukan verifikasi.

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">

					<span aria-hidden="true">&times;</span>

					</button>

					</div>');

				redirect('login/');

			}





		}

	}

	function cek_email(){



		$email = $this->input->post('email');
		$akun = $this->db->get_where('tbl_register',['email' => $email])->row_array();

		if ($akun == true) {

			$kode = rand(1, 100000);
			$kode_pass = "merak".$kode;

			$pass = $kode_pass;
			$data = [
				'pass' => password_hash($pass, PASSWORD_DEFAULT),
			];

			$this->db->where('email', $email);
			$this->db->update('tbl_register',$data);

			$this->m_data->sendEmailPass($pass, $email);
			
			echo '<div class="alert alert-success mt-2" role="alert">

			Passoword baru anda berhasil dikirim di akun email anda.

			</div>';

		}else{



			echo '<div class="alert alert-danger mt-2" role="alert">

			Akun email yang anda masukan salah.

			</div>';

		}

	}



	function bonus($member){



		$kode_member = $member;
		$data =  $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();

		$kode = $data['rule'];

		$arr = explode (" ",$kode);

		$jm_arr = count($arr);

		echo $jm_arr;



		$harga =  $data['jumlah_paket'] * 1250000;



		for ($i=0; $i < $jm_arr ; $i++) { 



			if ($this->cek_stok($arr[$i]) < 0) {

				continue;

			}else{



				if ($i == 0) {

					$persen = 8 / 100;

					$bonus = $persen * $harga;

					$member  =  $arr[$i];

				}elseif ($i == 1) {

					break;

				}



				$data = [

					'kode_member' => $member,

					'dari' => $kode_member,

					'bonus' => $bonus,

					'date2' => date('Y-m-d'),

				];



				$input = $this->db->insert('tbl_bonus', $data);

				if ($input) {

					echo "berhasil";

				}else{

					echo "gagal";

				}



			}



		}

	}



	function cek_stok($kode_member){



		$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();

		return $stok['jumlah_stok'];

	}







	function logout(){



		$this->session->unset_userdata('username');

		$this->session->unset_userdata('kode_member');

		$this->session->unset_userdata('email');

		$this->session->unset_userdata('rule');

		$this->session->set_flashdata('login', 'swal("Yess!", "Anda berhasil keluar", "success");');

		redirect('login/');

	}


	function aktivasi(){

		$this->load->view('login/aktivasi');

		if (isset($_POST['kode'])) {
			
			$kode = $this->input->post('kode');
			$this->db->where('kode_aktivasi', $kode);
			$data = $this->db->get('tbl_aktivasi')->row_array();
			$date = date('Y-m-d');


			if ($data['date'] < $date ) {
				
				$this->session->set_flashdata('login', 'swal("Oops!", "Masa berlaku kode aktivasi anda sudah habis", "error");');
				redirect('login/aktivasi');
			}elseif ($data['status'] == 1) {

				$this->session->set_flashdata('login', 'swal("Oops!", "Kode aktivasi sudah digunakan", "error");');
				redirect('login/aktivasi');
				
			}elseif ($data == true) {
				
				$this->db->where('kode_aktivasi', $kode);
				$update = $this->db->update('tbl_aktivasi',['status' => 1]);
				if ($update == true) {
					
					$this->db->where('kode_member', $data['kode_member']);
					$this->db->update('tbl_register',['status' => 1]);
					$this->session->set_flashdata('login', 'swal("Yess!", "Aktivasi anda berhasil", "success");');
					redirect('login/');
				}
			}else{
				$this->session->set_flashdata('login', 'swal("Oops!", "Kode aktivasi salah", "error");');
				redirect('login/aktivasi');
			}
		}
	}



	function kirim_aktivasi($kode_member){

		$this->db->where('kode_member', $kode_member);
		$member = $this->db->get('tbl_register')->row_array();

		$kode_aktivasi = rand(1, 1000000);
		$data = [
			'kode_member' => $kode_member,
			'kode_aktivasi' => $kode_aktivasi,
			'status' => 0,
			'date' => date('Y-m-d'),
		];

		$this->db->insert('tbl_aktivasi', $data);

		$nohp = $member['no_telp'];
		$pesan = "Hello. kode aktivasi anda adalah " . $kode_aktivasi . " ";
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.waayo.id/inowa-core/v1/send_message',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS =>'{
				"key":"431421f04523496c88cd45c31318d9e8-1644545408", 
				"phone_no":"'.$member['no_telp'].'",
				"message":"'.$pesan.'"
			}',
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}


	function ubah(){

		$kode_member = 'member-69887'  ;
		$data = [
			'pass' => password_hash('abc 123', PASSWORD_DEFAULT),
		];

		$this->db->where('kode_member',$kode_member);
		$this->db->update('tbl_register', $data);
		

	}
}







?>
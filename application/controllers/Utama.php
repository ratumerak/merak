<?php 	



	/**

	 * 

	 */

	class Utama extends CI_Controller

	{

		

		function __construct()

		{		

			parent:: __construct();

			$this->load->library('form_validation');

			$this->load->model('m_data');



			if ($this->session->username == null) {

				redirect('login/');

			}

		}



		function index(){

			$kode_member = $this->session->kode_member;

			$data['stok'] = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();

			if ($data['stok'] == false) {

				$data['stok'] = 0;

			}else{



				$data['stok'] = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();

			}

			$data['total'] = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array(); 

			$data['member'] = $this->db->get_where('tbl_register',['member_get' => $kode_member])->num_rows();

			$data['order'] = $this->db->get_where('tbl_order', ['kode_member' => $kode_member])->num_rows();

			$data['profil'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();

			$data['user'] = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();



			$data['markisa'] = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();
			$data['cek_bukti'] = $this->db->get_where('tbl_bukti_tf', ['kode_member' => $this->session->kode_member])->row_array();			

			$data['bonus_topup_r'] = $this->db->get_where('tbl_bonus_topup_ratumerak',['kode_member' => $kode_member])->row_array();

			$data['bonus_topup_m'] = $this->db->get_where('tbl_bonus_topup_markisa',['kode_member' => $kode_member])->row_array();

			$data['casback_ratumerak'] = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $kode_member])->row_array();

			$data['casback_markisa'] = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $kode_member])->row_array();

			$this->load->view('template_baru/header');

			$this->load->view('baru/index', $data);

			$this->load->view('template_baru/footer');

		}





		function data_member(){



			$this->db->where('status_member', 0);

			$this->db->where('member_get',$this->session->kode_member);

			$data['member'] = $this->db->get('tbl_member')->result_array();



			$this->load->view('template_baru/header');

			$this->load->view('baru/data_member', $data);

			$this->load->view('template_baru/footer');

		}

		function detail_transaksi($kode_member){

			$user = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();

			$data['member'] = $user['username'];

			$this->db->order_by('id', 'desc');
			$data['transaksi'] = $this->db->get_where('tbl_topup',['kode_member' => $kode_member])->result_array();

			$this->load->view('template_baru/header');
			$this->load->view('baru/detail_transaksi', $data);
			$this->load->view('template_baru/footer');

		}



		function tambah_member(){



			$this->form_validation->set_rules('username', 'username', 'required|trim');

			$this->form_validation->set_rules('email', 'email', 'required|trim');

			$this->form_validation->set_rules('no_telp', 'no telp', 'required|trim');

			$this->form_validation->set_rules('nik', 'nik', 'required|trim|min_length[16]|max_length[16]');

			$this->form_validation->set_rules('pass', 'password', 'required|trim|min_length[6]');

			$this->form_validation->set_rules('konf_pass', 'confirmation password', 'required|trim|min_length[6]|matches[pass]');



			$kode_member = $this->session->kode_member;

			$data['profil'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();



			if ($this->form_validation->run() == false) {

				

				$this->load->view('template/header');

				$this->load->view('utama/tambah_member', $data);

				$this->load->view('template/footer');

			}else{



				$kode = rand(1, 100000);

				$kode_member = "member-".$kode;



				$dataMember = [

					'kode_member' => $kode_member,

					'username' =>$this->input->post('username'),

					'email' => $this->input->post('email'),

					'no_telp' => $this->input->post('no_telp'),

					'nik' => $this->input->post('nik'),

					'rule' => $this->session->kode_member." ".$this->session->rule,

					'member_get' => $this->session->kode_member,

					'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),

				];



				$addMember = $this->m_data->add('tbl_register', $dataMember);



				if ($addMember == true) {

						// $this->bonus($kode_member);

					$this->m_data->send_emailRegister($dataMember);

					$this->m_data->send_wa($this->input->post('no_telp'), $this->input->post('username'), $this->input->post('bank'));

					$this->session->set_flashdata('message', 'swal("Yess!", "Memeber berhasil didaftarkan", "success" );');

					redirect('utama/tambah_member');

				}else{



					$this->session->set_flashdata('message', 'swal("Oops!", "Gagal daftar member", "error" );');

					redirect('utama/tambah_member');

				}



			}









		}





		function order(){


			$this->form_validation->set_rules('nama_pembeli', 'nama pembeli', 'required|trim');

			$this->form_validation->set_rules('no_telp_pembeli', 'nomor telp pembeli', 'required|trim');

			$this->form_validation->set_rules('alamat_lengkap', 'alamat lengkap', 'required|trim');


			if ($this->form_validation->run() == false) {



				$data['stok'] = $this->db->get_where('tbl_stok',['kode_member' => $this->session->kode_member])->row_array();

				$data['stok_markisa'] = $this->db->get_where('tbl_stok_markisa',['kode_member' => $this->session->kode_member])->row_array();



				$data['stok_bonus_topup_r'] = $this->db->get_where('tbl_bonus_topup_ratumerak',['kode_member' => $this->session->kode_member])->row_array();

				$data['stok_bonus_topup_m'] = $this->db->get_where('tbl_bonus_topup_markisa',['kode_member' => $this->session->kode_member])->row_array();



				$kode_member = $this->session->kode_member;

				$data['profil'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();

				$data['prov'] = $this->db->get_where('tbl_provinsi',['id' => 12])->result_array();

				// $data['kab'] = $this->db->get_where('tbl_kabupaten',['id' => 1275])->row_array();

				// $data['kec'] = $this->db->get_where('tbl_kecamatan',['regency_id' => 1275])->result_array();



				$this->db->select('*');

				$this->db->from('tbl_kabupaten');

				$this->db->join('tbl_store', 'tbl_store.kab = tbl_kabupaten.id');

				$this->db->distinct();

				$data['kab'] = $this->db->get()->result_array();

				

				$this->load->view('template_baru/header');

				$this->load->view('baru/order', $data);

				$this->load->view('template_baru/footer');

			}else{



				$kab = $this->input->post('kab');

				$id_kab = $this->db->get_where('tbl_store',['id' => $kab])->row_array();

				$kec = $this->input->post('kec');
				$store = $this->db->get_where('tbl_wilayah_store',['kec' => $kec])->row_array();




				date_default_timezone_set("Asia/Bangkok");
				$data = [



					'kode_member' => $this->session->kode_member,

					'nama' => $this->input->post('nama_pembeli'),

					'no_telp_pembeli' => $this->input->post('no_telp_pembeli'),

					'produk' => $this->input->post('produk'),

					'prov' => $this->input->post('prov'),

					'kab' => $id_kab['kab'],

					'kec' => $this->input->post('kec'),

					'kel' => $this->input->post('kel'),

					'alamat_lengkap' => $this->input->post('alamat_lengkap'),

					'qty' => $this->input->post('qty'),

					'date' => date('Y-m-d'),

					'status_order' => 0,
					
					'store' => $store['id_store'],




				];

				

				$kode_member = $this->session->kode_member;

				$produk = $this->input->post('produk');

				$qty = $this->input->post('qty');



				// $this->cek_stok_order($kode_member, $produk, $qty);



				$input = $this->db->insert('tbl_order', $data);



				if ($input == true) {

					if ($produk == 'ratumerak') {

						$cek_stok_r = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();
						$stok = $cek_stok_r['jumlah_stok'] - $qty;
						
						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_stok',['jumlah_stok' => $stok]);
					}elseif ($produk == 'markisa') {
						$cek_stok_m = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();
						$stok = $cek_stok_m['jumlah_stok'] - $qty;
						
						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_stok_markisa',['jumlah_stok' => $stok]);
					}elseif($produk == 'bonus ratumerak'){
						$cek_stok_bonus_r = $this->db->get_where('tbl_bonus_topup_ratumerak',['kode_member' => $kode_member])->row_array();
						$stok = $cek_stok_bonus_r['total_stok_bonus'] - $qty;
						
						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_bonus_topup_ratumerak',['total_stok_bonus' => $stok]);
					}elseif ($produk == 'bonus markisa') {
						$cek_stok_bonus_m = $this->db->get_where('tbl_bonus_topup_markisa',['kode_member' => $kode_member])->row_array();
						$stok = $cek_stok_bonus_m['total_stok_bonus'] - $qty;

						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_bonus_topup_markisa',['total_stok_bonus' => $stok]);
					}

					$this->sendKurir($this->input->post('kec'));

					$this->session->set_flashdata('message', 'swal("Yess!", "Order berhasi ditambahkan", "success" );');
					redirect('utama/data_order');

				}





				// if ($this->input->post('produk') =='ratumerak') {



				// 	$this->session->set_flashdata('message', 'swal("Yess!", "Order berhasi ditambahkan", "success" );');

			 // 		redirect('utama/order');

			 // 	}else{



				// 	$this->session->set_flashdata('message', 'swal("Yess!", "Order berhasi ditambahkan", "success" );');

			 // 		redirect('utama/order');	

			 // 	}



			}

			



			



		}



		function kab(){

			$id = $this->input->get('id');

			$data['kab'] = $this->db->get_where('tbl_kabupaten', ['province_id' => $id])->result_array();

			$this->load->view('user/kab', $data);



		}

		function kec(){

			$id = $this->input->get('id');

			$data['kec'] = $this->db->get_where('tbl_kecamatan', ['regency_id' => $id])->result_array();

			$this->load->view('user/kec', $data);



		}



		function kec2(){

			$id = $this->input->get('id');



			$this->db->select('*');

			$this->db->from('tbl_kecamatan');

			$this->db->join('tbl_wilayah_store', 'tbl_wilayah_store.kec = tbl_kecamatan.id');

			$this->db->where('id_store', $id);

			$kec = $this->db->get()->result_array();

			?>



			<option>-- Pilih Kecamatan --</option>

			<?php 	foreach ($kec as $data) {?>

				<option value="<?= $data['kec'] ?>"	><?= $data['name'] ?></option>



			<?php 	}





		}



		function kel(){

			$id = $this->input->get('id');

			$data['kel'] = $this->db->get_where('tbl_kelurahan', ['district_id' => $id])->result_array();

			$this->load->view('user/kel', $data);



		}





		function bonus($member){



			$kode_member = $member;

			$data =  $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();

			$kode = $data['rule'];

			$arr = explode (" ",$kode);

			$jm_arr = count($arr);

			echo $jm_arr;



			$harga = 1250000;



			for ($i=0; $i < $jm_arr ; $i++) { 



				if ($this->cek_stok($arr[$i]) < 3) {

					continue;

				}else{



					if ($i == 0) {

						$persen = 4 / 100;

						$bonus = $persen * $harga;

						$member =  $arr[$i];

					}elseif ($i == 1) {

						$persen = 0.8 / 100;

						$bonus = $persen * $harga;

						$member = $arr[$i];

					}elseif ($i == 2) {

						$persen = 0.8 / 100;

						$bonus = $persen * $harga; 

						$member = $arr[$i];



					}elseif ($i == 3) {

						$persen = 0.4 / 100;

						$bonus = $persen * $harga;

						$member = $arr[$i];

					}elseif ($i == 4) {

						$persen = 0.4 / 100;

						$bonus = $persen * $harga;

						$member = $arr[$i];

					}elseif ($i == 5) {

						$persen = 0.4 / 100;

						$bonus = $persen * $harga;

					}elseif ($i == 6) {

						$persen = 0.2 / 100;

						$bonus = $persen * $harga;

						$member =  $arr[$i];



					}elseif ($i == 7) {

						$persen = 0.2 / 100;

						$bonus = $persen * $harga;

						$member = $arr[$i];





					}elseif ($i == 8) {

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



		function cek_stok_markisa($kode_member){



			$stok = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();

			return $stok['jumlah_stok'];

		}





		function data_order(){

			if (isset($_POST['tanggal'])) {
				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;

				$this->db->like('date', $tgl);
				$data['order'] = $this->db->get_where('tbl_order',['kode_member' => $this->session->kode_member])->result_array();

				$this->load->view('template_baru/header');

				$this->load->view('baru/data_order', $data);

				$this->load->view('template_baru/footer');

			}else{
				$this->db->order_by('id_order','desc');
				$data['order'] = $this->db->get_where('tbl_order',['kode_member' => $this->session->kode_member])->result_array();

				$this->load->view('template_baru/header');

				$this->load->view('baru/data_order', $data);

				$this->load->view('template_baru/footer');
			}



		}

		function data_order_ratumerak(){

			if (isset($_POST['tanggal'])) {
				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;

				$this->db->like('date', $tgl);
				$this->db->where('produk', 'ratumerak');
				$data['order'] = $this->db->get_where('tbl_order',['kode_member' => $this->session->kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_order_ratumerak', $data);

				$this->load->view('template_baru/footer');

			}else{



				$this->db->where('produk', 'ratumerak');
				$this->db->where('kode_member', $this->session->kode_member);
				$data['order'] = $this->db->get('tbl_order')->result_array();

				$this->load->view('template_baru/header');

				$this->load->view('baru/data_order_ratumerak', $data);

				$this->load->view('template_baru/footer');

			}



		}



		function data_order_markisa2(){

			if (isset($_POST['tanggal'])) {
				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;

				$this->db->like('date', $tgl);
				$this->db->where('produk', 'markisa');
				$data['order'] = $this->db->get_where('tbl_order',['kode_member' => $this->session->kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_order_markisa', $data);

				$this->load->view('template_baru/footer');

			}else{

				$this->db->where('produk', 'markisa');
				$this->db->where('kode_member', $this->session->kode_member);
				$data['order'] = $this->db->get('tbl_order')->result_array();

				$this->load->view('template_baru/header');

				$this->load->view('baru/data_order_markisa', $data);

				$this->load->view('template_baru/footer');

			}



		}

		function hapus_order(){


			$id_order =  $this->input->post('id_order');
			$kode_member = $this->input->post('kode_member');
			$qty = $this->input->post('qty');
			$produk = $this->input->post('produk');

			if ($produk == 'ratumerak') {

				$this->db->where('kode_member', $kode_member);
				$stok_r = $this->db->get('tbl_stok')->row_array();
				$stok = $stok_r['jumlah_stok'] + $qty;

				$this->db->where('kode_member', $kode_member);
				$this->db->update('tbl_stok',['jumlah_stok' => $stok]);

				$this->db->where('id_order', $id_order);
				$this->db->delete('tbl_order');

				$this->m_data->sendCancel($kode_member, $produk, $qty);


			}elseif ($produk == 'markisa') {

				$this->db->where('kode_member', $kode_member);
				$stok_m = $this->db->get('tbl_stok_markisa')->row_array();
				$stok = $stok_m['jumlah_stok'] + $qty;

				$this->db->where('kode_member', $kode_member);
				$this->db->update('tbl_stok_markisa',['jumlah_stok' => $stok]);

				$this->db->where('id_order', $id_order);
				$this->db->delete('tbl_order');

				$this->m_data->sendCancel($kode_member, $produk, $qty);


			}elseif ($produk == 'bonus ratumerak') {

				$this->db->where('kode_member', $kode_member);
				$stok_bonus_r = $this->db->get('tbl_bonus_topup_ratumerak')->row_array();
				$stok = $stok_bonus_r['total_stok_bonus'] + $qty;

				$this->db->where('kode_member', $kode_member);
				$this->db->update('tbl_bonus_topup_ratumerak',['total_stok_bonus' => $stok]);

				$this->db->where('id_order', $id_order);
				$this->db->delete('tbl_order');

				$this->m_data->sendCancel($kode_member, $produk, $qty);


			}elseif ($produk == 'bonus markisa') {
				$this->db->where('kode_member', $kode_member);
				$stok_bonus_m = $this->db->get('tbl_bonus_topup_markisa')->row_array();
				$stok = $stok_bonus_m['total_stok_bonus'] + $qty;

				$this->db->where('kode_member', $kode_member);
				$this->db->update('tbl_bonus_topup_markisa',['total_stok_bonus' => $stok]);

				$this->db->where('id_order', $id_order);
				$this->db->delete('tbl_order');	

				$this->m_data->sendCancel($kode_member, $produk, $qty);

			}

			$this->session->set_flashdata('message', 'swal("Yess!", "Data order berhasil dihapus", "success" );');
			redirect('utama/data_order');


		}





		function data_bonus(){

			if (isset($_POST['tanggal'])) {
				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;

				$this->db->order_by('id','desc');
				$this->db->like('date', $tgl);
				$data['bonus'] = $this->db->get_where('tbl_bonus',['kode_member' => $this->session->kode_member])->result_array();

				$this->db->like('date', $tgl);
				$this->db->select_sum('bonus');
				$data['total'] = $this->db->get_where('tbl_bonus',['kode_member' => $this->session->kode_member])->row_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_bonus', $data);
				$this->load->view('template_baru/footer');
			}else{

				$kode_member = $this->session->kode_member;

				$this->db->order_by('id','desc');
				$data['bonus'] = $this->db->get_where('tbl_bonus',['kode_member' =>  $kode_member])->result_array();
				$this->db->select_sum('bonus');
				$data['total'] = $this->db->get_where('tbl_bonus',['kode_member' => $kode_member])->row_array(); 



				$this->load->view('template_baru/header');

				$this->load->view('baru/data_bonus', $data);

				$this->load->view('template_baru/footer');

			}

		}





		function jaringan(){



			$kode_member = $this->session->kode_member;

			$data['member'] = $this->db->get_where('tbl_register', ['kode_member' =>$kode_member])->row_array();
			$this->db->order_by('id','desc');
			$data['level2'] = $this->db->get_where('tbl_register',['member_get' => $kode_member])->result_array();



			$this->load->view('template_baru/header');

			$this->load->view('baru/jaringan', $data);

			$this->load->view('template_baru/footer');



		}





		function profil(){



			$config['upload_path']          = './assets/profil/';

			$config['allowed_types']        = 'jpg|png|jpeg';

			$config['remove_spaces'] 		= true;

			$config['remove_spaces']		= false;





			$config['upload_path']          = './assets/profil/';

			$config['allowed_types']        = 'jpg|png|jpeg';

			$config['remove_spaces'] 		= true;

			$config['remove_spaces']		= false;



			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar_rek')){

				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('message', 'swal("Berkas yang anda masukan terlalu besar", "", "warning" );');

				redirect('utama/pay');

			}elseif (! $this->upload->do_upload('gambar_ktp')) {

				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('message', 'swal("Berkas yang anda masukan terlalu besar", "", "warning" );');

				redirect('utama/pay');



			}else{





				$data = [



					'nama' => $this->input->post('nama'),

					'jk' =>  $this->input->post('jk'),

					'tgl_lahir' => $this->input->post('tgl_lahir'),

					'tempat_lahir' => $this->input->post('tempat_lahir'),

					'alamat_lengkap' => $this->input->post('alamat'),

					'name_bank' => $this->input->post('name_bank'),

					'no_rek' => $this->input->post('no_rek'),
					'nohp' => $this->input->post('nohp'),

					'nik' => $this->input->post('nik'),

					'kode_member' => $this->session->kode_member,

					'gambar_rek' => $ktp = $_FILES['gambar_rek']['name'],

					'gambar_ktp' => $ktp = $_FILES['gambar_ktp']['name'],

				];



				$input = $this->db->insert('tbl_profil', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Profil anda berhasil di input", "success" );');

				redirect('utama/');

			}



		}







		function user(){



			$data['profil'] = $this->db->get_where('tbl_profil',['kode_member' => $this->session->kode_member])->row_array();

			$this->load->view('template_baru/header');

			$this->load->view('baru/user', $data);

			$this->load->view('template_baru/footer');



			$edit = $this->input->post('edit');



			if (isset($_POST['edit'])) {

				if ($_FILES['gambar']['name'] != null ) {
					
					$config['upload_path']          = './assets/profil/';
					$config['allowed_types']        = 'jpg|png|jpeg';
					$config['remove_spaces'] 		= true;
					$config['remove_spaces']		= false;


					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('gambar')){
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('message', 'swal("Opps", "Upload gagal", "error" );');
						redirect('utama/user');
					}else{
						$data = [
							'nama' => $this->input->post('nama'),
							'jk' =>  $this->input->post('jk'),
							'tgl_lahir' => $this->input->post('tgl_lahir'),
							'tempat_lahir' => $this->input->post('tempat_lahir'),
							'alamat_lengkap' => $this->input->post('alamat'),
							'name_bank' => $this->input->post('name_bank'),
							'nik' => $this->input->post('nik1'),
							'nohp' => $this->input->post('nohp'),
							'gambar_user' => $_FILES['gambar']['name'],
						];

						$this->db->where('kode_member', $this->session->kode_member);
						$this->db->update('tbl_profil', $data);

						// if (isset($_POST['nohp'])) {

						// 	$nohp = $this->input->post('nohp');
						// 	$this->db->where('kode_member', $this->session->kode_member);
						// 	$this->db->update('tbl_register',['no_telp' => $nohp]);
						// }

						$this->session->set_flashdata('message', 'swal("Yess!", "Profil anda berhasil diperbaharui", "success" );');

						redirect('utama/user');
					}

				}else{

					$data = [
						'nama' => $this->input->post('nama'),

						'jk' =>  $this->input->post('jk'),

						'tgl_lahir' => $this->input->post('tgl_lahir'),

						'tempat_lahir' => $this->input->post('tempat_lahir'),

						'alamat_lengkap' => $this->input->post('alamat'),

						'name_bank' => $this->input->post('name_bank'),
						'nik' => $this->input->post('nik1'),
						'nohp' => $this->input->post('nohp'),
					];



					$this->db->where('kode_member', $this->session->kode_member);
					$this->db->update('tbl_profil', $data);

					if (isset($_POST['nohp'])) {

						$nohp = $this->input->post('nohp');
						$this->db->where('kode_member', $this->session->kode_member);
						$this->db->update('tbl_register',['no_telp' => $nohp]);
					}

					$this->session->set_flashdata('message', 'swal("Yess!", "Profil anda berhasil diperbaharui", "success" );');

					redirect('utama/user');

				}

			}

		}







		function pay(){

			$kode_member = $this->session->kode_member;

			$data['pay'] = $this->db->get_where('tbl_checkout',['kode_member' => $kode_member])->row_array();

			$data['user'] =  $this->db->get_where('tbl_register',['kode_member' => $this->session->kode_member])->row_array();

			$data['cek_bukti'] = $this->db->get_where('tbl_bukti_tf', ['kode_member' => $this->session->kode_member])->row_array();



			$data['profil'] = $this->db->get_where('tbl_profil', ['kode_member' => $this->session->kode_member])->row_array();



			$this->load->view('template_baru/header');

			$this->load->view('baru/pay', $data);

			$this->load->view('template_baru/footer');

		}



		function upload(){





			$config['upload_path']          = './assets/bukti';

			$config['allowed_types']        = 'gif|jpg|png|jpeg';

			$config['remove_spaces']		= false;



			$this->load->library('upload', $config);



			if (!$this->upload->do_upload('bukti')){

				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('message', 'swal("Oops!", "Gambar yang anda upload gagal", "warning" );');

				redirect('utama/pay');

			}else{



				$data = [

					'kode_member' => $this->session->kode_member,

					'gambar' => $_FILES['bukti']['name'],

					'date' => date('d-m-Y'),

				];



				$this->db->insert('tbl_bukti_tf', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Gambar yang anda upload sukses", "success" );');

				redirect('utama/pay');



			}

		}





		function topup(){



			$data['ratu_merak'] = $this->db->get_where('tbl_produk',['nama_produk' => 'Ratu Merak'])->row_array();

			$data['markisa'] = $this->db->get_where('tbl_produk',['nama_produk' => 'Markisa'])->row_array();



			$this->db->where('kode_member', $this->session->kode_member);	

			$data['cek_produk_markisa'] = $this->db->get('tbl_produk_markisa')->row_array();



			$this->load->view('template_baru/header');
			$this->load->view('baru/topup', $data);
			$this->load->view('template_baru/footer');



			if (isset($_POST['kirim_ratumerak'])) {



				$data = [

					'produk' => $this->input->post('produk'),

					'slug' => $this->input->post('slug'),

					'harga' => $this->input->post('harga'),

					'qty' => $this->input->post('qty'),

					'kode_member' => $this->session->kode_member,

					'status' => 0,

				];



				$this->db->insert('tbl_topup', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Topup berhasil dilakuka, upload bukti pembayaran anda", "success" );');

				redirect('utama/data_topup');



			}elseif (isset($_POST['kirim_markisa'])) {





				$data = [

					'produk' => $this->input->post('produk'),

					'slug' => $this->input->post('slug'),

					'harga' => $this->input->post('harga'),

					'qty' => $this->input->post('qty'),

					'kode_member' => $this->session->kode_member,

					'status' => 0,

				];



				$this->db->insert('tbl_topup', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Topup berhasil dilakuka, upload bukti pembayaran anda", "success" );');

				redirect('utama/data_topup');

			}



		}





		function data_topup(){



			if (isset($_POST['tanggal'])) {

				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;

				$this->db->like('date_create', $tgl);
				$data['topup'] = $this->db->get_where('tbl_checkout_topup',['kode_member' => $this->session->kode_member])->result_array();

				$this->load->view('template_baru/header');

				$this->load->view('baru/data_topup', $data);


				$this->load->view('template_baru/footer');
			}else{
				$this->db->order_by('id','DESC');

				$data['topup'] = $this->db->get_where('tbl_checkout_topup',['kode_member' => $this->session->kode_member])->result_array();
				$this->load->view('template_baru/header');

				$this->load->view('baru/data_topup', $data);

				$this->load->view('template_baru/footer');
			}



		}

		function data_topup_merak(){

			if (isset($_POST['tanggal'])) {

				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;

				$this->db->order_by('id','DESC');
				$this->db->like('date_create', $tgl);
				$this->db->where('produk', 'ratu merak');
				$data['topup'] = $this->db->get_where('tbl_checkout_topup',['kode_member' => $this->session->kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_topup_merak', $data);
				$this->load->view('template_baru/footer');
			}else{

				$this->db->order_by('id','DESC');
				$this->db->where('kode_member', $this->session->kode_member);
				$this->db->where('produk', 'ratu merak');
				$data['topup'] = $this->db->get('tbl_checkout_topup')->result_array();

				$this->load->view('template_baru/header');

				$this->load->view('baru/data_topup_merak', $data);

				$this->load->view('template_baru/footer');

			}

		}

		function data_topup_markisa(){

			if (isset($_POST['tanggal'])) {

				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;

				$this->db->order_by('id','DESC');
				$this->db->like('date_create', $tgl);
				$this->db->where('produk', 'markisa');
				$data['topup'] = $this->db->get_where('tbl_checkout_topup',['kode_member' => $this->session->kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_topup_markisa', $data);
				$this->load->view('template_baru/footer');
			}else{

				$this->db->order_by('id','DESC');
				$this->db->where('kode_member', $this->session->kode_member);
				$this->db->where('produk', 'markisa');
				$data['topup'] = $this->db->get('tbl_checkout_topup')->result_array();

				$this->load->view('template_baru/header');

				$this->load->view('baru/data_topup_markisa', $data);

				$this->load->view('template_baru/footer');

			}

		}







		function bukti_topup(){



			$config['upload_path']          = './assets/topup';

			$config['allowed_types']        = 'gif|jpg|png|jpeg';

			$config['remove_spaces']		= false;



			$this->load->library('upload', $config);



			if (!$this->upload->do_upload('images')){

				$error = array('error' => $this->upload->display_errors());

				$this->session->set_flashdata('message', 'swal("Oops!", "Gambar yang anda upload gagal", "warning" );');

				redirect('utama/data_topup_ratumerak');

			}else{



				$data = [

					'kode_member' => $this->session->kode_member,

					'id_topup' => $this->input->post('id'),

					'gambar' => $_FILES['images']['name'],



				];



				$upload = $this->db->insert('tbl_bukti_topup', $data);

				if ($upload == true) {



					$id = $this->input->post('id');

					$this->db->where('id', $id);

					$this->db->update('tbl_topup', ['status' => 1]);

					$this->session->set_flashdata('message', 'swal("Yess!", "Gambar yang anda upload sukses", "success" );');

					redirect('utama/data_topup');

				}





			}

		}









		function delete_topup(){



			$id = $this->input->post('id');

			$this->db->where('id', $id);

			$this->db->delete('tbl_topup');

			$this->session->set_flashdata('message', 'swal("Yess!", "Topup berhasil dihapus", "success" );');

			redirect('utama/data_topup_ratumerak');

		}









		function withdraw(){

			$kode_member = $this->session->kode_member;

			$data['total'] = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array(); 
			$data['user'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();



			$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();

			$datap['total'] = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array();
			$data['profil'] = $this->db->get_where('tbl_profil', ['kode_member' => $this->session->kode_member])->row_array();


			$this->load->view('template_baru/header');

			$this->load->view('baru/withdraw', $data);

			$this->load->view('template_baru/footer');



			if (isset($_POST['kirim'])) {



				if ($data['total']['total_bonus'] < $this->input->post('penarikan')) {

					$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah bonus anda tidak mencukupi", "error" );');

					redirect('utama/withdraw');



				}elseif ($stok['jumlah_stok'] < 3) {

					$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah stok anda kurang dari 3", "error" );');

					redirect('utama/withdraw');

				}else{



					$this->db->where('kode_member', $this->session->kode_member);

					$this->db->where('date2', date('Y-m-d'));

					$cek  = $this->db->get('tbl_witdraw')->row_array();



					if ($cek == true) {

						$this->session->set_flashdata('message', 'swal("Oops!", "Anda sudah melakukan witdraw hari ini, cobalah beberapa saat lagi", "error" );');

						redirect('utama/withdraw');

					}else{

						$kode = rand(1, 100000);
						$data = [
							'kode_withdraw' => $kode,
							'kode_member' => $this->session->kode_member,

							'penarikan' => $this->input->post('penarikan'),

							'status' => 0,

							'date2' => date('Y-m-d'),

						];



						$this->db->insert('tbl_witdraw', $data);

						$kode_member = $this->session->kode_member;
						$bonus = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array();
						$update = $bonus['total_bonus'] - $this->input->post('penarikan');

						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_total_bonus',['total_bonus' => $update]);

						$this->session->set_flashdata('message', 'swal("Yess!", "Anda berhasil melakukan witdraw, silahkan menunggu persetujuan dari admin", "success" );');





						$this->session->set_flashdata('message1', "<div class='alert alert-success' role='alert'>

							Anda berhasil melakukan witdraw, silahkan menunggu persetujuan dari admin.

							</div>");

						redirect('utama/withdraw');



					}



				}



			}

		}

		function withdraw_cashback_ratumerak(){

			$kode_member = $this->session->kode_member;

			$data['total'] = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $kode_member])->row_array(); 
			$data['user'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();



			$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();

			$data['total'] = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $kode_member])->row_array();
			$data['profil']  = $this->db->get_where('tbl_profil', ['kode_member' => $this->session->kode_member])->row_array();


			$this->load->view('template_baru/header');

			$this->load->view('baru/withdraw_cashback_ratumerak', $data);

			$this->load->view('template_baru/footer');



			if (isset($_POST['kirim'])) {



				if ($data['total']['total_bonus'] < $this->input->post('penarikan')) {

					$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah bonus anda tidak mencukupi", "error" );');

					redirect('utama/withdraw_cashback_ratumerak');



				}elseif ($stok['jumlah_stok'] < 3) {

					$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah stok anda kurang dari 3", "error" );');

					redirect('utama/withdraw_cashback_ratumerak');

				}else{



					$this->db->where('kode_member', $this->session->kode_member);

					$this->db->where('date2', date('Y-m-d'));

					$cek  = $this->db->get('tbl_witdraw_cashback_ratumerak')->row_array();



					if ($cek == true) {

						$this->session->set_flashdata('message', 'swal("Oops!", "Anda sudah melakukan withdraw hari ini, cobalah beberapa saat lagi", "error" );');

						redirect('utama/withdraw_cashback_ratumerak');

					}else{

						$kode = rand(1, 100000);
						$data = [
							'kode_withdraw' => $kode,
							'kode_member' => $this->session->kode_member,

							'penarikan' => $this->input->post('penarikan'),

							'status' => 0,

							'date2' => date('Y-m-d'),

						];



						$this->db->insert('tbl_witdraw_cashback_ratumerak', $data);

						$kode_member = $this->session->kode_member;
						$bonus = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $kode_member])->row_array();
						$update = $bonus['total_bonus'] - $this->input->post('penarikan');

						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_total_cashback_ratumerak',['total_bonus' => $update]);

						$this->session->set_flashdata('message', 'swal("Yess!", "Anda berhasil melakukan witdraw, silahkan menunggu persetujuan dari admin", "success" );');





						$this->session->set_flashdata('message1', "<div class='alert alert-success' role='alert'>

							Anda berhasil melakukan witdraw, silahkan menunggu persetujuan dari admin.

							</div>");

						redirect('utama/withdraw_cashback_ratumerak');



					}



				}



			}

		}

		function withdraw_cashback_markisa(){

			$kode_member = $this->session->kode_member;

			$data['total'] = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $kode_member])->row_array(); 
			$data['user'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();



			$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();

			$data['total'] = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $kode_member])->row_array();
			$data['profil'] = $this->db->get_where('tbl_profil', ['kode_member' => $this->session->kode_member])->row_array();


			$this->load->view('template_baru/header');

			$this->load->view('baru/withdraw_cashback_markisa', $data);

			$this->load->view('template_baru/footer');



			if (isset($_POST['kirim'])) {



				if ($data['total']['total_bonus'] < $this->input->post('penarikan')) {

					$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah bonus anda tidak mencukupi", "error" );');

					redirect('utama/withdraw_cashback_markisa');



				}elseif ($stok['jumlah_stok'] < 3) {

					$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah stok anda kurang dari 3", "error" );');

					redirect('utama/witdraw_cashback_markisa');

				}else{



					$this->db->where('kode_member', $this->session->kode_member);

					$this->db->where('date', date('Y-m-d'));

					$cek  = $this->db->get('tbl_witdraw_cashback_markisa')->row_array();



					if ($cek == true) {

						$this->session->set_flashdata('message', 'swal("Oops!", "Anda sudah melakukan withdraw hari ini, cobalah beberapa saat lagi", "error" );');

						redirect('utama/withdraw_cashback_markisa');

					}else{

						$kode  = rand(1, 100000);

						$data = [
							'kode_withdraw' => $kode,
							'kode_member' => $this->session->kode_member,

							'penarikan' => $this->input->post('penarikan'),

							'status' => 0,

							'date2' => date('Y-m-d'),

						];



						$this->db->insert('tbl_witdraw_cashback_markisa', $data);

						$kode_member = $this->session->kode_member;
						$bonus = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $kode_member])->row_array();
						$update = $bonus['total_bonus'] - $this->input->post('penarikan');

						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_total_cashback_markisa',['total_bonus' => $update]);

						$this->session->set_flashdata('message', 'swal("Yess!", "Anda berhasil melakukan witdraw, silahkan menunggu persetujuan dari admin", "success" );');





						$this->session->set_flashdata('message1', "<div class='alert alert-success' role='alert'>

							Anda berhasil melakukan witdraw, silahkan menunggu persetujuan dari admin.

							</div>");

						redirect('utama/withdraw_cashback_markisa');



					}



				}



			}

		}







		function data_withdraw(){


			$this->db->order_by('id_withdraw','desc');
			$data['wt'] = $this->db->get_where('tbl_witdraw',['kode_member' => $this->session->kode_member])->result_array();

			$this->load->view('template_baru/header');

			$this->load->view('baru/data_withdraw', $data);

			$this->load->view('template_baru/footer');

		}

		function data_withdraw_cashback_ratumerak(){


			$this->db->order_by('id_withdraw','desc');
			$data['wt'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['kode_member' => $this->session->kode_member])->result_array();

			$this->load->view('template_baru/header');

			$this->load->view('baru/data_withdraw_cashback_ratumerak', $data);

			$this->load->view('template_baru/footer');

		}

		function data_withdraw_cashback_markisa(){


			$this->db->order_by('id_withdraw','desc');
			$data['wt'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['kode_member' => $this->session->kode_member])->result_array();

			$this->load->view('template_baru/header');

			$this->load->view('baru/data_withdraw_cashback_markisa', $data);

			$this->load->view('template_baru/footer');

		}





		function produk_markisa(){

			$data['cek'] = $this->db->get_where('tbl_produk_markisa',['kode_member' => $this->session->kode_member])->row_array();

			$this->load->view('template_baru/header');

			$this->load->view('baru/produk_markisa', $data);

			$this->load->view('template_baru/footer');



			if (isset($_POST['kirim'])) {

				$kode = rand(1, 100000);

				$kode_produk = "markisa-".$kode;



				$data = [

					'kode_produk' => $kode_produk,

					'kode_member' => $this->session->kode_member,

					'stok' => 10,

					'merek' => 'markisa',

					'harga' => 120000,

					'status_tf' => 0,

					'status_produk' => 0,

				];



				$this->db->insert('tbl_produk_markisa', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Produk markisa berhasi di order", "success" );');

				$this->session->set_flashdata('message1', "<div class='alert alert-warning' role='alert'>

					Produk markisa berhasil di order, silahkan melakukan pembayaran untuk mendapatkan stok produk markisa.

					</div>");

				redirect('ratumerak/data_order_markisa');



			}



		}



		function data_order_markisa(){

			$kode_member = $this->session->kode_member;

			$this->db->order_by('id','desc');
			$data['markisa'] = $this->db->get_where('tbl_checkout_markisa',['kode_member' => $kode_member])->row_array();

	 	// $data['markisa'] = $this->db->get_where('tbl_produk_markisa',['kode_member' => $this->session->kode_member],1)->result_array();

			$this->load->view('template_baru/header');

			$this->load->view('baru/data_order_markisa', $data);

			$this->load->view('template_baru/footer');



			if (isset($_POST['delete'])) {

				$id = $this->input->post('id');

				$this->db->where('id', $id);

				$this->db->delete('tbl_produk_markisa');

				$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil di hapus", "success" );');

				redirect('ratumerak/data_order_markisa');

			}elseif (isset($_POST['bukti'])) {



				$config['upload_path']          = './assets/markisa';

				$config['allowed_types']        = 'gif|jpg|png|jpeg';

				$config['remove_spaces']		= false;



				$this->load->library('upload', $config);



				if (!$this->upload->do_upload('images')){

					$error = array('error' => $this->upload->display_errors());

					$this->session->set_flashdata('message', 'swal("Oops!", "Gambar yang anda upload gagal", "warning" );');

					redirect('ratumerak/data_order_markisa');

				}else{



					$data = [

						'kode_produk' => $this->input->post('kode_produk'),

						'kode_member'=> $this->session->kode_member,

						'gambar' => $_FILES['images']['name'],



					];



					$upload = $this->db->insert('tbl_bukti_markisa', $data);

					if ($upload == true) {



						$id = $this->input->post('id');

						$this->db->where('id', $id);

						$this->db->update('tbl_produk_markisa', ['status_tf' => 1]);

						$this->session->set_flashdata('message', 'swal("Yess!", "Gambar yang anda upload sukses", "success" );');

						redirect('ratumerak/data_order_markisa');

					}

				}



			}

		}



		function profil_user(){



			$data['profil'] = $this->db->get_where('tbl_profil',['kode_member' => $this->session->kode_member])->row_array();



			$this->load->view('template/header');

			$this->load->view('utama/profil_member', $data);

			$this->load->view('template/footer');



			if (isset($_POST['kirim'])) {

				$data = [



					'nama' => $this->input->post('nama'),

					'jk' =>  $this->input->post('jk'),

					'tgl_lahir' => $this->input->post('tgl_lahir'),

					'tempat_lahir' => $this->input->post('tempat_lahir'),

					'alamat_lengkap' => $this->input->post('alamat'),

					'name_bank' => $this->input->post('name_bank'),

					'no_rek' => $this->input->post('no_rek'),

					'nik' => $this->input->post('nik'),



				];



				$this->db->where('kode_member', $this->session->kode_member);

				$this->db->update('tbl_profil', $data);

				$this->session->set_flashdata('message', 'swal("Yess!", "Profil anda berhasil diperharuis", "success" );');

				redirect('utama/profil_user');



			}



		}





		function sendKurir($kec){

			$this->db->select('*');

			$this->db->from('tbl_wilayah_store');

			$this->db->join('tbl_kurir', 'tbl_kurir.id_store = tbl_wilayah_store.id_store');

			$this->db->where('kec', $kec);

			$query = $this->db->get()->row_array();

			if ($query == true) {

				$nohp = $query['no_telp'];

				$this->m_data->sendKurir($nohp);

			}



		}



		function cek_rekening(){



			$nomor_rek = $this->input->post('nomor_rek');

			$kode_member = $this->input->post('kode_member');


			$this->db->where('kode_member', $this->session->kode_member);
			$profil = $this->db->get_where('tbl_profil',['no_rek' => $nomor_rek])->row_array();

			if ($profil == true) {



				echo 'true';

			}else{

				echo 'false';

			}

		}



		function cek_email(){



			$email = $this->input->post('email');

			$kode_member =$this->input->post('kode_member2');



			$profil = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();

			$no_rek = $profil['no_rek'];



			$cek = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();

			if ($cek['email'] == $email) {



				$this->sendEmail($no_rek, $email);

				echo '<div class="alert alert-success mt-2" role="alert">

				Nomor rekening berhasil dikirim di akun email anda.

				</div>';

			}else{



				echo '<div class="alert alert-danger mt-2" role="alert">

				Akun email yang anda masukan salah.

				</div>';

			}

		}



		function cek_email2(){



			$email = $this->input->post('email3');

			$kode_member = $this->input->post('kode_member3');



			$profil = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();

			$no_rek = $profil['no_rek'];



			$cek = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();

			if ($cek['email'] == $email) {

				$kode =  rand(100,10000000000000);

				$data = [

					'kode' => $kode,

					'kode_member' => $kode_member,

					'status' => 0,

				];



				$this->db->insert('tbl_token_rek', $data);



				$this->sendEmailUbahRekening($kode, $email);

				echo '<div class="alert alert-success mt-2" role="alert">

				Silahkan cek akun email anda untuk ubah nomor rekening.

				</div>';

			}else{



				echo '<div class="alert alert-danger mt-2" role="alert">

				Akun email yang anda masukan salah.

				</div>';

			}

		}



		function sendEmail($no_rek, $email){

			$this->load->library('email');
			$ci = get_instance();
			$config['protocol'] = "SMTP";
			$config['smtp_host'] = "mail.ratumerak.id";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "cs@ratumerak.id";
			$config['smtp_pass'] = "ratumerak123";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$ci->email->initialize($config);


			$this->email->from('cs@ratumerak.id', 'Ratumerak');
			$this->email->to($email);
			$this->email->subject('Ratumerak');

			$template = file_get_contents(base_url("email/lupa_rekening.php?kode=$no_rek"));
			$this->email->message($template);



			if (!$this->email->send())

				show_error($this->email->print_debugger());

			else

				echo '';



		}



		function sendEmailUbahRekening($kode, $email){



			$this->load->library('email');
			$ci = get_instance();
			$config['protocol'] = "SMTP";
			$config['smtp_host'] = "mail.ratumerak.id";
			$config['smtp_port'] = "465";
			$config['smtp_user'] = "cs@ratumerak.id";
			$config['smtp_pass'] = "ratumerak123";
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$ci->email->initialize($config);


			$this->email->from('cs@ratumerak.id', 'Ratumerak');
			$this->email->to($email);
			$this->email->subject('Ratumerak');
  // $get1 = file_get_contents(base_url("ebunga/temp_email?orderid=$order_id"));

			$template = file_get_contents(base_url("email/ubah_rekening.php?kode=$kode"));
			$this->email->message($template);

			if (!$this->email->send())
				show_error($thids->email->print_debugger());
			else

				echo '';

		}



		function ubah_rekening($id){

			$member = $this->db->get_where('tbl_token_rek',['kode' => $id])->row_array();

			if ($member['status'] == 1) {

				$this->session->set_flashdata('message', 'swal("Oops!", "Anda sudah melakukan perubahan kartu kredit", "error" );');

				redirect('utama/withdraw');

			}else{



				$this->load->view('utama/ubah_rekening');



				if (isset($_POST['kirim'])) {



					$member = $this->db->get_where('tbl_token_rek',['kode' => $id])->row_array();

					$kode_member = $member['kode_member'];



					$no_rek = $this->input->post('no_rek');

					$this->db->where('kode_member', $kode_member);

					$this->db->update('tbl_profil',['no_rek' => $no_rek]);



					$this->db->where('kode_member', $kode_member);

					$this->db->update('tbl_token_rek',['status' => 1]);



					$this->session->set_flashdata('message', 'swal("Yess!", "Anda berhasil melakukan perubahan kartu kredit", "success" );');

					redirect('utama/withdraw');

				}



			}





		}



		function hapus_order_topup(){

			$order_id = $this->input->post('order_id');



			$this->db->where('order_id', $order_id);

			$this->db->delete('tbl_checkout_topup');

			$this->session->set_flashdata('message', 'swal("Yess!", "Orderan anda berhasil dihapus", "success" );');

			redirect('utama/data_topup');



		}



		function cek_stok_order($kode_member, $produk, $qty){



			$member = $kode_member;



			$this->db->select_sum('qty');

			$this->db->where('produk',$produk);

			$this->db->where('kode_member',$member);

			$this->db->where('status_order !=','Pesanan selesai');

			$cek = $this->db->get('tbl_order')->row_array();





			$input = $qty + $cek['qty'];



			if ($produk == 'ratumerak') {



				$ratumerak = $this->db->get_where('tbl_stok',['kode_member' => $member])->row_array();

				if ($input > $ratumerak['jumlah_stok']) {

					$this->session->set_flashdata('message', 'swal("Opps!", "Mohon maaf sudah melakukan order melebihi batas stok produk anda, silahkan hapus orderan anda yang belum di proses/menunggu atau silahkan melakukan topup produk.", "error" );');

					redirect('utama/order');

				}

			}elseif ($produk == 'markisa') {



				$markisa = $this->db->get_where('tbl_stok_markisa',['kode_member' => $member])->row_array();

				if ($input > $markisa['jumlah_stok']) {

					$this->session->set_flashdata('message', 'swal("Opps!", "Mohon maaf sudah melakukan order melebihi batas stok produk anda, silahkan hapus orderan anda yang belum di proses/menunggu atau silahkan melakukan topup produk.", "error" );');

					redirect('utama/order');

				}

			}elseif ($produk == 'bonus markisa') {

				$bonus_m = $this->db->get_where('tbl_bonus_topup_markisa',['kode_member' => $member])->row_array();

				if ($input > $bonus_m['total_stok_bonus']) {

					$this->session->set_flashdata('message', 'swal("Opps!", "Mohon maaf sudah melakukan order melebihi batas stok produk anda, silahkan hapus orderan anda yang belum di proses/menunggu atau silahkan melakukan topup produk.", "error" );');

					redirect('utama/order');



				}

			}elseif ($produk == 'bonus ratumerak') {

				$bonus_r = $this->db->get_where('tbl_bonus_topup_ratumerak',['kode_member' => $member])->row_array();

				if ($input > $bonus_r['total_stok_bonus']) {

					$this->session->set_flashdata('message', 'swal("Opps!", "Mohon maaf sudah melakukan order melebihi batas stok produk anda, silahkan hapus orderan anda yang belum di proses/menunggu atau silahkan melakukan topup produk.", "error" );');

					redirect('utama/order');



				}

			}



		}



		function cancel_withdraw(){

			$id = $this->input->post('id');
			$jml = $this->input->post('Withdraw');
			$kode_member = $this->input->post('kode_member');

			$bonus = $this->db->get_where('tbl_total_bonus', ['kode_member' => $kode_member])->row_array();
			$total_bonus = $bonus['total_bonus'];
			$update = $total_bonus + $jml;

			$this->db->where('kode_member', $kode_member);
			$cencel = $this->db->update('tbl_total_bonus',['total_bonus' => $update]);

			if ($cencel == true) {

				$this->db->where('id_withdraw', $id);
				$this->db->delete('tbl_witdraw');

				$this->session->set_flashdata('message', 'swal("Yess!", "Withdraw anda berhasil di cancel.", "success" );');

				redirect('utama/data_withdraw');

			}


		}


		function ubah_password(){
			$this->form_validation->set_rules('pass_lama', 'password', 'required|trim|min_length[6]');
			$this->form_validation->set_rules('pass_baru', 'password', 'required|trim|min_length[6]');
			$this->form_validation->set_rules('pass_baru2', 'confirmation password', 'required|trim|min_length[6]|matches[pass_baru]');

			if ($this->form_validation->run() == false) {
				$this->load->view('template_baru/header');
				$this->load->view('baru/ubah_password');
				$this->load->view('template_baru/footer');
			}else{

				$kode_member = $this->session->kode_member;
				$pass_lama  = $this->input->post('pass_lama');

				$cek_pass = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
				if (password_verify($pass_lama, $cek_pass['pass'])) {

					$data = [
						'pass' => password_hash($this->input->post('pass_baru'), PASSWORD_DEFAULT),
					];

					$this->db->where('kode_member', $kode_member);
					$this->db->update('tbl_register', $data);
					$this->session->set_flashdata('message', 'swal("Yess!", "Password anda berhasil diubah.", "success" );');
					redirect('utama/ubah_password');
				}else{

					$this->session->set_flashdata('message', 'swal("Opps!", "Password lama yang anda masukan salah.", "error" );');
					redirect('utama/ubah_password');

				}
			}
		}

		function ubah_rekening_anda(){

			$this->load->view('template_baru/header');
			$this->load->view('baru/ubah_rekening2');
			$this->load->view('template_baru/footer');

			if (isset($_POST['kirim'])) {

				$kode_member = $this->session->kode_member;
				$member = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();

				if ($member['no_rek'] != $this->input->post('rek_lama')) {

					$this->session->set_flashdata('message', 'swal("Opps!", "Nomor rekening lama yang anda masukan salah.", "error" );');
					redirect('utama/ubah_rekening_anda');
				}else{

					$config['upload_path']          = './assets/profil/';
					$config['allowed_types']        = 'jpg|png|jpeg';
					$config['remove_spaces'] 		= true;
					$config['remove_spaces']		= false;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('gambar_rek')){
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('message', 'swal("Gambar yang anda masukan terlalu besar", "", "warning" );');

						redirect('utama/ubah_rekening_anda');
					}else{


						$data =[

							'no_rek' => $this->input->post('rek_baru'),
							'gambar_rek' => $_FILES['gambar_rek']['name'],
							'name_bank' => $this->input->post('bank'),
						];

						$this->db->where('kode_member', $kode_member);
						$this->db->update('tbl_profil', $data);
						$this->session->set_flashdata('message', 'swal("Yess!", "Nomor rekening berhasil diubah", "success" );');
						redirect('utama/ubah_rekening_anda');


					}


				}


			}
		}


		function data_cashback_ratumerak(){

			if (isset($_POST['tanggal'])) {
				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;
				$kode_member = $this->session->kode_member;

				$this->db->order_by('id','desc');
				$this->db->like('date_create', $tgl);
				$data['bonus_cashback'] = $this->db->get_where('tbl_bonus_cashback_ratumerak',['kode_member' => $kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_cashback_ratumerak', $data);
				$this->load->view('template_baru/footer');

			}else{
				$kode_member = $this->session->kode_member;
				$this->db->order_by('id','desc');
				$data['bonus_cashback'] = $this->db->get_where('tbl_bonus_cashback_ratumerak',['kode_member' => $kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_cashback_ratumerak', $data);
				$this->load->view('template_baru/footer');

			}
		}

		function data_cashback_markisa(){

			if (isset($_POST['tanggal'])) {
				$tgl = $this->input->post('tanggal');
				$data['tgl'] = $tgl;
				$kode_member = $this->session->kode_member;

				$this->db->order_by('id','desc');
				$this->db->like('date_create', $tgl);
				$data['bonus_cashback'] = $this->db->get_where('tbl_bonus_cashback_markisa',['kode_member' => $kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_cashback_markisa', $data);
				$this->load->view('template_baru/footer');

			}else{
				$kode_member = $this->session->kode_member;
				$this->db->order_by('id','desc');
				$data['bonus_cashback'] = $this->db->get_where('tbl_bonus_cashback_markisa',['kode_member' => $kode_member])->result_array();

				$this->load->view('template_baru/header');
				$this->load->view('baru/data_cashback_markisa', $data);
				$this->load->view('template_baru/footer');

			}
		}



	}



	?>
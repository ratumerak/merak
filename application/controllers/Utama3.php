<?php 	

	/**
	 * 
	 */
	class Utama3 extends CI_Controller
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
			$data['member'] = $this->db->get_where('tbl_member',['member_get' => $kode_member])->num_rows();
			$data['order'] = $this->db->get_where('tbl_order', ['kode_member' => $kode_member])->num_rows();
			$data['profil'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();
			$data['user'] = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();

			$data['markisa'] = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();

			$data['cek_bukti'] = $this->db->get_where('tbl_bukti_tf', ['kode_member' => $this->session->kode_member])->row_array();



			 $this->load->view('template/header');
			 $this->load->view('utama/index', $data);
			 $this->load->view('template/footer');
		}


		function data_member(){

			$this->db->where('status_member', 0);
			$this->db->where('member_get',$this->session->kode_member);
			$data['member'] = $this->db->get('tbl_member')->result_array();

			 $this->load->view('template/header');
			 $this->load->view('utama/data_member', $data);
			 $this->load->view('template/footer');
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

			$data['stok'] = $this->db->get_where('tbl_stok',['kode_member' => $this->session->kode_member])->row_array();
			$data['stok_markisa'] = $this->db->get_where('tbl_stok_markisa',['kode_member' => $this->session->kode_member])->row_array();

			if ($this->form_validation->run() == false) {

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
				
				$this->load->view('template/header');
				$this->load->view('utama/order', $data);
				$this->load->view('template/footer');
			}else{

				 $kab = $this->input->post('kab');
				 $id_kab = $this->db->get_where('tbl_store',['id' => $kab])->row_array();


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

				];

				$input = $this->db->insert('tbl_order', $data);

				if ($input == true) {
					$this->sendKurir($this->input->post('kec'));
					$this->session->set_flashdata('message', 'swal("Yess!", "Order berhasi ditambahkan", "success" );');
			 	 	redirect('utama/order');
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
	  	$data['order'] = $this->db->get_where('tbl_order',['kode_member' => $this->session->kode_member])->result_array();
	  	$this->load->view('template/header');
		$this->load->view('utama/data_order', $data);
		$this->load->view('template/footer');

	  }


	  function data_bonus(){
	  	$kode_member = $this->session->kode_member;
	  	$data['bonus'] = $this->db->get_where('tbl_bonus',['kode_member' =>  $kode_member])->result_array();

	  	$this->db->select_sum('bonus');
		$data['total'] = $this->db->get_where('tbl_bonus',['kode_member' => $kode_member])->row_array(); 

	  	$this->load->view('template/header');
	  	$this->load->view('utama/data_bonus', $data);
	  	$this->load->view('template/footer');
	  }


	  function jaringan(){
	  	
	  	$kode_member = $this->session->kode_member;
	  	$data['member'] = $this->db->get_where('tbl_register', ['kode_member' =>$kode_member])->row_array();
	  	$data['level2'] = $this->db->get_where('tbl_register',['member_get' => $kode_member])->result_array();

	  	$this->load->view('template/header');
	  	$this->load->view('utama/jaringan', $data);
	  	$this->load->view('template/footer');

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
		 		redirect('seller/register');
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
	  	$this->load->view('template/header');
	  	$this->load->view('utama/user', $data);
	  	$this->load->view('template/footer');

	  	$edit = $this->input->post('edit');

	  	if (isset($edit)) {
	  		
	  		$data = [

	  		'nama' => $this->input->post('nama'),
	  		'jk' =>  $this->input->post('jk'),
	  		'tgl_lahir' => $this->input->post('tgl_lahir'),
	  		'tempat_lahir' => $this->input->post('tempat_lahir'),
	  		'alamat_lengkap' => $this->input->post('alamat'),
	  		'no_rek' => $this->input->post('no_rek'),
	  		'kode_member' => $this->session->kode_member,
	  	];

	  	$this->db->where('kode_member', $this->session->kode_member);
	  	$this->db->update('tbl_profil', $data);
	  	$this->session->set_flashdata('message', 'swal("Yess!", "Profil anda berhasil di ubah", "success" );');
		redirect('utama/user');

	  	}
	  }



	  function pay(){
	  	$kode_member = $this->session->kode_member;
	  	$data['pay'] = $this->db->get_where('tbl_checkout',['kode_member' => $kode_member])->row_array();
	  	$data['user'] =  $this->db->get_where('tbl_register',['kode_member' => $this->session->kode_member])->row_array();
	  	$data['cek_bukti'] = $this->db->get_where('tbl_bukti_tf', ['kode_member' => $this->session->kode_member])->row_array();

	  	$data['profil'] = $this->db->get_where('tbl_profil', ['kode_member' => $this->session->kode_member])->row_array();

	  	$this->load->view('template/header');
	  	$this->load->view('utama/pay', $data);
	  	$this->load->view('template/footer');
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

	  	$this->load->view('template/header');
	  	$this->load->view('utama/topup', $data);
	  	$this->load->view('template/footer');

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
	  	$this->db->order_by('id','DESC');
	  	$data['topup'] = $this->db->get_where('tbl_checkout_topup',['kode_member' => $this->session->kode_member])->result_array();
	  	 $this->load->view('template/header');
	  	$this->load->view('utama/data_topup', $data);
	  	$this->load->view('template/footer');
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
	 	$this->db->select_sum('bonus');
		$data['total'] = $this->db->get_where('tbl_bonus',['kode_member' => $kode_member])->row_array(); 

		$data['user'] = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();

		$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();
		$datap['total'] = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array();

	 	$this->load->view('template/header');
	  	$this->load->view('utama/withdraw', $data);
	  	$this->load->view('template/footer');

	  	if (isset($_POST['kirim'])) {

	  		if ($data['total']['bonus'] < $this->input->post('penarikan')) {
	  			$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah bonus anda tidak mencukupi", "error" );');
	 			redirect('utama/withdraw');

	  		}elseif ($stok['jumlah_stok'] < 3) {
	  			$this->session->set_flashdata('message', 'swal("Oops!", "Jumlah stok anda kurang dari 3", "error" );');
	 			redirect('utama/withdraw');
	  		}else{

	  		$this->db->where('kode_member', $this->session->kode_member);
	  		$this->db->where('date', date('Y-m-d'));
	  		$cek  = $this->db->get('tbl_witdraw')->row_array();

	  		if ($cek == true) {
	  			$this->session->set_flashdata('message', 'swal("Oops!", "Anda sudah melakukan witdraw hari ini, cobalah beberapa saat lagi", "error" );');
	  			redirect('utama/withdraw');
	  		}else{
	  		
	  		$data = [
	  			'kode_member' => $this->session->kode_member,
	  			'penarikan' => $this->input->post('penarikan'),
	  			'status' => 0,
	  			'date' => date('Y-m-d'),
	  		];

	  		$this->db->insert('tbl_witdraw', $data);
	  		$this->session->set_flashdata('message', 'swal("Yess!", "Anda berhasil melakukan witdraw", "success" );');
	 			

	  		$this->session->set_flashdata('message1', "<div class='alert alert-success' role='alert'>
 			Anda berhasil melakukan witdraw, silahkan menunggu persetujuan dari admin.
			</div>");
	 		redirect('utama/withdraw');

	 	}

	 }

	  	}
	 }


	 function data_withdraw(){

	 	$data['wt'] = $this->db->get_where('tbl_witdraw',['kode_member' => $this->session->kode_member])->result_array();
	  	$this->load->view('template/header');
	  	$this->load->view('utama/data_withdraw', $data);
	  	$this->load->view('template/footer');
	 }


	 function produk_markisa(){

	 	$this->load->view('template/header');
	  	$this->load->view('utama/produk_markisa');
	  	$this->load->view('template/footer');

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
 			Produk markisa berhasil di order, silahkan melakukan pembayaran.
			</div>");
	 		redirect('utama/data_order_markisa');

	  	}

	 }

	 function data_order_markisa(){
	 	$data['markisa'] = $this->db->get_where('tbl_produk_markisa',['kode_member' => $this->session->kode_member],1)->result_array();
	 	$this->load->view('template/header');
	  	$this->load->view('utama/data_order_markisa', $data);
	  	$this->load->view('template/footer');

	  	if (isset($_POST['delete'])) {
	  		$id = $this->input->post('id');
	  		$this->db->where('id', $id);
	  		$this->db->delete('tbl_produk_markisa');
	  		$this->session->set_flashdata('message', 'swal("Yess!", "Data berhasil di hapus", "success" );');
	 			redirect('utama/data_order_markisa');
	  	}elseif (isset($_POST['bukti'])) {
	  		
	  		$config['upload_path']          = './assets/markisa';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['remove_spaces']		= false;
			
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('images')){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('message', 'swal("Oops!", "Gambar yang anda upload gagal", "warning" );');
	 			redirect('utama/data_order_markisa');
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
	 			redirect('utama/data_order_markisa');
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

	$profil = $this->db->get_where('tbl_profil',['no_rek' => $nomor_rek])->row_array();
	if ($profil == true) {
		
		// echo '<div class="alert alert-success mt-2" role="alert">
		// 		Nomor Rekening yang anda masukan benar.
		// 	</div>';

		echo "true";

	}else{
		// echo ' <div class="alert alert-danger mt-2" role="alert">
  //             Nomor Rekening yang anda masukan salah.
  //             <a href="#" data-toggle="modal" data-target="#exampleModalCenter"> Lupa Rekening ? </a>, 
  //              <a href="#" data-toggle="modal" data-target="#exampleModalCenterUbah"> Ubah Rekening ? </a>
  //           </div>';


		echo "false";




	}
}

function cek_email(){

	$email = $this->input->post('email');
	$kode_member =$this->input->post('kode_member2');

	$profil = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();
	$no_rek = $profil['no_rek'];

	$cek = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
	if ($cek['email'] == $email) {

		$this->sendEmail($no_rek);
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
	$kode_member =$this->input->post('kode_member3');

	$profil = $this->db->get_where('tbl_profil',['kode_member' => $kode_member])->row_array();
	$no_rek = $profil['no_rek'];

	$cek = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
	if ($cek['email'] == $email) {
		$kode =  rand(100,10000000000000);
		$data = [
			'kode' => $kode,
			'kode_member' => $kode_member,
			'status' => 0,
		];

		$this->db->insert('tbl_token_rek', $data);

		$this->sendEmailUbahRekening($kode);
	echo '<div class="alert alert-success mt-2" role="alert">
				Silahkan cek akun email anda untuk ubah nomor rekening.
		</div>';
	}else{

		echo '<div class="alert alert-danger mt-2" role="alert">
				Akun email yang anda masukan salah.
			</div>';
	}
}

function sendEmail($no_rek){

	// $email = $data['email'];
	// $kode_member = $data['kode_member'];
	// $username = $data['username'];
	// 	// $bank = $data['bank'];
	 $config = [
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_user' => 'alldii1956@gmail.com',
    'smtp_pass' => 'mtxhyvydobbxzktu',
    'smtp_port' => 465,
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'newline'   => "\r\n"
	];

  $this->load->library('email', $config);
  $this->email->initialize($config);
  $this->email->set_newline("\r\n");

  $this->email->from('alldii1956@gmail.com', 'PT.Sinar Aneka Niaga');
  $this->email->to('alldii1956@gmail.com');

  $this->email->subject('PT. Sinar Unigren Indonesia');
  // $get1 = file_get_contents(base_url("ebunga/temp_email?orderid=$order_id"));
  $template = file_get_contents(base_url("email/lupa_rekening.php?kode=$no_rek"));
  $this->email->message($template);

  if (!$this->email->send())
  show_error($this->email->print_debugger());
  else
  echo '';

}

function sendEmailUbahRekening($kode){

	$config = [
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_user' => 'alldii1956@gmail.com',
    'smtp_pass' => 'mtxhyvydobbxzktu',
    'smtp_port' => 465,
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'newline'   => "\r\n"
	];

  $this->load->library('email', $config);
  $this->email->initialize($config);
  $this->email->set_newline("\r\n");

  $this->email->from('alldii1956@gmail.com', 'PT.Sinar Aneka Niaga');
  $this->email->to('alldii1956@gmail.com');

  $this->email->subject('PT. Sinar Unigren Indonesia');
  // $get1 = file_get_contents(base_url("ebunga/temp_email?orderid=$order_id"));
  $template = file_get_contents(base_url("email/ubah_rekening.php?kode=$kode"));
  $this->email->message($template);

  if (!$this->email->send())
  show_error($this->email->print_debugger());
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
	redirect('utama/data_order');

}

	


}

 ?>
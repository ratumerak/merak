<?php 



	/**

	 * 

	 */

	class Admin extends CI_Controller

	{

		

		function __construct()

		{

			parent:: __construct();

			$this->load->model('m_data');

			if ($this->session->name_admin == null) {

				redirect('login_admin/');

			}

		}



		function index(){

			$data['member'] = $this->db->get('tbl_member')->num_rows();

			$data['register'] = $this->db->get('tbl_register')->num_rows();

			$data['order'] = $this->db->get('tbl_order')->num_rows();

			$data['order_now'] = $this->db->get_where('tbl_order',['data_order' => date('m-d-Y')])->num_rows();

			$this->db->select_sum('qty');

			$data['topup'] = $this->db->get('tbl_topup')->row_array();

			$data['top'] = $this->db->get('tbl_topup')->num_rows(); 

			$this->db->where('produk','ratu merak');
			$this->db->select_sum('bonus');
			$data['bonus_topup_r'] = $this->db->get('tbl_bonus_topup')->row_array();

			$this->db->where('produk','markisa');
			$this->db->select_sum('bonus');
			$data['bonus_topup_m'] = $this->db->get('tbl_bonus_topup')->row_array();

			$data['wt'] = $this->db->get_where('tbl_witdraw',['date2' => date('Y-m-d')])->num_rows();
			$data['wt2'] = $this->db->get('tbl_witdraw')->num_rows();
			$this->db->select_sum('penarikan');
			$this->db->where('status', 1);
			$data['total_wt'] = $this->db->get('tbl_witdraw')->row_array();

			$data['wt_hari_ini_cr'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['date2' => date('Y-m-d')])->num_rows();
			$data['wt_jumlah_cr'] = $this->db->get('tbl_witdraw_cashback_ratumerak')->num_rows();
			$this->db->select_sum('penarikan');
			$this->db->where('status', 1);
			$data['total_wt_cr'] = $this->db->get('tbl_witdraw_cashback_ratumerak')->row_array();

			$data['wt_hari_ini_mr'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['date2' => date('Y-m-d')])->num_rows();
			$data['wt_jumlah_mr'] = $this->db->get('tbl_witdraw_cashback_markisa')->num_rows();
			$this->db->select_sum('penarikan');
			$this->db->where('status', 1);
			$data['total_wt_mr'] = $this->db->get('tbl_witdraw_cashback_markisa')->row_array();

			$this->db->select_sum('jumlah_paket');
			$data['produk_r'] = $this->db->get('tbl_member')->row_array();

			$data['produk_m'] = $this->db->get('tbl_produk_markisa')->num_rows();

			$this->db->select_sum('jumlah_topup');
			$data['total_topup'] = $this->db->get_where('tbl_topup',['produk' => 'ratu merak'])->row_array();

			$this->db->select_sum('harga');
			$data['total_uang_topup'] = $this->db->get_where('tbl_topup',['produk' => 'ratu merak'])->row_array();

			$this->db->select_sum('jumlah_topup');
			$data['total_topup_m'] = $this->db->get_where('tbl_topup',['produk' => 'markisa'])->row_array();

			$this->db->select_sum('harga');
			$data['total_uang_topup_m'] = $this->db->get_where('tbl_topup',['produk' => 'markisa'])->row_array();




			$this->load->view('template_admin/header');

			$this->load->view('admin/index', $data);

			$this->load->view('template_admin/footer');

		}





		function user(){

			if (isset($_POST['kirim'])) {
				
				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['user'] = $this->db->get('tbl_register')->result_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['jml'] = $this->db->get('tbl_register')->num_rows();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_user', $data);
				$this->load->view('template_admin/footer');
			}else{

				$data['tgl'] = 'All';

				$data['jml'] = $this->db->get('tbl_register')->num_rows();

				$this->db->where('status_aktif',0);
				$data['user'] = $this->db->get('tbl_register')->result_array();
				$this->load->view('template_admin/header');
				$this->load->view('admin/data_user', $data);
				$this->load->view('template_admin/footer');
			}
			

		}



		function member_active(){

			if (isset($_POST['kirim'])) {
				
				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['member'] = $this->db->get('tbl_member')->result_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_member')->num_rows();
				
				$this->load->view('template_admin/header');
				$this->load->view('admin/data_member_active', $data);
				$this->load->view('template_admin/footer');
			}else{

				// $this->db->select_sum('jumlah_stok');
				// $data['stok_merak'] $this->db->get('tbl_stok')->row_array();

				$data['member'] = $this->db->get('tbl_member')->result_array();
				$data['total'] = $this->db->get('tbl_member')->num_rows();
				$data['tgl'] = "All";
				$this->load->view('template_admin/header');

				$this->load->view('admin/data_member_active', $data);

				$this->load->view('template_admin/footer');

			}



		}





		function act_setuju(){



			$kode_member = $this->input->post('kode_member');

			$member = $this->db->get_where('tbl_register', ['kode_member' => $kode_member])->row_array();



			$data = [

				'kode_member' => $kode_member,

				'username' =>$member['username'],

				'email' => $member['email'],

				'no_telp' => $member['no_telp'],

				'nik' => $member['nik'],

				'rule' => $member['rule'],

				'member_get' => $member['member_get'],

				'pass' => $member['pass'],

				'ktp' => $member['ktp'],

				'bank' => $member['bank'],

				'no_rek' => $member['no_rek'],

			];



			$input = $this->db->insert('tbl_member', $data);

			if ($input) {

				$this->bonus($kode_member);

				$this->totalBonus($kode_member);

				$data = [



					'kode_member' => $kode_member,

					'jumlah_stok' => 10,

					'date_create' => '',

				];



				$addStok = $this->m_data->add('tbl_stok', $data);

				$sendWa = $this->m_data->sendWaaktif($member['no_telp'], $member['username']);

				$this->db->where('kode_member', $kode_member);

				$this->db->update('tbl_register',['status_aktif' => 1]);



				$this->session->set_flashdata('message', 'swal("Yess", "Akun berhasil disetuju", "success" );');

				redirect('admin/user');



			}





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

						$this->totalBonus($member);

					}else{

						echo "gagal";

					}



				}



			}

		}


		function bonus_topup($member, $harga){



			$kode_member = $member;

			$data =  $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();

			$kode = $data['rule'];

			$arr = explode (" ",$kode);

			$jm_arr = count($arr);

			echo $jm_arr;

			$harga = $harga;

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

						$this->totalBonus($member);

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



		function totalBonus($kode_member){


			$this->db->select_sum('bonus');
			$this->db->where('kode_member', $kode_member);
			$total = $this->db->get('tbl_bonus')->row_array();
			$total = $total['bonus'];
			
			$cek = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array();
			if ($cek == true) {
				
				$this->db->where('kode_member', $kode_member);
				$this->db->update('tbl_total_bonus',['total_bonus' => $total]);
			}else{

				if ($total == null) {

					$data = [
						'kode_member' => $kode_member,
						'total_bonus' => 0,
					];

					$this->db->insert('tbl_total_bonus', $data);
					
				}else{

					$data = [
						'kode_member' => $kode_member,
						'total_bonus' => $total,
					];

					$this->db->insert('tbl_total_bonus', $data);
				}


			}
			



		}





		function order(){

			if (isset($_POST['kirim'])) {
				
				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->select_sum('qty');
				$data['total_qty'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('produk','ratumerak');
				$data['total_qty_merak'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('produk','markisa');
				$data['total_qty_markisa'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('produk','bonus ratumerak');
				$data['total_qty_Bonusmerak'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('produk','bonus markisa');
				$data['total_qty_Bonusmarkisa'] = $this->db->get('tbl_order')->row_array();

				// $this->db->order_by('id_order','desc');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['order'] = $this->db->get('tbl_order')->result_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_order', $data);
				$this->load->view('template_admin/footer');
			}else{

				$data['tgl'] = 'All';

				$this->db->select_sum('qty');
				$data['total_qty'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where('produk','ratumerak');
				$data['total_qty_merak'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where('produk','markisa');
				$data['total_qty_markisa'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where('produk','bonus ratumerak');
				$data['total_qty_Bonusmerak'] = $this->db->get('tbl_order')->row_array();

				$this->db->select_sum('qty');
				$this->db->where('produk','bonus markisa');
				$data['total_qty_Bonusmarkisa'] = $this->db->get('tbl_order')->row_array();

				$this->db->order_by('id_order','desc');
				$data['order'] = $this->db->get('tbl_order')->result_array();



				$this->load->view('template_admin/header');

				$this->load->view('admin/data_order', $data);

				$this->load->view('template_admin/footer');

			}

		}



		function act_setatus_order(){


			$kode_member = $this->input->post('kode_member');
			$nohp = $this->input->post('nohp');
			$status = $this->input->post('status');
			$produk = $this->input->post('produk');
			$id_store = $this->input->post('id_store');

			$kode_member = $this->input->post('kode_member');
			$member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();

			$store = $this->db->get_where('tbl_store',['id' => $id_store])->row_array();
			$stok = $store['stok'] - $this->input->post('qty');
			if ($stok < 0) {
				$this->session->set_flashdata('message', 'swal("Opps!", "Stok store tidak mencukupi", "warning" );');
				redirect('admin/order');			
			}else{

				

				$data = [

					'status_order' => $this->input->post('status'),

				];

				$this->db->where('id_order', $this->input->post('id'));

				$this->db->update('tbl_order', $data);

				$data_status = [
					'id_order' =>$this->input->post('id'),
					'kode_member' => $kode_member,
					'status' => $this->input->post('status'),
				];

				$this->db->insert('tbl_status_order', $data_status);

				if ($this->input->post('status') == 'Pesanan selesai') {



					if ($produk == 'ratumerak') {
						
						$this->stok_store($this->input->post('qty'), $id_store);
					}elseif($produk == 'markisa'){

						$this->stok_store($this->input->post('qty'), $id_store);

					}elseif ($produk == 'bonus markisa') {
						$this->stok_store($this->input->post('qty'), $id_store);
						
					}elseif ($produk == 'bonus ratumerak') {
						$this->stok_store($this->input->post('qty'), $id_store);
					}


					

				}

				$this->m_data->sendWaStatusOrder($nohp, $status);
				$this->m_data->sendWaStatusOrder2($member['no_telp'], $status);

				$this->session->set_flashdata('message', 'swal("Yess!", "Status order berhasil diperbaharui", "success" );');

				redirect('admin/order');

			}

	  	// $id = $this->input->post('id');

	  	// $kode_member = $this->input->post('kode_member');

	  	// $status = $this->input->post('status');

	  	// $member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();

	  	// $data = [

	  	// 	'status_order' => $this->input->post('status'),

	  	// ];

	  	// $this->db->where('id_order', $id);

	  	// $update = $this->db->update('tbl_order', $data);

	  	// if ($update == true) {



	  	// 	$this->m_data->sendWaStatusOrder($member['no_telp'], $status);

	  	// 	$this->m_data->sendWatopup($user['no_telp'], $user['username']);

	  	// 	$this->session->set_flashdata('message', 'swal("Yess", "Statue order berhasil di update", "success" );');

	 		// redirect('admin/order');

	  	// }

		}



		function pengajuan_topup(){

			if (isset($_POST['kirim'])) {
				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->order_by('id','desc');
				$this->db->where('status', 201);
				$data['topup'] = $this->db->get('tbl_checkout_topup')->result_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 201);
				$data['total_member'] = $this->db->get('tbl_checkout_topup')->num_rows();

				$this->load->view('template_admin/header');
				$this->load->view('admin/pengajuan_topup', $data);
				$this->load->view('template_admin/footer');

			}else{
				$this->db->order_by('id','desc');
				$this->db->where('status', 201);
				$data['topup'] = $this->db->get('tbl_checkout_topup')->result_array();

				$data['tgl'] = 'All';

				$this->db->where('status', 201);
				$data['total_member'] = $this->db->get('tbl_checkout_topup')->num_rows();

				$this->load->view('template_admin/header');

				$this->load->view('admin/pengajuan_topup', $data);

				$this->load->view('template_admin/footer');

			}

		}

		function topup(){

			if (isset($_POST['tgl'])) {
				$tgl = $this->input->post('tgl');
				$data['tgl'] = $tgl;
				$this->db->order_by('id','desc');
				$this->db->where('status_admin', 1);
				$this->db->like('date_create', $tgl);
				$data['topup'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->like('date_create', $tgl);
				$data['total_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'ratu merak');
				$this->db->like('date_create', $tgl);
				$data['total_topup_merak'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'markisa');
				$this->db->like('date_create', $tgl);
				$data['total_topup_markisa'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('harga');
				$this->db->like('date_create', $tgl);
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/topup', $data);
				$this->load->view('template_admin/footer');
			}else{

				$this->db->order_by('id','desc');
				$this->db->where('status_admin', 1);
				$data['topup'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$data['total_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'ratu merak');
				$data['total_topup_merak'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'markisa');
				$data['total_topup_markisa'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('harga');
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$this->load->view('template_admin/header');

				$this->load->view('admin/topup', $data);

				$this->load->view('template_admin/footer');
			}

		}

		function topup_ratumerak(){

			if (isset($_POST['tgl'])) {
				$tgl = $this->input->post('tgl');
				$data['tgl'] = $tgl;

				$this->db->order_by('id', 'desc');
				$this->db->where('produk', 'ratu merak');
				$this->db->like('date_create', $tgl);
				$data['topup'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk','ratu merak');
				$this->db->like('date_create', $tgl);
				$data['total_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'ratu merak');
				$this->db->like('date_create', $tgl);
				$data['total_topup_merak'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('harga');
				$this->db->where('produk','ratu merak');
				$this->db->like('date_create', $tgl);
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/topup_ratumerak', $data);
				$this->load->view('template_admin/footer');

			}else{
				$this->db->order_by('id', 'desc');
				$this->db->where('produk', 'ratu merak');
				$data['topup'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk','ratu merak');
				$data['total_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'ratu merak');
				$data['total_topup_merak'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('harga');
				$this->db->where('produk','ratu merak');
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/topup_ratumerak', $data);
				$this->load->view('template_admin/footer');
			}

		}

		function topup_markisa(){
			if (isset($_POST['tgl'])) {
				$tgl = $this->input->post('tgl');
				$data['tgl'] = $tgl;

				$this->db->order_by('id', 'desc');
				$this->db->where('produk', 'markisa');
				$this->db->like('date_create', $tgl);
				$data['topup'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk','markisa');
				$this->db->like('date_create', $tgl);
				$data['total_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'markisa');
				$this->db->like('date_create', $tgl);
				$data['total_topup_markisa'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('harga');
				$this->db->where('produk','markisa');
				$this->db->like('date_create', $tgl);
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/topup_markisa', $data);
				$this->load->view('template_admin/footer');

			}else{

				$this->db->order_by('id', 'desc');
				$this->db->where('produk', 'markisa');
				$data['topup'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk','markisa');
				$data['total_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->select_sum('qty');
				$this->db->where('produk', 'markisa');
				$data['total_topup_markisa'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('harga');
				$this->db->where('produk','markisa');
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/topup_markisa', $data);
				$this->load->view('template_admin/footer');
			}
		}



		function setuju_topup(){

			$kode_member = $this->input->post('kode_member');
			$slug = $this->input->post('slug');
			$id = $this->input->post('id');

			$user = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
			if ($slug == 'markisa') {
				$stok = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();
				$jumlah_stok = $stok['jumlah_stok'] + $this->input->post('qty');

				$data = [
					'jumlah_stok' => $jumlah_stok,
				];

				$this->db->where('kode_member',$kode_member);
				$update = $this->db->update('tbl_stok_markisa', $data);

				$this->db->where('id',$id);
				$update = $this->db->update('tbl_topup', ['status_admin' => 1]);

				if ($update == true) {

					$this->m_data->sendWatopup($user['no_telp'], $user['username']);
					$this->session->set_flashdata('message', 'swal("Yess", "Topup berhasil disetujui", "success" );');
					redirect('admin/pengajuan_topup');
				}

			}else{

				$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();
				$jumlah_stok = $stok['jumlah_stok'] + $this->input->post('qty');

				$data = [

					'jumlah_stok' => $jumlah_stok,

				];

				$this->db->where('kode_member',$kode_member);
				$update = $this->db->update('tbl_stok', $data);

				$this->db->where('id',$id);
				$update = $this->db->update('tbl_topup', ['status_admin' => 1]);

				if ($update == true) {
					$harga = $this->input->post('harga');
					$this->bonus_topup($kode_member, $harga);
					$this->m_data->sendWatopup($user['no_telp'], $user['username']);
					$this->session->set_flashdata('message', 'swal("Yess", "Topup berhasil disetujui", "success" );');
					redirect('admin/topup');
				}

			}
		}


		function pengajuan_withdraw(){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 0])->row_array();


				$this->load->view('template_admin/header');
				$this->load->view('admin/pengajuan_withdraw', $data);
				$this->load->view('template_admin/footer');	


				if (isset($_POST['setujui'])) {

					$id_withdraw = $this->input->post('id');
					$this->db->where('id_withdraw', $id_withdraw);
					$update = $this->db->update('tbl_witdraw',['status' => 1]);

					if ($update == true) {

						$kode_member = $this->input->post('kode_member');
						$penarikan = $this->input->post('penarikan');
						$no_hp = $this->input->post('no_hp');
						$bonus = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array();
						$total = $bonus['total_bonus'] - $penarikan; 

	  	// 		$this->db->where('kode_member', $kode_member);
	  	// 		$this->db->update('tbl_total_bonus', ['total_bonus' => $total]);
						$this->m_data->sendWawithdraw($no_hp, $penarikan);
						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');
						redirect('admin/pengajuan_withdraw');

					}
				}

			}else{

				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$data['tgl'] = 'All';

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 0])->row_array();


				$this->load->view('template_admin/header');
				$this->load->view('admin/pengajuan_withdraw', $data);
				$this->load->view('template_admin/footer');	


				if (isset($_POST['setujui'])) {

					$id_withdraw = $this->input->post('id');
					$this->db->where('id_withdraw', $id_withdraw);
					$update = $this->db->update('tbl_witdraw',['status' => 1]);

					if ($update == true) {

						$kode_member = $this->input->post('kode_member');
						$penarikan = $this->input->post('penarikan');
						$no_hp = $this->input->post('no_hp');
						$bonus = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array();
						$total = $bonus['total_bonus'] - $penarikan; 

	  	// 		$this->db->where('kode_member', $kode_member);
	  	// 		$this->db->update('tbl_total_bonus', ['total_bonus' => $total]);
						$this->m_data->sendWawithdraw($no_hp, $penarikan);
						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');
						redirect('admin/pengajuan_withdraw');

					}



				}

			}
		}

		function pengajuan_withdraw_cashback_ratumerak(){


			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where('status', 0);
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 0])->row_array();




				$this->load->view('template_admin/header');
				$this->load->view('admin/pengajuan_withdraw_cashback_ratumerak', $data);
				$this->load->view('template_admin/footer');	


				if (isset($_POST['setujui'])) {

					$id_withdraw = $this->input->post('id');
					$this->db->where('id_withdraw', $id_withdraw);
					$update = $this->db->update('tbl_witdraw_cashback_ratumerak',['status' => 1]);

					if ($update == true) {

						$kode_member = $this->input->post('kode_member');
						$penarikan = $this->input->post('penarikan');
						$no_hp = $this->input->post('no_hp');
						$bonus = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $kode_member])->row_array();
						$total = $bonus['total_bonus'] - $penarikan; 

	  	// 		$this->db->where('kode_member', $kode_member);
	  	// 		$this->db->update('tbl_total_bonus', ['total_bonus' => $total]);
						$this->m_data->sendWawithdraw($no_hp, $penarikan);
						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');
						redirect('admin/pengajuan_withdraw_cashback_ratumerak');

					}



				}
				
			}else{

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();
				$data['tgl'] = 'All';

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 0])->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/pengajuan_withdraw_cashback_ratumerak', $data);
				$this->load->view('template_admin/footer');	


				if (isset($_POST['setujui'])) {

					$id_withdraw = $this->input->post('id');
					$this->db->where('id_withdraw', $id_withdraw);
					$update = $this->db->update('tbl_witdraw_cashback_ratumerak',['status' => 1]);

					if ($update == true) {

						$kode_member = $this->input->post('kode_member');
						$penarikan = $this->input->post('penarikan');
						$no_hp = $this->input->post('no_hp');
						$bonus = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $kode_member])->row_array();
						$total = $bonus['total_bonus'] - $penarikan; 

	  	// 		$this->db->where('kode_member', $kode_member);
	  	// 		$this->db->update('tbl_total_bonus', ['total_bonus' => $total]);
						$this->m_data->sendWawithdraw($no_hp, $penarikan);
						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');
						redirect('admin/pengajuan_withdraw_cashback_ratumerak');

					}



				}
			}

		}

		function pengajuan_withdraw_cashback_markisa(){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;


				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 0])->row_array();


				$this->load->view('template_admin/header');
				$this->load->view('admin/pengajuan_withdraw_cashback_markisa', $data);
				$this->load->view('template_admin/footer');	


				if (isset($_POST['setujui'])) {

					$id_withdraw = $this->input->post('id');
					$this->db->where('id_withdraw', $id_withdraw);
					$update = $this->db->update('tbl_witdraw_cashback_markisa',['status' => 1]);

					if ($update == true) {

						$kode_member = $this->input->post('kode_member');
						$penarikan = $this->input->post('penarikan');
						$no_hp = $this->input->post('no_hp');
						$bonus = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $kode_member])->row_array();
						$total = $bonus['total_bonus'] - $penarikan; 

	  	// 		$this->db->where('kode_member', $kode_member);
	  	// 		$this->db->update('tbl_total_bonus', ['total_bonus' => $total]);
						$this->m_data->sendWawithdraw($no_hp, $penarikan);
						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');
						redirect('admin/pengajuan_withdraw_cashback_markisa');

					}



				}
			}else{

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$data['tgl']  = 'All';

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 0])->row_array();


				$this->load->view('template_admin/header');
				$this->load->view('admin/pengajuan_withdraw_cashback_markisa', $data);
				$this->load->view('template_admin/footer');	


				if (isset($_POST['setujui'])) {

					$id_withdraw = $this->input->post('id');
					$this->db->where('id_withdraw', $id_withdraw);
					$update = $this->db->update('tbl_witdraw_cashback_markisa',['status' => 1]);

					if ($update == true) {

						$kode_member = $this->input->post('kode_member');
						$penarikan = $this->input->post('penarikan');
						$no_hp = $this->input->post('no_hp');
						$bonus = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $kode_member])->row_array();
						$total = $bonus['total_bonus'] - $penarikan; 

	  	// 		$this->db->where('kode_member', $kode_member);
	  	// 		$this->db->update('tbl_total_bonus', ['total_bonus' => $total]);
						$this->m_data->sendWawithdraw($no_hp, $penarikan);
						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');
						redirect('admin/pengajuan_withdraw_cashback_markisa');

					}



				}

			}
		}






		function data_withdraw(){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;
				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 1])->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_withdraw', $data);
				$this->load->view('template_admin/footer');	

				

			}else{

				$data['tgl'] = 'All';

				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 1])->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_withdraw', $data);
				$this->load->view('template_admin/footer');	

			}

		}

		function data_withdraw_cashback_ratumerak(){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');
				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where('status', 1);
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 1])->row_array();

				// $data['tgl'] = 

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_withdraw_cashback_ratumerak', $data);
				$this->load->view('template_admin/footer');	


			}else{

				$data['tgl'] = 'All';

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 1])->row_array();


				$this->load->view('template_admin/header');
				$this->load->view('admin/data_withdraw_cashback_ratumerak', $data);
				$this->load->view('template_admin/footer');	
			}

		}

		function data_withdraw_cashback_markisa(){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');
				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where('status', 1);
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 1])->row_array();



				$this->load->view('template_admin/header');
				$this->load->view('admin/data_withdraw_cashback_markisa', $data);
				$this->load->view('template_admin/footer');	


			}else{

				$data['tgl'] = 'All';

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 1])->row_array();



				$this->load->view('template_admin/header');
				$this->load->view('admin/data_withdraw_cashback_markisa', $data);
				$this->load->view('template_admin/footer');	

			}

		}



		function produk_markisa(){

			$data['markisa'] = $this->db->get_where('tbl_produk_markisa',['status_order' => 1])->result_array();

			$this->load->view('template_admin/header');

			$this->load->view('admin/produk_markisa', $data);

			$this->load->view('template_admin/footer');



			if (isset($_POST['setujui'])) {


				$kode_produk = $this->input->post('kode_produk');
				$this->db->where('kode_produk', $kode_produk);
				$update = $this->db->update('tbl_produk_markisa',['status_produk'=> 1]);

				if ($update == true) {

					$kode_member = $this->input->post('kode_member');

					$member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();

					$cek = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();



					if ($cek == true) {



						$jumlah = $cek['jumlah_stok'] + 10;

						$this->db->where('kode_member', $kode_member);

						$this->db->update('tbl_stok_markisa',['jumlah_stok' => $jumlah]);

						$this->m_data->sendWaMarkisa($member['no_telp']);

						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');

						redirect('admin/produk_markisa');

					}else{



						$data = [

							'kode_member' => $this->input->post('kode_member'),

							'jumlah_stok' => 10,

						];



						$this->db->insert('tbl_stok_markisa', $data);

						$this->m_data->sendWaMarkisa($member['no_telp']);

						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil disetujui", "success" );');

						redirect('admin/produk_markisa');



					}

				}

			}	

		}


		function produk(){

			$data['produk'] = $this->db->get('tbl_produk')->result_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/produk', $data);
			$this->load->view('template_admin/footer');

			if (isset($_POST['edit'])) {

				$data = [
					'nama_produk' => $this->input->post('nama_produk'),
					'harga' => $this->input->post("harga"),
				];

				$id = $this->input->post('id');

				$this->db->where('id', $id);
				$this->db->update('tbl_produk', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diedit", "success" );');
				redirect('admin/produk');


			}

		}

		function kurir(){



			$data['lokasi'] = $this->db->get('tbl_store')->result_array();

			$this->db->select('*');
			$this->db->from('tbl_store');
			$this->db->join('tbl_kurir', 'tbl_kurir.id_store = tbl_store.id');
			$data['kurir'] = $this->db->get()->result_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/kurir', $data);
			$this->load->view('template_admin/footer');

			if (isset($_POST['add'])) {

				$config['upload_path']          = './assets/kurir';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['remove_spaces']		= false;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('ktp')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Oops!", "KTP yang anda upload gagal", "warning" );');
					redirect('admin/kurir');
				}else{

					$kode = rand(1, 100000);
					$kode_kurir = "kurir-".$kode;

					$data = [
						'kode_kurir' => $kode_kurir,
						'username' => $this->input->post('username'),
						'nama_kurir' => $this->input->post('nama'),
						'jk' => $this->input->post('jk'),
						'email' => $this->input->post('email'),
						'no_telp' => $this->input->post('no_telp'),
						'id_store' => $this->input->post('lokasi'),
						'nik' => $this->input->post('nik'),
						'gambar_ktp' => $_FILES['ktp']['name'],
						'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
					];
					$cek = $this->db->get_where('tbl_kurir',['id_store' => $this->input->post('lokasi')])->row_array();
					if ($cek == true) {
						$this->session->set_flashdata('message', 'swal("Opps", "Kurir store sudah tersedia", "error" );');
						redirect('admin/kurir');
					}else{

						$input = $this->db->insert('tbl_kurir', $data);
					}

					if ($input == true) {
						$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success" );');
						redirect('admin/kurir');
					}

				}

			}


		}


		function edit_kurir(){


			$config['upload_path']          = './assets/kurir';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['remove_spaces']		= false;

			$ktp = $_FILES['ktp']['name'];

			if ($ktp == null) {

				$data = [

					'username' => $this->input->post('username'),
					'nama_kurir' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'email' => $this->input->post('email'),
					'no_telp' => $this->input->post('no_telp'),
					'nik' => $this->input->post('nik'),
					'id_store' => $this->input->post('lokasi'),
				];


				$id = $this->input->post('id');
				$this->db->where('id', $id);
				$this->db->update('tbl_kurir', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil edit", "success" );');
				redirect('admin/kurir');
			}else{

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('ktp')){
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('message', 'swal("Oops!", "KTP yang anda upload gagal", "warning" );');
					redirect('admin/kurir');
				}else{

					$data = [

						'username' => $this->input->post('username'),
						'nama_kurir' => $this->input->post('nama'),
						'jk' => $this->input->post('jk'),
						'email' => $this->input->post('email'),
						'no_telp' => $this->input->post('no_telp'),
						'nik' => $this->input->post('nik'),
						'id_store' => $this->input->post('lokasi'),
						'gambar_ktp' => $_FILES['ktp']['name'],

					];

					$id = $this->input->post('id');
					$this->db->where('id', $id);
					$this->db->update('tbl_kurir', $data);
					$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil edit", "success" );');
					redirect('admin/kurir');


				}


			}


		}

		function hapus_kurir(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_kurir');
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success" );');
			redirect('admin/kurir');


		}

		function store(){

			$data['prov'] = $this->db->get_where('tbl_provinsi',['id' => 12])->row_array();
			$data['kab'] = $this->db->get_where('tbl_kabupaten',['province_id' => 12])->result_array();
			$data['kec'] = $this->db->get_where('tbl_kecamatan',['regency_id' => 1275])->result_array();
			$data['store'] = $this->db->get('tbl_store')->result_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/data_store', $data);
			$this->load->view('template_admin/footer');

			if (isset($_POST['kirim'])) {

				$data = [
					'nama' => $this->input->post('nama'),
					'prov' => $this->input->post('prov'),
					'kab' => $this->input->post('kab'),
					'kec' => $this->input->post('kec'),
					'stok' => $this->input->post('stok'),
					'lang' => $this->input->post('lang'),
				];

				$this->db->insert('tbl_store', $data);
				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil ditambah", "success" );');
				redirect('admin/store');

			}
		}

		function kab(){
			$id = $this->input->get('id');
			$store = $this->db->get_where('tbl_store', ['id' => $id])->row_array();
			$kab = $this->db->get_where('tbl_kabupaten',['id' => $store['kab']])->row_array();

			?>
			<option value="<?= $store['kab'] ?>"><?= $kab['name'] ?></option>
			<?php 
		}

		function kec(){
			$id = $this->input->get('id');
			$data['kec'] = $this->db->get_where('tbl_kecamatan', ['regency_id' => $id])->result_array();
			$this->load->view('user/kec', $data);

		}

		function list_kec(){
			$id = $this->input->get('id');
			$store = $this->db->get_where('tbl_store', ['id' => $id])->row_array();
			$kab = $this->db->get_where('tbl_kabupaten',['id' => $store['kab']])->row_array();
			$kec = $this->db->get_where('tbl_kecamatan',['regency_id' => $kab['id']])->result_array();

			foreach ($kec as $data) {

				$this->db->where('id_store', $id);
				$this->db->where('kec', $data['id']);
				$chaked = $this->db->get('tbl_wilayah_store')->row_array();

				?>
				<div class="form-check form-check-inline">
					<input class="form-check-input" type="checkbox" <?= ($chaked == true ?'checked':'') ?> name="kec[]" id="inlineCheckbox1" value="<?= $data['id'] ?>">
					<label class="form-check-label" for="inlineCheckbox1"><?= $data['name'] ?></label>
				</div><br>

				<?php  

			}

		}

		function kel(){
			$id = $this->input->get('id');
			$data['kel'] = $this->db->get_where('tbl_kelurahan', ['district_id' => $id])->result_array();
			$this->load->view('user/kel', $data);

		}


		function act_wilayah(){

			if (isset($_POST['kirim'])) {

				$store = $this->input->post('store');
				$cek = $this->db->get_where('tbl_wilayah_store', ['id_store' => $store])->row_array();
				if ($cek == true) {

					$this->session->set_flashdata('message', 'swal("Oops", "Data sudah terdaftar", "error" );');
					redirect('admin/wilayah_kerja');
				}else{
					$kec = $this->input->post('kec');
					foreach ($kec as $kec2) {

						$data = [
							'id_store' => $this->input->post('store'),
							'kec' => $kec2,
						];

						$this->db->insert('tbl_wilayah_store', $data);
					}

					$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di input", "success" );');
					redirect('admin/wilayah_kerja');

				}

			}else{

				$store = $this->input->post('store');

				$this->db->where('id_store', $store);
				$this->db->delete('tbl_wilayah_store');

				$kec = $this->input->post('kec');
				foreach ($kec as $kec2) {

					$data = [
						'id_store' => $this->input->post('store'),
						'kec' => $kec2,
					];

					$this->db->insert('tbl_wilayah_store', $data);
				}

				$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil di update", "success" );');
				redirect('admin/wilayah_kerja');
			}

		}


		function hapus_store(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->delete('tbl_store');
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil dihapus", "success" );');
			redirect('admin/store');
		}

		function update_stok_store(){

			$id = $this->input->post('id');
			$this->db->where('id', $id);
			$this->db->update('tbl_store',['stok' => $this->input->post('stok')]);
			$this->session->set_flashdata('message', 'swal("Yess", "Data berhasil diupdate", "success" );');
			redirect('admin/store');

		}


		function maps(){
			$data['titik'] = $this->db->get('tbl_store')->result_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/maps', $data);
			$this->load->view('template_admin/footer');

		}


		function wilayah_kerja(){

			$data['store'] = $this->db->get('tbl_store')->result_array();
			$data['prov'] = $this->db->get_where('tbl_provinsi',['id' => 12])->row_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/wilayah_kerja', $data);
			$this->load->view('template_admin/footer');

		}



		function admin(){

			$data['admin'] = $this->db->get('tbl_admin')->result_array();

			$this->load->view('template_admin/header');

			$this->load->view('admin/data_admin', $data);

			$this->load->view('template_admin/footer');



			if (isset($_POST['add'])) {



				$data = [

					'username' => $this->input->post('username'),

					'pass' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),

					'role' => 'admin',

				];



				$this->db->insert('tbl_admin', $data);

				$this->session->set_flashdata('message', 'swal("Yess", "Admin berhasil ditambah", "success" );');

				redirect('admin/admin');

			}

		}






		function hapus_admin(){



			$id = $this->input->post('id');

			$this->db->where('id', $id);

			$this->db->delete('tbl_admin');



			$this->session->set_flashdata('message', 'swal("Yess", "Admin berhasil dihapus", "success" );');

			redirect('admin/admin');

		}

		function cancel_order(){

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


			$this->session->set_flashdata('message', 'swal("Yess!", "Order berhasil dicancel", "success" );');
			redirect('admin/order');

		}




		function join(){

			$this->db->select('*');
			$this->db->from('tbl_store');
			$this->db->join('tbl_kurir', 'tbl_kurir.id_store = tbl_store.id');
			$query = $this->db->get()->result_array();

			var_dump($query);
		}

		function stok_store($qty, $id_store){

			$id = $id_store;

			$store = $this->db->get_where('tbl_store',['id' => $id])->row_array();

			$stok = $store['stok'] - $qty;



			$data = [



				'stok' => $stok,

			];

			$this->db->where('id', $id);

			$this->db->update('tbl_store', $data);

		}	


		function bonus_afiliasi(){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->order_by('id','desc');
				$data['afiliasi'] = $this->db->get('tbl_bonus')->result_array();

				$this->db->select_sum('bonus');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_bonus'] = $this->db->get('tbl_bonus')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_afiliasi', $data);
				$this->load->view('template_admin/footer');

			}else{

				$data['tgl'] = 'All';

				$this->db->order_by('id','desc');
				$data['afiliasi'] = $this->db->get('tbl_total_bonus')->result_array();

				$this->db->select_sum('total_bonus');
				$data['total_bonus'] = $this->db->get('tbl_total_bonus')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_afiliasi', $data);
				$this->load->view('template_admin/footer');

			}
		}

		function bonus_cashback_ratumerak(){
			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->result_array();

				$this->db->select_sum('bonus_cashback');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_cashback_ratumerak', $data);
				$this->load->view('template_admin/footer');

			}else{
				$data['tgl'] = 'All';
				$data['bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->result_array();
				$this->db->select_sum('bonus_cashback');
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_cashback_ratumerak', $data);
				$this->load->view('template_admin/footer');
			}

		}

		function bonus_cashback_markisa(){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;


				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->result_array();

				$this->db->select_sum('bonus_cashback');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_cashback_markisa', $data);
				$this->load->view('template_admin/footer');

			}else{

				$data['tgl'] = 'All';

				$data['bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->result_array();

				$this->db->select_sum('bonus_cashback');
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_cashback_markisa', $data);
				$this->load->view('template_admin/footer');
			}

		}

		function detail_member($id){

			$data['topup'] = $this->db->get_where('tbl_topup',['kode_member' => $id])->result_array();

			$this->db->select_sum('jumlah_topup');
			$this->db->select_sum('qty');
			$this->db->select_sum('harga');
			$data['total'] = $this->db->get_where('tbl_topup',['kode_member' => $id])->row_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_member', $data);
			$this->load->view('template_admin/footer');
		}

		function detail_order($id){
			$this->db->order_by('id_order','desc');
			$data['order'] = $this->db->get_where('tbl_order',['kode_member' => $id])->result_array();

			$this->db->select_sum('qty');
			$this->db->where('produk', 'ratumerak');
			$data['total_merak'] = $this->db->get_where('tbl_order',['kode_member' => $id])->row_array();

			$this->db->select_sum('qty');
			$this->db->where('produk', 'markisa');
			$data['total_markisa'] = $this->db->get_where('tbl_order',['kode_member' => $id])->row_array();

			$this->db->select_sum('qty');
			$this->db->where('produk', 'bonus  markisa');
			$data['total_bmarkisa'] = $this->db->get_where('tbl_order',['kode_member' => $id])->row_array();

			$this->db->select_sum('qty');
			$this->db->where('produk', 'bonus ratumerak');
			$data['total_bratumerak'] = $this->db->get_where('tbl_order',['kode_member' => $id])->row_array();

			$this->db->select_sum('qty');
			$data['total'] = $this->db->get_where('tbl_order',['kode_member' => $id])->row_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_order', $data);
			$this->load->view('template_admin/footer');
		}


		function detail_bonus($id){
			$data['member'] = $this->db->get_where('tbl_register',['kode_member' => $id])->row_array();
			$this->db->order_by('id','desc');
			$data['bonus'] = $this->db->get_where('tbl_bonus',['kode_member' => $id])->result_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_bonus', $data);
			$this->load->view('template_admin/footer');
		}	

		function detail_bonus_cashback_ratumeak($id){
			$data['member'] = $this->db->get_where('tbl_register',['kode_member' => $id])->row_array();
			$data['c_ratumerak'] = $this->db->get_where('tbl_bonus_cashback_ratumerak',['kode_member' => $id])->result_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_bonus_cashback_ratumeak', $data);
			$this->load->view('template_admin/footer');
		}

		function detail_bonus_cashback_markisa($id){

			$data['c_markisa'] = $this->db->get_where('tbl_bonus_cashback_markisa',['kode_member' => $id])->result_array();
			$data['member'] = $this->db->get_where('tbl_register',['kode_member' => $id])->row_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_bonus_cashback_markisa', $data);
			$this->load->view('template_admin/footer');
		}


		function detail_withdraw($id){

			$this->db->order_by('id_withdraw','desc');
			$data['wt'] = $this->db->get_where('tbl_witdraw',['kode_member' => $id])->result_array();
			$data['member'] = $this->db->get_where('tbl_register',['kode_member' => $id])->row_array();

			$this->db->select_sum('penarikan');
			$this->db->where_not_in('status', 0);
			$this->db->where('kode_member', $id);
			$data['total'] = $this->db->get('tbl_witdraw')->row_array();


			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_withdraw', $data);
			$this->load->view('template_admin/footer');
		}

		function detail_withdraw_cashback_ratumerak($id){

			$this->db->order_by('id_withdraw','desc');
			$data['wt'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['kode_member' => $id])->result_array();

			$data['member'] = $this->db->get_where('tbl_register',['kode_member' => $id])->row_array();

			$this->db->select_sum('penarikan');
			$this->db->where_not_in('status', 0);
			$this->db->where('kode_member', $id);
			$data['total'] = $this->db->get('tbl_witdraw_cashback_ratumerak')->row_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_withdraw_cashback_ratumerak', $data);
			$this->load->view('template_admin/footer');
		}

		function detail_withdraw_cashback_markisa($id){

			$this->db->order_by('id_withdraw','desc');
			$data['wt'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['kode_member' => $id])->result_array();
			$data['member'] = $this->db->get_where('tbl_register',['kode_member' => $id])->row_array();

			$this->db->select_sum('penarikan');
			$this->db->where_not_in('status', 0);
			$this->db->where('kode_member', $id);
			$data['total'] = $this->db->get('tbl_witdraw_cashback_markisa')->row_array();

			$this->load->view('template_admin/header');
			$this->load->view('admin/detail_withdraw_cashback_markisa', $data);
			$this->load->view('template_admin/footer');
		}


		function po(){

			// $this->db->order_by('id', 'desc');
			// $this->db->order_by('kode_member', 'desc');
			// $data['po'] = $this->db->get('tbl_topup')->result_array();
			$data['po'] = $this->db->get('tbl_member')->result_array();
			$this->load->view('template_admin/header');
			$this->load->view('admin/data_po2', $data);
			$this->load->view('template_admin/footer');

		}


		function po22(){

			if (isset($_POST['kirim'])) {

				if ($this->input->post('tgl_akhir') != '' && $this->input->post('tgl_awal') != '' && $this->input->post('produk') != '') {

					$produk = $this->input->post('produk');

					if ($produk == 'all') {

						$tgl_awal = $this->input->post('tgl_awal');
						$tgl_akhir = $this->input->post('tgl_akhir');
						$produk = $this->input->post('produk');

						$data['tgl_awal'] = $tgl_awal;
						$data['tgl_akhir'] = $tgl_akhir;

						$data['tgl_awal_all'] = $tgl_awal;
						$data['tgl_akhir_all'] = $tgl_akhir;
						$data['produk_all'] = $produk;
						$data['produk'] = '';


						$data['tgl'] = $tgl_awal ." Sampai Dengan ". $tgl_akhir. ' Produk '. $produk; 

						$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						$this->db->order_by('kode_member', 'desc');
						$data['po'] = $this->db->get('tbl_topup')->result_array();

						$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						$this->db->select_sum('jumlah_topup');
						$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

						$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						$this->db->select_sum('jumlah_topup');
						$data['total_qty'] = $this->db->get('tbl_topup')->row_array();


						$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						$this->db->select_sum('harga');
						$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

						$this->load->view('template_admin/header');
						$this->load->view('admin/data_po3', $data);
						$this->load->view('template_admin/footer');
					}else{


						$tgl_awal = $this->input->post('tgl_awal');
						$tgl_akhir = $this->input->post('tgl_akhir');
						$produk = $this->input->post('produk');

						$data['tgl_awal1'] = $tgl_awal;
						$data['tgl_akhir1'] = $tgl_akhir;

						$data['tgl_awal_all'] = $tgl_awal;
						$data['tgl_akhir_all'] = $tgl_akhir;
						$data['produk_all'] = $produk;
						$data['produk'] = $produk;


						$data['tgl'] = $tgl_awal ." Sampai Dengan ". $tgl_akhir. ' Produk '. $produk; 

						$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						$this->db->where('produk', $produk);
						$this->db->order_by('kode_member', 'desc');
						$data['po'] = $this->db->get('tbl_topup')->result_array();

						$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						$this->db->select_sum('jumlah_topup');
						$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

						$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
						$this->db->select_sum('harga');
						$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

						$this->load->view('template_admin/header');
						$this->load->view('admin/data_po3', $data);
						$this->load->view('template_admin/footer');
					}

					

					
				}elseif ($this->input->post('tgl_awal') != null && $this->input->post('tgl_akhir') != null) {
					$tgl_awal = $this->input->post('tgl_awal');
					$tgl_akhir = $this->input->post('tgl_akhir');

					$data['tgl_awal'] = $tgl_awal;
					$data['tgl_akhir'] = $tgl_akhir;

					$data['tgl'] = $tgl_awal ." Sampai Dengan ". $tgl_akhir; 

					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->order_by('kode_member', 'desc');
					$data['po'] = $this->db->get('tbl_topup')->result_array();

					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->select_sum('jumlah_topup');
					$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->select_sum('harga');
					$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

					$this->load->view('template_admin/header');
					$this->load->view('admin/data_po3', $data);
					$this->load->view('template_admin/footer');

				}elseif ($this->input->post('produk') != null) {
					$produk = $this->input->post('produk');

					if ($produk == 'ratu merak' || $produk == 'markisa') {
						$this->db->order_by('kode_member', 'desc');
						$this->db->where('produk',$produk);
						$data['po'] = $this->db->get('tbl_topup')->result_array();

						$this->db->select_sum('jumlah_topup');
						$this->db->where('produk',$produk);
						$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

						$this->db->select_sum('harga');
						$this->db->where('produk',$produk);
						$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

						$data['tgl'] = "berdaserkan produk ". $produk;
						$data['filter_produk'] = $produk;
						$data['produk'] = $produk;

						$this->load->view('template_admin/header');
						$this->load->view('admin/data_po3', $data);
						$this->load->view('template_admin/footer');
					}elseif($produk == 'all'){

						$this->db->order_by('kode_member', 'desc');
						$data['po'] = $this->db->get('tbl_topup')->result_array();

						$this->db->select_sum('jumlah_topup');
						$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

						$this->db->select_sum('harga');
						$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();
			// $data['po'] = $this->db->get('tbl_register')->result_array();
						$data['tgl'] = "All";
						$this->load->view('template_admin/header');
						$this->load->view('admin/data_po3', $data);
						$this->load->view('template_admin/footer');
					}
				}
			}else{

				$this->db->order_by('kode_member', 'desc');
				$data['po'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('harga');
				$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();
			// $data['po'] = $this->db->get('tbl_register')->result_array();
				$data['tgl'] = "All";
				$this->load->view('template_admin/header');
				$this->load->view('admin/data_po3', $data);
				$this->load->view('template_admin/footer');
			}
		}


		function detail_jaringan_member($kode_member){

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl'] = $tgl_awal." s/d ". $tgl_akhir;

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;


				$this->db->where('member_get', $kode_member);
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['member'] = $this->db->get('tbl_register')->result_array();


				$this->db->where('member_get', $kode_member);
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_register')->num_rows();

				$member = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
				$data['nama'] = $member['username'];

				$data['kode_member'] = $kode_member;

				$data['data'] = 'Data Jaringan Member '. ucwords($member['username']). ' Pertanggal '. $tgl_awal. ' s/d '. $tgl_akhir;

				$this->load->view('template_admin/header');
				$this->load->view('admin/jaringan_member', $data);
				$this->load->view('template_admin/footer');
			}else{
				$this->db->order_by('id','desc');
				$data['member'] = $this->db->get_where('tbl_register',['member_get' => $kode_member])->result_array();

				$member = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
				$data['nama'] = $member['username'];

				$data['kode_member'] = $kode_member;

				$data['data'] = 'Data Jaringan Member '. ucwords($member['username']);

				$this->load->view('template_admin/header');
				$this->load->view('admin/jaringan_member', $data);
				$this->load->view('template_admin/footer');

			}

		}


		function group(){

			$this->db->select('*');
			$this->db->from('tbl_register');
			$this->db->join('tbl_topup', 'tbl_topup.id_member = tbl_register.kode_member');
			$det = $this->db->get()->result_array();

			foreach ($det as $data) {
				echo $data['kode_member']."<br>";
			}

		}


		function data_bonus_stok(){
			// $data['bonus_stok'] = $this->db->get('tbl_topup')->result_array();
			// $this->db->select_sum('jumlah_topup');

			if (isset($_POST['kirim'])) {

				$tgl_awal = $this->input->post('tgl_awal');
				$tgl_akhir = $this->input->post('tgl_akhir');

				$data['tgl'] = $tgl_awal ." Sampai Dengan ". $tgl_akhir; 

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				// $this->db->where("date_create BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('jumlah_topup >=',10);
				$data['bonus_stok'] =  $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				// $this->db->like('date', $tgl_awal);
				// $this->db->like('date', $tgl_akhir);
				$this->db->where('jumlah_topup >=',10);
				$data['total'] =  $this->db->get('tbl_topup')->row_array();

				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_stok', $data);
				$this->load->view('template_admin/footer');

			}else{
				$data['tgl'] = "All";

				$this->db->where('jumlah_topup >=',10);
				$data['bonus_stok'] =  $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->where('jumlah_topup >=',10);
				$data['total'] =  $this->db->get('tbl_topup')->row_array();
				$this->load->view('template_admin/header');
				$this->load->view('admin/data_bonus_stok', $data);
				$this->load->view('template_admin/footer');
			}
		}

		function test(){

			$this->db->distinct('kode_member');
			$data = $this->db->get('tbl_topup')->num_rows();
			echo $data;

			// $this->db->where('kode_member !=', 'member-69887');
			// $tr = $this->db->get('tbl_register')->result_array();
			// foreach ($tr as $list) {
			// 	echo $list['kode_member']."<br>";
			// }

		}


		function loop(){

			$data = $this->db->get('tbl_topup')->result_array();

			$a = 0;
			foreach ($data as $dat) {

				echo $dat['jumlah_topup']."<br>";
				$a += $dat['jumlah_topup'];
			}
			echo "<hr>";
			echo $a;


		}


		function ubah(){

			$kode_member = 'member-51334';
			$pass = 'abc123';

			$data = [
				'pass' => password_hash($pass, PASSWORD_DEFAULT),
			];

			$this->db->where('kode_member', $kode_member);
			$this->db->update('tbl_register', $data);
		}


		// function coba(){

		// 	$kode = 'member-79032';
		// 	$tgl_awal = '2022-04-18';
		// 	$tgl_akhir = '2022-04-20';


		// 	$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
		// 	$row = $this->db->get_where('tbl_topup',['kode_member' => $kode ])->result_array();
		// 	foreach ($row as $key => $data) {
		// 		echo $data['kode_member'];
		// 	}
		// }


		// function detail_withdraw_cashback_markisa($id){

		// 	$this->db->order_by('id_withdraw','desc');
		// 	$data['wt'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['kode_member' => $id])->result_array();
		// 	$data['member'] = $this->db->get_where('tbl_register',['kode_member' => $id])->row_array();

		// 	$this->load->view('template_admin/header');
		// 	$this->load->view('admin/detail_withdraw_cashback_ratumerak', $data);
		// 	$this->load->view('template_admin/footer');
		// }


		function testing(){

			$tgl1 = '2022-04-20';
			$tgl2 = '2022-05-20';

			// $this->db->select_sum('qty');
			// $total = $this->db->get_where('tbl_topup',['kode_member' => 'member-69887'])->row_array();

			// echo $total['qty'];

			$this->db->where('produk','ratu merak');
			$this->db->where('kode_member', 'member-56973');
			$this->db->where("date BETWEEN '$tgl1' AND '$tgl2'");
			$this->db->select_sum('qty');
			$test = $this->db->get('tbl_topup')->row_array();

			echo $test['qty'];



			

		}





	}



	?>
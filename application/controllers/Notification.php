<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-98b6e7S5aIxU6rIhLlQkpYfC', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		$this->load->model('m_data');
		
	}

	public function index()
	{
		echo 'test notification handlq1er';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, true);

		// if($result){
		// $notif = $this->veritrans->status($result->order_id);
		// }

		$order_id = $result['order_id'];
		$status_code = $result['status_code'];

		// $pay = $this->db->get_where('tbl_checkout',['order_id' => $order_id])->row_array();
		// $markisa = $this->db->get_where('tbl_checkout_markisa',['order_id' => $order_id])->row_array();

		
		$topup = $this->db->get_where('tbl_checkout_topup',['order_id' => $order_id])->row_array();


		// chekout register
		if($topup == true){

			$data = $this->db->get_where('tbl_checkout_topup',['order_id' => $order_id])->row_array();
			$kode_member = $data['kode_member'];
			$dataMember = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();

			$cek_member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
			if ($cek_member == false) {
				date_default_timezone_set("Asia/Bangkok");
				$dataMember = [
					'kode_member' => $kode_member,
					'username' => $dataMember['username'],
					'email' => $dataMember['email'],
					'no_telp' => $dataMember['no_telp'],
					'nik' => $dataMember['nik'],
					'rule' =>$dataMember['rule'],
					'member_get' => $dataMember['member_get'],
					'pass' => $dataMember['pass'],
					'date' => date('Y-m-d'),
				];

				$input = $this->db->insert('tbl_member', $dataMember);
			}

			$this->db->where('order_id', $order_id);
			$this->db->update('tbl_checkout_topup',['status' => 200]);

			$slug = str_replace(' ', '-', $data['produk']);

			date_default_timezone_set("Asia/Bangkok");


			$topup = [
				'produk' => $data['produk'],
				'order_id' => $data['order_id'],
				'slug' => $slug,
				'kode_member' => $data['kode_member'],
				'jumlah_topup' => $data['jumlah_topup'],
				'harga' => $data['harga'],
				'qty' => $data['qty'],
				'status' => 1,
				'status_admin' => 1,
				'date' => date('Y-m-d'),
			];

			$cek_topup = $this->db->get_where('tbl_topup',['order_id' => $data['order_id']])->row_array();
			if ($cek_topup == true) {
				
			}else{

				$input = $this->db->insert('tbl_topup', $topup);
				if ($input) {

					if ($data['produk'] == 'ratu merak') {
						
					// $this->bonus_topup($data['kode_member'], $data['harga']);
						$this->bonus_topup($data['kode_member'], $data['jumlah_topup'], $data['order_id']);
					}elseif ($data['produk'] == 'markisa') {
					// $this->bonus_topup($data['kode_member'], $data['harga']);
						$this->bonus_topup($data['kode_member'], $data['jumlah_topup'], $data['order_id']);
					}
					$this->totalTopup($data['kode_member'], $slug, $data['qty']);
				}

			}

			$jml = $data['jumlah_topup'];
			
			if ($jml == 50) {
				$bonus = 20;
			}elseif($jml >= 40){
				$bonus = 16;
			}elseif ($jml >= 30) {
				$bonus = 12;
			}elseif ($jml >= 20) {
				$bonus = 8;
			}elseif ($jml >= 10) {
				$bonus = 4;
			}else{
				$bonus = 0;
			}

			$cek_input_bonus_topup = $this->db->get_where('tbl_bonus_topup',['order_id' => $order_id])->row_array();

			if ($cek_input_bonus_topup == true) {

			}else{

				$data2 = [
					'order_id' => $order_id,
					'kode_member' => $data['kode_member'],
					'jumlah_topup' => $jml,
					'bonus' => $bonus,
					'produk' => $data['produk'],
				];

				$inputBonus = $this->db->insert('tbl_bonus_topup', $data2);
				if ($inputBonus == true) {
					$this->bonusTopup2($order_id);
				}
			}

		}

		

	}


	function bonus_topup($member, $jumlah_paket, $id_order){

		$kode_member = $member;
		$data =  $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
		$kode = $data['rule'];
		$arr = explode (" ",$kode);
		$jm_arr = count($arr);
		echo $jm_arr;
		$harga = $harga;

		for ($i=0; $i < $jm_arr ; $i++) { 
			if ($this->cek_stok($arr[$i]) < 0) {
				continue;

			}else{

				if ($i == 0) {
					// $persen = 8 / 100;
					// $bonus = $persen * $harga;
					$bonus = 50000 * $jumlah_paket;
					$member =  $arr[$i];
				}elseif ($i == 1) {

					break;
				}

				$data = [
					'id_order' => $id_order,
					'kode_member' => $member,
					'dari' => $kode_member,
					'bonus' => $bonus,
					'date2' => date('Y-m-d'),
				];
				$input = $this->db->insert('tbl_bonus', $data);
				if ($input) {
					$this->totalBonus($member, $bonus);
				}else{
					echo "gagal";
				}

			}

		}

	}

	function totalTopup($kode_member, $slug, $qty){
		// diperbaharui
		$user = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();

		if ($slug == 'markisa') {
			$stok = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();

			if ($stok == true) {

				$jumlah_stok = $stok['jumlah_stok'] + $qty;
				$data = [
					'jumlah_stok' => $jumlah_stok,
				];

				$this->db->where('kode_member',$kode_member);
				$update = $this->db->update('tbl_stok_markisa', $data);

				if ($update == true) {

					$this->m_data->sendWatopup($user['no_telp'], $user['username']);

				}

			}else{
				$jumlah_stok = $qty;
				$data = [
					'kode_member' => $kode_member,
					'jumlah_stok' => $jumlah_stok,
				];

				$update = $this->db->insert('tbl_stok_markisa', $data);

				if ($update == true) {

					$this->m_data->sendWatopup($user['no_telp'], $user['username']);

				}
			}
			

		}else{

			$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();
	  	// diperbaharui
			if ($stok == true) {
				$jumlah_stok = $stok['jumlah_stok'] + $qty;

				$data = [
					'jumlah_stok' => $jumlah_stok,
				];

				$this->db->where('kode_member',$kode_member);
				$update = $this->db->update('tbl_stok', $data);

				if ($update == true) {
					$this->m_data->sendWatopup($user['no_telp'], $user['username']);

				}
			}else{

				$jumlah_stok = $qty;

				$data = [
					'kode_member' => $kode_member,
					'jumlah_stok' => $jumlah_stok,
				];

				$update = $this->db->insert('tbl_stok', $data);

				if ($update == true) {
					$this->m_data->sendWatopup($user['no_telp'], $user['username']);

				}
			} 


			

		}
	}

	function bonusTopup2($order_id){
		$order_id = $order_id;
		$cek_bonus = $this->db->get_where('tbl_bonus_topup',['order_id' => $order_id])->row_array();

		if ($cek_bonus['produk'] == 'ratu merak') {

			$kode_member = $cek_bonus['kode_member'];
			$cek_bonus_ratumerak = $this->db->get_where('tbl_bonus_topup_ratumerak',['kode_member' => $kode_member])->row_array();
			if ($cek_bonus_ratumerak == false) {

				$data = [
					'kode_member' => $kode_member,
					'produk' => 'ratumrak',
					'total_stok_bonus' => $cek_bonus['bonus'],
				];

				$this->db->insert('tbl_bonus_topup_ratumerak', $data);
			}else{
				$jml_bonus = $cek_bonus_ratumerak['total_stok_bonus'] + $cek_bonus['bonus'];
				$this->db->where('kode_member', $kode_member);
				$this->db->update('tbl_bonus_topup_ratumerak',['total_stok_bonus' => $jml_bonus]);
			}

			if ($cek_bonus['bonus'] != 0) {
				$member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
				// $this->m_data->sendBonusTopup($member['no_telp'],$cek_bonus['jumlah_topup'], $cek_bonus['produk'], $cek_bonus['bonus']);
			}

		}else{

			$kode_member = $cek_bonus['kode_member'];
			$cek_bonus_markisa = $this->db->get_where('tbl_bonus_topup_markisa',['kode_member' => $kode_member])->row_array();

			if ($cek_bonus_markisa == false) {

				$data = [
					'kode_member' => $kode_member,
					'produk' => 'markisa',
					'total_stok_bonus' => $cek_bonus['bonus'],
				];

				$this->db->insert('tbl_bonus_topup_markisa', $data);
			}else{
				$jml_bonus = $cek_bonus_markisa['total_stok_bonus'] + $cek_bonus['bonus'];
				$this->db->where('kode_member', $kode_member);
				$this->db->update('tbl_bonus_topup_markisa',['total_stok_bonus' => $jml_bonus]);
			}

			if ($cek_bonus['bonus'] != 0) {
				$member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
				// $this->m_data->sendBonusTopup($member['no_telp'],$cek_bonus['jumlah_topup'], $cek_bonus['produk'], $cek_bonus['bonus']);
			}

		}
	}






	// batas



	function add_member($kode_member, $harga){

		$data = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();

		$dataMember = [
			'kode_member' => $kode_member,
			'username' =>$data['username'],
			'email' => $data['email'],
			'no_telp' => $data['no_telp'],
			'nik' => $data['nik'],
			'rule' =>$data['rule'],
			'jumlah_paket' => $data['jumlah_paket'],
			'member_get' => $data['member_get'],
			'pass' => $data['pass'],
		];

		$input = $this->db->insert('tbl_member', $dataMember);

		if ($input === true) {
			$this->bonus($kode_member, $harga);
		}

	}


	function bonus($member, $harga){

		$kode_member = $member;
		$data =  $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
		$kode = $data['rule'];
		$arr = explode (" ",$kode);
		$jm_arr = count($arr);

		echo $jm_arr;
		$harga = $harga;

		for ($i=0; $i < $jm_arr ; $i++) { 
			if ($this->cek_stok($arr[$i]) < 0) {
				continue;
			}else{

				if ($i == 0) {
					$persen = 8 / 100;
					$bonus = $persen * $harga;
					$member =  $arr[$i];

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

	function totalBonus($kode_member, $bonus){

		$this->db->select_sum('bonus');
		$this->db->where('kode_member', $kode_member);
		$total = $this->db->get('tbl_bonus')->row_array();
		$total = $total['bonus'];
		
		$cek = $this->db->get_where('tbl_total_bonus',['kode_member' => $kode_member])->row_array();
		$total_bonus = $cek['total_bonus'] + $bonus;
		if ($cek == true) {
			
			$this->db->where('kode_member', $kode_member);
			$this->db->update('tbl_total_bonus',['total_bonus' => $total_bonus]);
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

	function add_stok($kode_member){

		$user = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
		$jml = $user['jumlah_paket'] * 10;
		$data = [
			'kode_member' => $kode_member,
			'jumlah_stok' => $jml,
			'date_create' => '',
		];
		$addStok = $this->m_data->add('tbl_stok', $data);
	}



	

	


	

// function test(){
// 	$order_id = '581417971';
// 	$data = $this->db->get_where('tbl_checkout_topup',['order_id' => $order_id])->row_array();
// 		$topup = [
// 			'produk' => $data['produk'],
// 			'slug' => $slug,
// 			'harga' => $data['harga'],
// 			'qty' => $data['qty'],
// 			'status' => 1,
// 			'status_admin' => 1,
// 		];

// 		$input = $this->db->insert('tbl_topup', $topup);
// }






}

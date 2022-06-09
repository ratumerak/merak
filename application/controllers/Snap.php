<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller {

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
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');	
		$this->load->model('m_data');
    }

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {

    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $kode_member = $this->input->post('kode_member');
    $nama_produk = $this->input->post('nama_produk');
    $harga = $this->input->post('harga');
		
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => 'a1',
		  'price' => $harga,
		  'quantity' => 1,
		  'name' => $nama_produk
		);


		$item_details = array ($item1_details);

		// Optional
		

		// Optional
		$customer_details = array(
		  'first_name'    => $nama,
		  // 'email'         => ,
		  // 'phone'         => "081122334455",
		  // 'billing_address'  => $billing_address,
		  // 'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 60
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
    	$result = json_decode($this->input->post('result_data'), true);


    	$data =  [
    	'kode_member' => $this->input->post('kode_member'),
    	'order_id' => $result['order_id'],
    	'produk' => $this->input->post('nama_produk'),
    	'harga' => $this->input->post('harga'),
    	'status' => $result['status_code'],
    	'pdf_url' => $result['pdf_url'], 
		];

		$this->db->insert('tbl_checkout', $data);
		
		$this->session->set_flashdata('message', 'swal("Yess!", "Checkout anda berhasil", "success" );');
		redirect('utama/pay');
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }

    function bayar($order_id){

    	$data = $this->db->get_where('tbl_checkout',['order_id' => $order_id])->row_array();
    	$kode_member = $data['kode_member'];
    	$harga = $data['harga'];
    	$this->add_member($kode_member, $harga);
    	$this->add_stok($kode_member);

    	$this->db->where('order_id', $order_id);
    	$this->db->update('tbl_checkout',['status' => 200]);
    	$this->session->set_flashdata('message', 'swal("Yess!", "Checkout anda berhasil dibayar", "success" );');
		redirect('utama/pay');
    }

    function add_member($kode_member, $harga){

    	$data = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
    	
    	$dataMember = [
			'kode_member' => $kode_member,
			'username' =>$data['username'],
			'email' => $data['email'],
			'no_telp' => $data['no_telp'],
			'nik' => $data['nik'],
			'rule' =>$data['rule'],
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

	function add_stok($kode_member){

		$data = [
			'kode_member' => $kode_member,

			'jumlah_stok' => 10,

			'date_create' => '',
		];

		$addStok = $this->m_data->add('tbl_stok', $data);
	}

}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap_topup_markisa extends CI_Controller {

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
    	$result = json_decode($this->input->post('result_data2'), true); 

        $data = [

            'order_id' => $result['order_id'],
            'kode_member' => $this->input->post('kode_member2'),
            'produk' => $this->input->post('produk2'),
            'jumlah_topup' => $this->input->post('paket2'),
            'qty' => $this->input->post('qty2'),
            'harga' => $this->input->post('harga2'),
            'status' => $result['status_code'],
            'pdf' => $result['pdf_url'],       
        ]; 

       
        $this->db->insert('tbl_checkout_topup', $data);
        $this->session->set_flashdata('message', 'swal("Yess!", "Anda berhasil melakukan topup", "success" );');
        redirect('utama/data_topup');
    	echo 'RESULT <br><pre>';
    	var_dump($result);
    	echo '</pre>' ;

    }

   

   



}

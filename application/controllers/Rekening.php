<?php 

	/**
	 * 
	 */
	class Rekening extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
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

	}
 ?>
<?php 
	/**
	 * 
	 */
	class Laporan extends CI_Controller
	{
		
		function __construct()
		{
			parent:: __construct();
			$this->load->library('dompdf_gen');
		}

		function data_member(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['member'] = $this->db->get('tbl_member')->result_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_member')->num_rows();

				$data['data'] = 'Data Member Pertanggal '. $tgl_awal .'s/d '. $tgl_akhir;  

			}else{

				$data['member'] = $this->db->get('tbl_member')->result_array();
				$data['total'] = $this->db->get('tbl_member')->num_rows();

				$data['data'] = 'Data Member';

			}

			$this->load->view('laporan/cetak_member', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_member.pdf", array('Attachment' => 0));
		}

		function data_register(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status_aktif',0);
				$data['user'] = $this->db->get('tbl_register')->result_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['jml'] = $this->db->get('tbl_register')->num_rows();

				$data['data'] = 'Data Registrasi Pertanggal '. $tgl_awal .' s/d '. $tgl_akhir;

			}else{

				$this->db->where('status_aktif',0);
				$data['user'] = $this->db->get('tbl_register')->result_array();
				$data['jml'] = $this->db->get('tbl_register')->num_rows();

				$data['data'] = 'Data Registrasi';
			}

			$this->load->view('laporan/cetak_register', $data);



			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_register.pdf", array('Attachment' => 0));
		}

		function data_order(){

			if (isset($_GET['tgl_awal'])) {
				
				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$data['data'] ='Data Order Pertanggal '. $tgl_awal." s/d ". $tgl_akhir;

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

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->order_by('id_order','desc');
				$data['order'] = $this->db->get('tbl_order')->result_array();

			}else{

				$data['data'] = 'Data Order';

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
			}

			$this->load->view('laporan/cetak_order', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_order.pdf", array('Attachment' => 0));
		}

		function data_pengajuan_topup(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');
				
				$data['data'] ='Data Pengajuan Topup '. $tgl_awal." s/d ". $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->order_by('id','desc');
				$this->db->where('status', 201);
				$data['topup'] = $this->db->get('tbl_checkout_topup')->result_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 201);
				$data['total_member'] = $this->db->get('tbl_checkout_topup')->num_rows();

			}else{

				$this->db->where('status', 201);
				$data['topup'] = $this->db->get('tbl_checkout_topup')->result_array();

				$this->db->where('status', 201);
				$data['total_member'] = $this->db->get('tbl_checkout_topup')->num_rows();

				$data['data'] = 'Data Pengajuan Topup';

				
			}

			$this->load->view('laporan/cetak_pengajuan_topup', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_pengajuan_topup.pdf", array('Attachment' => 0));
		}

		function data_topup(){

			if (isset($_GET['tgl'])) {


				$tgl = $this->input->get('tgl');
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
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$data['data'] = "Laporan Data All Topup Pertanggal ".  $tgl;

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

				$data['data'] = "Laporan Data All Topup";

			}

			$this->load->view('laporan/cetak_topup', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_topup.pdf", array('Attachment' => 0));
		}

		function data_topup_merak(){

			if (isset($_GET['tgl'])) {


				$tgl = $this->input->get('tgl');
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

				$data['data'] = "Laporan Data Topup Ratumerak Pertanggal ".  $tgl;

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

				$data['data'] = "Laporan Data Topup Ratumerak";

			}

			$this->load->view('laporan/cetak_topup_ratumerak', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_topup.pdf", array('Attachment' => 0));
		}

		function data_topup_markisa(){

			if (isset($_GET['tgl'])) {


				$tgl = $this->input->get('tgl');
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
				$data['total_topup_merak'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('harga');
				$this->db->where('produk','markisa');
				$this->db->like('date_create', $tgl);
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$data['data'] = "Laporan Data Topup Markisa Pertanggal ".  $tgl;

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
				$data['total_topup_merak'] = $this->db->get('tbl_topup')->row_array();


				$this->db->select_sum('harga');
				$this->db->where('produk','markisa');
				$data['total_harga'] = $this->db->get('tbl_topup')->row_array();

				$data['data'] = "Laporan Data Topup Markisa";

			}

			$this->load->view('laporan/cetak_topup_markisa', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_topup.pdf", array('Attachment' => 0));
		}


		function data_bonus_afiliasi(){

			if (isset($_GET['tgl_awal'])) {
				
				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$data['data'] = "Laporan Data Bonus Afiliasi Pertanggal ". $tgl_awal. ' s/d '. $tgl_akhir;


				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->order_by('id','desc');
				$data['afiliasi'] = $this->db->get('tbl_bonus')->result_array();

				$this->db->select_sum('bonus');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_bonus'] = $this->db->get('tbl_bonus')->row_array();
			}else{
				$this->db->order_by('id','desc');
				$data['afiliasi'] = $this->db->get('tbl_total_bonus')->result_array();

				$this->db->select_sum('total_bonus');
				$data['total_bonus'] = $this->db->get('tbl_total_bonus')->row_array();

				$data['data'] = "Laporan Data Bonus Afiliasi";

			}

			$this->load->view('laporan/cetak_bonus_afiliasi', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_bonus_afiliasi.pdf", array('Attachment' => 0));
		}



		function data_bonus_cashback_ratumerak(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->result_array();

				$this->db->select_sum('bonus_cashback');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->row_array();

				$data['data'] = "Laporan Data Bonus Cashback Ratumerak Pertanggal ". $tgl_awal. ' s/d '. $tgl_akhir;

			}else{
				$this->db->select_sum('bonus_cashback');
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->row_array();

				$data['bonus'] = $this->db->get('tbl_bonus_cashback_ratumerak')->result_array();
				$data['data'] = "Laporan Data Bonus Cashback Ratumerak";
			}

			$this->load->view('laporan/cetak_bonus_cashback_ratumerak', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_bonus_cashback_ratumerek.pdf", array('Attachment' => 0));
		}

		function data_bonus_cashback_markisa(){
			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->result_array();

				$this->db->select_sum('bonus_cashback');
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->row_array();

				$data['data'] = "Laporan Data Bonus Cashback Markisa Pertanggal ". $tgl_awal. ' s/d '. $tgl_akhir;
			}else{

				$data['bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->result_array();

				$this->db->select_sum('bonus_cashback');
				$data['total_bonus'] = $this->db->get('tbl_bonus_cashback_markisa')->row_array();

				$data['data'] = "Laporan Data Bonus Cashback Markisa";


			}

			$this->load->view('laporan/cetak_bonus_cashback_markisa', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_bonus_cashback_markisa.pdf", array('Attachment' => 0));
		}

		function data_pengajuan_withdraw(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');
				
				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 0])->row_array();

				$data['data'] = 'Laporan Data Pengajuan Withdraw Afiliasi Pertanggal '. $tgl_awal. ' s/d '. $tgl_akhir;
			}else{

				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 0])->row_array();

				$data['data'] = 'Laporan Data Pengajuan Withdraw Afiliasi';

			}

			$this->load->view('laporan/cetak_pengajuan_withdraw', $data);
			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_pengajuan_withdraw_afiliasi.pdf", array('Attachment' => 0));
		}


		function data_withdraw(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 1])->row_array();

				$data['data'] = 'Laporan Data Withdraw Afiliasi Pertanggal '. $tgl_awal. ' s/d '. $tgl_akhir; 

			}else{

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw',['status' => 1])->row_array();

				$this->db->select('*');
				$this->db->from('tbl_witdraw');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw.kode_member');
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$data['data'] = 'Laporan Data Withdraw Afiliasi';
			}

			$this->load->view('laporan/cetak_data_withdraw', $data);
			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_withdraw_afiliasi.pdf", array('Attachment' => 0));
		}

		function data_pengajuan_wt_ratumerak(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 0])->row_array();

				$data['data'] = 'Laporan Data Pengajuan Withdraw Cashback Ratumerak Pertanggal '. $tgl_awal. ' s/d '. $tgl_akhir;

			}else{
				
				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 0])->row_array();

				$data['data'] = 'Laporan Data Pengajuan Withdraw Cashback Ratumerak';

			}

			

			$this->load->view('laporan/cetak_pengajuan_withdraw_cashback_ratumerak', $data);
			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_pengajuan_withdraw_ratumerak.pdf", array('Attachment' => 0));
		}


		function data_wt_ratumerak(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();


				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 1])->row_array();

				$data['data'] = 'Laporan Data Withdraw Cashback Ratumerak Pertanggal '. $tgl_awal. ' s/d '. $tgl_akhir;

			}else{

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_ratumerak');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_ratumerak.kode_member');
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$data['data'] = 'Laporan Data Withdraw Cashback Ratumerak';


				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['status' => 1])->row_array();

			}

			$this->load->view('laporan/cetak_data_withdraw_cashback_ratumerak', $data);
			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_withdraw_ratumerak.pdf", array('Attachment' => 0));
		}


		function data_pengajuan_wt_markisa(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');
				
				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 0])->row_array();

				$data['data'] = 'Laporan Data Pengajuan Withdraw Cashback Markisa Pertanggal '. $tgl_awal. ' s/d '. $tgl_akhir;

			}else{

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where('status', 0);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 0])->row_array();

				$data['data'] = 'Laporan Data Pengajuan Withdraw Cashback Markisa';


			}

			$this->load->view('laporan/cetak_pengajuan_withdraw_cashback_markisa', $data);
			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_pengajuan_withdraw_markisa.pdf", array('Attachment' => 0));
		}

		function data_wt_markisa(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();


				$this->db->select_sum('penarikan');
				$this->db->where("date2 BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 1])->row_array();

				$data['data'] = 'Laporan Data Withdraw Cashback Markisa Pertanggal '. $tgl_awal. ' s/d '. $tgl_akhir;

			}else{

				$this->db->select('*');
				$this->db->from('tbl_witdraw_cashback_markisa');
				$this->db->join('tbl_member', 'tbl_member.kode_member = tbl_witdraw_cashback_markisa.kode_member');
				$this->db->where('status', 1);
				$data['wt'] = $this->db->get()->result_array();

				$this->db->select_sum('penarikan');
				$data['total_penarikan'] = $this->db->get_where('tbl_witdraw_cashback_markisa',['status' => 1])->row_array();

			}

			$this->load->view('laporan/cetak_data_withdraw_cashback_markisa', $data);
			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_withdraw_markisa.pdf", array('Attachment' => 0));
		}

		function data_po(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$data['tgl_awal'] = $tgl_awal;
				$data['tgl_akhir'] = $tgl_akhir;

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->order_by('kode_member', 'desc');
				$data['po'] = $this->db->get('tbl_topup')->result_array();


				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->select_sum('jumlah_topup');
				$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->select_sum('harga');
				$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

				$data['data'] = 'Laporan Data PO Ratumerak.id Pertanggal '. $tgl_awal .' s/d '. $tgl_akhir;

			}elseif (isset($_GET['produk'])) {
				$produk = $this->input->get('produk');
				$text = 'Laporan Data PO Berdasarkan Produk '. $produk;
				$data['data'] = ucwords ($text);

				$this->db->order_by('kode_member', 'desc');
				$this->db->where('produk',$produk);
				$data['po'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->where('produk',$produk);
				$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('harga');
				$this->db->where('produk',$produk);
				$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

				$data['filter_produk'] = $produk;
				$data['produk'] = $produk;


			}elseif (isset($_GET['tgl_awal_all'])) {


				$tgl_awal = $this->input->get('tgl_awal_all');
				$tgl_akhir = $this->input->get('tgl_akhir_all');
				$produk = $this->input->get('produk_all');

				$data['tgl_awal_all'] = $tgl_awal;
				$data['tgl_akhir_all'] = $tgl_akhir;
				$data['produk_all'] = $produk;
				$data['produk'] = $produk;

				if ($produk == 'all') {

					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->order_by('kode_member', 'desc');
					$data['po'] = $this->db->get('tbl_topup')->result_array();


					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->select_sum('jumlah_topup');
					$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->select_sum('harga');
					$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

					$data['data'] = 'Laporan Data PO Ratumerak.id Pertanggal '. $tgl_awal .' s/d '. $tgl_akhir. ' Produk '. $produk;
				}else{

					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->where('produk', $produk);
					$this->db->order_by('kode_member', 'desc');
					$data['po'] = $this->db->get('tbl_topup')->result_array();


					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->where('produk', $produk);
					$this->db->select_sum('jumlah_topup');
					$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

					$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
					$this->db->where('produk', $produk);
					$this->db->select_sum('harga');
					$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();

					$data['data'] = 'Laporan Data PO Ratumerak.id Pertanggal '. $tgl_awal .' s/d '. $tgl_akhir. ' Produk '. $produk;

				}

			}else{

				$data['data'] = 'Laporan Data PO Ratumerak.id';

				$this->db->order_by('kode_member', 'desc');
				$data['po'] = $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$data['jml_topup'] = $this->db->get('tbl_topup')->row_array();

				$this->db->select_sum('harga');
				$data['jml_uang'] = $this->db->get('tbl_topup')->row_array();



			}

			$this->load->view('laporan/cetak_data_po', $data);
			$paper_size = "A3";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_po.pdf", array('Attachment' => 0));
		}

		function data_bonus_stok(){

			if (isset($_GET['tgl_awal'])) {

				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->where('jumlah_topup >=',10);
				$data['bonus_stok'] =  $this->db->get('tbl_topup')->result_array();

				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$this->db->select_sum('jumlah_topup');
				$this->db->where('jumlah_topup >=',10);
				$data['total'] =  $this->db->get('tbl_topup')->row_array();

				$data['data'] = 'Laporan Data Bonus Stok Pertanggal '.$tgl_awal. ' s/d '. $tgl_akhir;
			}else{

				$this->db->where('jumlah_topup >=',10);
				$data['bonus_stok'] =  $this->db->get('tbl_topup')->result_array();

				$this->db->select_sum('jumlah_topup');
				$this->db->where('jumlah_topup >=',10);
				$data['total'] =  $this->db->get('tbl_topup')->row_array();

				$data['data'] = 'Laporan Data Bonus Stok';
			}

			$this->load->view('laporan/cetak_data_bonus_stok', $data);
			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_bonus_stok.pdf", array('Attachment' => 0));

		}

		function cetak_jaringan_member(){

			if (isset($_GET['tgl_awal'])) {

				$kode_member = $this->input->get('member');
				$tgl_awal = $this->input->get('tgl_awal');
				$tgl_akhir = $this->input->get('tgl_akhir');

				$this->db->where('member_get', $kode_member);
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['member'] = $this->db->get('tbl_register')->result_array();

				$this->db->where('member_get', $kode_member);
				$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
				$data['total'] = $this->db->get('tbl_register')->num_rows();

				$name = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
				$data['data'] = 'Data Jaringan Member '.ucwords($name['username']) .' Pertanggal '. $tgl_awal .' s/d '. $tgl_akhir;  

			}else{
				$kode_member = $this->input->get('member');
				$this->db->where('member_get', $kode_member);
				$data['member'] = $this->db->get('tbl_register')->result_array();

				$this->db->where('member_get', $kode_member);
				$data['total'] = $this->db->get('tbl_register')->num_rows();

				$name = $this->db->get_where('tbl_register',['kode_member' => $kode_member])->row_array();
				$data['data'] = 'Data Jaringan Member '. ucwords($name['username']);

			}

			$this->load->view('laporan/cetak_jaringan_member', $data);

			$paper_size = "LEGAL";
			$orientatation = "Landscape";
			$html = $this->output->get_output();

			$this->dompdf->set_paper($paper_size, $orientatation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("laporan_data_member.pdf", array('Attachment' => 0));
		}



	}

	?>
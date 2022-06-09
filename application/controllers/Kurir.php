<?php



	/**

	 * 

	 */

	class Kurir extends CI_Controller

	{

		

		function __construct()

		{

			parent:: __construct();

			$this->load->model('m_data');

			if ($this->session->username_kurir == null) {

				redirect('login_kurir/');

			}

		}



		function index(){



			$id_store = $this->session->id_store;

			$status = $this->input->post('status');
			$nohp = $this->input->post('nohp');
			$store = $this->session->id_store;

			$data['stok'] = $this->db->get_where('tbl_store',['id' => $this->session->id_store])->row_array();

			$wilayah = $this->db->get_where('tbl_wilayah_store',['id_store' => $store])->result_array();

			$this->db->order_by('id_order','desc');
			$this->db->where('status_order !=', 'Pesanan selesai');
			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->join('tbl_wilayah_store', 'tbl_wilayah_store.kec = tbl_order.kec');
			$data['order'] = $this->db->get()->result_array();

			

			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->join('tbl_wilayah_store', 'tbl_wilayah_store.kec = tbl_order.kec');
			$this->db->where('id_store',$id_store);
			$data['orderan_masuk'] = $this->db->get()->num_rows();

			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->join('tbl_wilayah_store', 'tbl_wilayah_store.kec = tbl_order.kec');
			$this->db->where('id_store',$id_store);
			$this->db->where('date',date('Y-m-d'));
			$data['orderan_hariini'] = $this->db->get()->num_rows();

			$this->load->view('template_kurir/header');

			$this->load->view('kurir/home', $data);

			$this->load->view('template_kurir/footer');



			if (isset($_POST['kirim'])) {



				$kode_member = $this->input->post('kode_member');

				$produk = $this->input->post('produk');
				
				$kode_member = $this->input->post('kode_member');
				$member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
				
				$id = $this->session->id_store;
				$store = $this->db->get_where('tbl_store',['id' => $id])->row_array();
				$stok = $store['stok'] - $this->input->post('qty');

				if ($stok < 0) {

					$this->session->set_flashdata('message', 'swal("Opps!", "Stok store tidak mencukupi", "warning" );');
					redirect('kurir/');
					
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

							$this->stok_store($this->input->post('qty'));
							$this->ceshback($this->input->post('id'), $produk, $this->input->post('qty'), $kode_member);
						}elseif($produk == 'markisa'){

							$this->stok_store($this->input->post('qty'));
							$this->ceshback($this->input->post('id'), $produk, $this->input->post('qty'), $kode_member);

						}elseif ($produk == 'bonus markisa') {
							$this->stok_store($this->input->post('qty'));

						}elseif ($produk == 'bonus ratumerak') {
							$this->stok_store($this->input->post('qty'));
						}




					}

					$this->m_data->sendWaStatusOrder($nohp, $status);
					$this->m_data->sendWaStatusOrder($member['no_telp'], $status);

					$this->session->set_flashdata('message', 'swal("Yess!", "Status order berhasil diperbaharui", "success" );');

					redirect('kurir/');



				}
			}

		}



		



		function data_order(){



			$id_store = $this->session->id_store;

			

			$this->db->select('*');

			$this->db->from('tbl_order');

			$this->db->join('tbl_wilayah_store', 'tbl_wilayah_store.kec = tbl_order.kec');

			$this->db->where('id_store',$id_store);

			$data['order'] = $this->db->get()->result_array();



			

			$this->load->view('template_kurir/header');

			$this->load->view('kurir/order', $data);

			$this->load->view('template_kurir/footer');

		}



		function order_selesai(){



			$id_store = $this->session->id_store;

			

			$this->db->select('*');
			$this->db->from('tbl_order');
			$this->db->join('tbl_wilayah_store', 'tbl_wilayah_store.kec = tbl_order.kec');
			$this->db->where('status_order','Pesanan selesai');
			$this->db->where('id_store',$id_store);
			$data['order'] = $this->db->get()->result_array();

			$this->load->view('template_kurir/header');

			$this->load->view('kurir/order_selesai', $data);

			$this->load->view('template_kurir/footer');

		}



		function transaksi(){

			$this->db->where('status_order', 'pesanan selesai');

			$this->db->where('kec', $this->session->lokasi);

			$data['transaksi'] = $this->db->get('tbl_order')->result_array();



			$this->db->select_sum('');

			$query = $this->db->get('members');



			$this->load->view('template_kurir/header');

			$this->load->view('kurir/transaksi', $data);

			$this->load->view('template_kurir/footer');	

		}



		function cek_stok($kode_member){



			$stok = $this->db->get_where('tbl_stok',['kode_member' => $kode_member])->row_array();

			return $stok['jumlah_stok'];

		}



		function cek_stok_markisa($kode_member){



			$stok = $this->db->get_where('tbl_stok_markisa',['kode_member' => $kode_member])->row_array();

			return $stok['jumlah_stok'];

		}





		function stok_store($qty){

			$id = $this->session->id_store;

			$store = $this->db->get_where('tbl_store',['id' => $id])->row_array();

			$stok = $store['stok'] - $qty;



			$data = [



				'stok' => $stok,

			];

			$this->db->where('id', $id);

			$this->db->update('tbl_store', $data);

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
			redirect('kurir/');

		}

		function ceshback($id_order, $produk, $qty, $kode_member){

			if ($produk == 'markisa') {

				date_default_timezone_set("Asia/Bangkok");

				$cashback = $this->db->get_where('tbl_seting_cashback',['produk' => $produk])->row_array();
				$data = [
					'id_order' => $id_order,
					'kode_member' => $kode_member,
					'bonus_cashback' => $cashback['bonus_cashback'] * $qty,
					'qty_order' => $qty,
					'date' => date('Y-m-d'),
				];

				$insert = $this->db->insert('tbl_bonus_cashback_markisa', $data);

				$total = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $kode_member])->row_array();
				if ($total == false) {
					$this->db->select_sum('bonus_cashback');
					$bonus = $this->db->get_where('tbl_bonus_cashback_markisa',['kode_member' => $kode_member])->row_array();
					$data = [
						'kode_member' => $kode_member,
						'total_bonus' => $bonus['bonus_cashback'],
					];


					$insert_total =$this->db->insert('tbl_total_cashback_markisa', $data);
				}else{
					$cashback = $cashback['bonus_cashback'] * $qty;
					$data = [
						'total_bonus' => $total['total_bonus'] + $cashback,
					];

					$this->db->where('kode_member', $kode_member);
					$this->db->update('tbl_total_cashback_markisa', $data);
				}

			}elseif ($produk == 'ratumerak') {
				date_default_timezone_set("Asia/Bangkok");

				$cashback = $this->db->get_where('tbl_seting_cashback',['produk' => $produk])->row_array();
				$data = [
					'id_order' => $id_order,
					'kode_member' => $kode_member,
					'bonus_cashback' => $cashback['bonus_cashback'] * $qty,
					'qty_order' => $qty,
					'date' => date('Y-m-d'),
				];

				$insert = $this->db->insert('tbl_bonus_cashback_ratumerak', $data);

				$total = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $kode_member])->row_array();
				if ($total == false) {
					$this->db->select_sum('bonus_cashback');
					$bonus = $this->db->get_where('tbl_bonus_cashback_ratumerak',['kode_member' => $kode_member])->row_array();
					$data = [
						'kode_member' => $kode_member,
						'total_bonus' => $bonus['bonus_cashback'],
					];

					$insert_total = $this->db->insert('tbl_total_cashback_ratumerak', $data);
				}else{

					$update_bonus = $cashback['bonus_cashback'] * $qty;
					$data = [
						'total_bonus' => $total['total_bonus'] + $update_bonus,
					]; 

					$this->db->where('kode_member', $kode_member);
					$this->db->update('tbl_total_cashback_ratumerak', $data);
				}
			}

		}

	}

	?>
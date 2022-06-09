<?php 

	/**
	 * 
	 */
	class M_data extends CI_Model
	{
		
		function getAll($table){

			return $this->db->get($table)->result_array();
		}

		function add($table, $data){

			return $this->db->insert($table, $data);
		}


		function update_stok($update_stok, $kode_member){
			$data = [
				'jumlah_stok' => $update_stok,
			];
			$this->db->where('kode_member', $kode_member);
			$update =  $this->db->update('tbl_stok',$data);
		}

		function update_stok_marikisa($update_stok, $kode_member){
			$data = [
				'jumlah_stok' => $update_stok,
			];
			$this->db->where('kode_member', $kode_member);
			$update =  $this->db->update('tbl_stok',$data);
		}



		function update_stok_markisa($update_stok){
			$data = [
				'jumlah_stok' => $update_stok,
			];
			$this->db->where('kode_member', $this->session->kode_member);
			$update =  $this->db->update('tbl_stok_markisa',$data);
		}


		function send_email($data){

			$email = $data['email'];
			$kode_member = $data['kode_member'];
			$username = $data['username'];
			$bank = $data['bank'];
			$config = [
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_user' => 'aldiiit593@gmail.com',
				'smtp_pass' => 'jmgtfhyvdxqqiuyy',
				'smtp_port' => 465,
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'newline'   => "\r\n"
			];

			$this->load->library('email', $config);
			$this->email->initialize($config);
			$this->email->set_newline("\r\n");

			$this->email->from('aldiiit593@gmail.com', 'Sinar Aneka Niaga');
			$this->email->to($email);

			$this->email->subject('PT. Sinar Aneka Niaga');
		      // $get1 = file_get_contents(base_url("ebunga/temp_email?orderid=$order_id"));
			$template = file_get_contents(base_url("email/registrasi.php?kode=$kode_member&user=$username&bank=$bank"));
			$this->email->message($template);

			if (!$this->email->send())
				show_error($this->email->print_debugger());
			else
				echo 'Your e-mail has been sent!';

		}

		function send_emailRegister($email, $kode_member){

			// $email = $data['email'];
			// $kode_member = $data['kode_member'];
			// $username = $data['username'];
		// $bank = $data['bank'];

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
			$template = file_get_contents(base_url("email/registrasi2.php?kode=$kode_member"));
			$this->email->message("<p> Terima kasih sudah melakukan registrasi, untuk selanjutnya silahkan klik tombol aktivasi akun untuk mengaktifkan akun anda.<br><br></p>  <a href='https://ratumerak.id/afiliasi/aktivasi/index/$kode_member'>Aktivasi Akun</a>");

			if (!$this->email->send())
				show_error($this->email->print_debugger());
			else
				echo 'Your e-mail has been sent!';

		}

		function sendEmailPass($pass, $email){


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
			$template = file_get_contents(base_url("email/lupapassword.php?pass=$pass"));
			$this->email->message($template);

			if (!$this->email->send())
				show_error($this->email->print_debugger());
			else
				'Your e-mail has been sent!';

		}



		function send_wa($no_hp, $name, $bank){

			$pesan = "Hello ". ucfirst($name).". Terimakasih sudah melakukan registrasi di ratumerak.id, untuk tahap selanjutnya silahkan melakukan pembayaran untuk mendapatkan stok produk ratumerak dan bonus.";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909",
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;

		}



		function sendWaaktif($no_hp, $name){

			$pesan = "Hello ". ucfirst($name).". Selamat akun member anda sudah aktif, silahkan login ke akun anda untuk mendapatkan bonus dari ratumerak.";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;


		}


		function sendWatopup($no_hp, $name){

			$pesan = "Hello ". ucfirst($name).". Prosess topup anda sudah berhasil, silahkan login ke akun anda untuk melihat jumlah stok anda.";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909",
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;


		}

		function sendWawithdraw($no_hp, $penarikan){

			$jumlah = "Rp " . number_format($penarikan, 0,',','.'); 
			$pesan = "Hello. Selamat proses withdraw anda sudah disetujui oleh admin, dengan nominal ". $jumlah. ",";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;

		}


		function sendWaMarkisa($no_hp){


			$pesan = "Hello. Selamat proses order produk markisa anda sudah disetujui, silahkan cek produk markisa anda";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}

		function sendWaStatusOrder($no_hp, $status){

			$pesan = "Hello. Orderan anda berhasil diupdate ke status *". ucfirst($status)."*";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}

		function sendWaStatusOrder2($no_hp, $status){

			$pesan = "Hello. Orderan anda berhasil diupdate ke status *". ucfirst($status)."*";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}

		function sendKurir($no_hp){

			$pesan = "Hello. anda sekarang mendapatkan pesanan, buka aplikasi kurir anda.";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}


		function sendBonusTopup($no_hp,$jumlah,$produk, $bonus){
			$pesan = "Hello. Karena anda sudah melakukan topup " . $produk . " sebanyak " .$jumlah ." paket kini anda mendapatkan bonus ".$bonus." stok beras ". $produk . ". Cek jumlah stok produk anda sekarang juga. Terimakasih";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;


		}

		function sendCancel($kode_member, $produk, $qty){
			$member = $this->db->get_where('tbl_member',['kode_member' => $kode_member])->row_array();
			$no_hp = $member['no_telp'];
			$pesan = "Hello.Mohon maaf untuk orderan anda dengan produk " . $produk . " sebanyak " .$qty ." qty di cancel oleh ratumerak.id. Terimakasih ";

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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;


		}

		function send_kode($no_hp, $kode){

			$pesan = "Hello. kode aktivasi anda adalah " . $kode . " ";
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
					"key":"819cb574ade24d11b07a9d41f1bf5aac-1650275909", 
					"phone_no":"'.$no_hp.'",
					"message":"'.$pesan.'"
				}',
			));

			$response = curl_exec($curl);

			curl_close($curl);
			echo $response;
		}



	}

	?>
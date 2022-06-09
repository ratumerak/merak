<!DOCTYPE html>
<html><head>
	<title>Pdf</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			},

			td{
				text-align: center;
			}
		</style>
	</head><body>
		<h2 style="font-weight:bold; margin-bottom: 10px;"><?= $data ?></h2>
		<br>
		<br>

		<center>
			<table style="width:80%;">

				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Produk</th>
					<th>Jml Paket</th>
					<th>QTY</th>
					<th>Bonus Topup</th>
					<th>Harga</th>
					<th>Status Pembayaran</th>
					<th>Tgl Topup</th>

				</tr>
				
				<?php $no = 1; ?>
				<?php $jumlah_paket = 0; ?>
				<?php $jumlah_qty = 0; ?>
				<?php $jumlah_harga = 0; ?>
				<?php   $jumlah_bonus = 0; ?>
				<?php foreach ($topup as $data) { ?>
					<tr>
						<td><?= $no++; ?></td>
						<td>
							<?php 
							$mber = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member'] ])->row_array();
							echo $mber['username'];
							?>
						</td>
						<td><?= $data['produk'] ?></td>
						<td><?= $data['jumlah_topup'] ?></td>
						<td><?= $data['qty'] ?></td>
						<td>
							<?php 
							$bns = $this->db->get_where('tbl_bonus_topup',['order_id' => $data['order_id'] ])->row_array();
							if ($bns == true) {
								echo $bns['bonus']." Sak ". $data['produk'];
							}else{

								echo "0";
							}
							?>
						</td>
						<td><?= $data['harga'] ?></td>
						<td>

							<small class="badge badge-success">Sudah Terbayar</small>

						</td>

						<td><?= $data['date_create'] ?></td>



					</tr>

					<?php   
					$jumlah_paket +=$data['jumlah_topup'];
					$jumlah_qty +=$data['qty'];
					$jumlah_harga +=$data['harga'];
					$jumlah_bonus +=$bns['bonus'];
					?>

				<?php } ?>
				<tr>
					<td>Total</td>
					<td><?= $no -= 1 ?></td>
					<td>-</td>
					<td><?= $jumlah_paket ?></td>
					<td><?= $jumlah_qty ?></td>
					<td><?= $jumlah_bonus ?></td>
					<td><?= "Rp " . number_format($jumlah_harga ,0,',','.'); ?></td>
					<td>-</td>
					<td>-</td>
				</tr>

			</table>
		</center>
		
		<div style="position: absolute;top: 95%">
			<hr >
			<p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
			</p>
		</div>
	</p>

</body></html>
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
					<th>Kode Member</th>
					<th>No telp</th>
					<th>Qty</th>
					<th>Produk</th>
					<th>Alamat Tujuan</th>
					<th>Tgl Order</th>
					<th>Status Order</th>
				</tr>
				
				<?php $no = 1; ?>
				<?php foreach ($order as $data) { ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><a href="#" data-toggle="modal" data-target="#example<?= $data['id_order'] ?>">
							<?= $data['kode_member'] ?>
						</a></td>
						<td><?= $data['no_telp_pembeli'] ?></td>
						<td><?= $data['qty'] ?></td>
						<td><?= $data['produk'] ?></td>
						<td><?= $data['alamat_lengkap'] ?></td>
						<td><?= $data['data_order'] ?></td>
						<td>

							<?php 

							if ($data['status_order'] == '0') {
								echo "Menunggu";
							}else{
								echo $data['status_order'];
							}

							?>


						</td>
					</tr>
				<?php } ?>

				<tr style="background-color: orange; font-size: 13px; color: black;">
					<td>Total</td>
					<td><?= $no -= 1?></td>
					<td>-</td>
					<td><?=  $total_qty['qty'] ?></td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					
				</tr>

			</table>
		</center>
		<!-- <p style="font-weight: bold">  Total Qty Order : <?=  $total_qty['qty'] ?> Qty</p>
		<p style="font-weight: bold">  Total Qty Order Ratumerak : <?=  $total_qty_merak['qty'] ?> Qty</p>
		<p style="font-weight: bold">  Total Qty Order Markisa : <?=  $total_qty_markisa['qty'] ?> Qty</p>

		<p style="font-weight: bold">  Total Qty Order Bonus Ratumerak : <?=  $total_qty_Bonusmerak['qty'] ?> Qty</p>
		<p style="font-weight: bold">   Total Qty Order Bonus Markisa : <?=  $total_qty_Bonusmarkisa['qty'] ?> Qty</p>
		<div style="position: absolute;top: 95%">
			<hr >
			<p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
			</p> -->
		</div>
	</p>

</body></html>
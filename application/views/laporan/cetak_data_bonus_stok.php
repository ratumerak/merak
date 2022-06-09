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
					<th>Produk</th>
					<th>Jumlah Paket</th>
					<th>Bonus Topup</th>

				</tr>

				<?php $no = 1; ?>
				<?php foreach ($bonus_stok as $data) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data['kode_member'] ?></td>
					<td><?= $data['produk'] ?></td>
					<td><?= $data['jumlah_topup'] ?></td>
				</td>
				<td>
					<?php 
					$jml = $data['jumlah_topup'];

					if ($jml == 50) {
					$bonus = 20;
				}elseif($jml >= 40){
				echo $bonus = 16;
			}elseif ($jml >= 30) {
			echo $bonus = 12;
		}elseif ($jml >= 20) {
		echo $bonus = 8;
	}elseif ($jml >= 10) {
	echo $bonus = 4;
}else{
// echo $bonus = 0;
}
?>
</td>

</tr>
<?php } ?>


</table>
</center>
<h5>Total Jumlah Paket Bonus Stok : <?= $total['jumlah_topup'] ?> Paket </h5>




<div style="position: absolute;top: 95%">
	<hr >
	<p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
	</p>
</div>
</p>





</body></html>
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
					<th>Username</th>
					<th>Email</th>
					<th>No Telp</th>
					<th>Stok Ratumerak</th>
					<th>Stok Markisa</th>
					<th>Stok Bonus Ratumerak</th>
					<th>Stok Bonus Markisa</th>
					<th>Bonus Afilisi</th>
					<th>Bonus Cashback Ratumerak</th>
					<th>Bonus Cashback Markisa</th>
					<th>Bonus Afiliator</th>

				</tr>
				<?php $no = 1; ?>
				<?php $stok_ratumerak = 0; ?>
				<?php $stok_markisa = 0; ?>
				<?php $stok_b_ratumerak = 0; ?>
				<?php $stok_b_markisa = 0; ?>
				<?php $total_afiliasi = 0; ?>
				<?php $total_bonusCasMarkisa = 0; ?>
				<?php $total_bonusCasMerak = 0; ?>
				<?php $bonus_afiliator = 0; ?>
				<?php foreach ($member as $data) { ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $data['kode_member'] ?></td>
						<td><?= $data['username'] ?></td>
						<td><?= $data['email'] ?></td>
						<td><?= $data['no_telp'] ?></td>
						<td>
							<?php 
							$merak = $this->db->get_where('tbl_stok',['kode_member' => $data['kode_member']])->row_array();
							if ($merak == false) {
								echo "0";
							}else{

								echo $merak['jumlah_stok'];
								$stok_ratumerak += $merak['jumlah_stok'];
							}
							?>
						</td>

						<td>
							<?php 
							$markisa = $this->db->get_where('tbl_stok_markisa',['kode_member' => $data['kode_member']])->row_array();
							if ($markisa == false) {
								echo "0";
							}else{

								echo $markisa['jumlah_stok'];
								$stok_markisa += $markisa['jumlah_stok'];
							}

							?>
						</td>

						<td>
							<?php 
							$bonusM = $this->db->get_where('tbl_bonus_topup_ratumerak', ['kode_member' => $data['kode_member']])->row_array();
							if ($bonusM == False) {
								echo "0";
							}else{
								echo $bonusM['total_stok_bonus'];
								$stok_b_ratumerak += $bonusM['total_stok_bonus'];
							}
							?>
						</td>


						<td>
							<?php 
							$bonusMar = $this->db->get_where('tbl_bonus_topup_markisa', ['kode_member' => $data['kode_member']])->row_array();
							if ($bonusMar == False) {
								echo "0";
							}else{
								echo $bonusMar['total_stok_bonus'];
								$stok_b_markisa += $bonusMar['total_stok_bonus'];
							}
							?>
						</td>

						<td>
							<?php 
							$bonusAf = $this->db->get_where('tbl_total_bonus', ['kode_member' => $data['kode_member']])->row_array();
							if ($bonusAf == false) {
								echo "0";
							}else{
								echo $bonusAf['total_bonus'];
								$total_afiliasi += $bonusAf['total_bonus'];
							}
							?>
						</td>

						<td>
							<?php 
							$bonusCas1 = $this->db->get_where('tbl_total_cashback_ratumerak', ['kode_member' => $data['kode_member']])->row_array();
							if ($bonusCas1 == false) {
								echo "0";
							}else{
								echo $bonusCas1['total_bonus'];
								$total_bonusCasMerak += $bonusCas1['total_bonus'];
							}
							?>
						</td>

						<td>
							<?php 
							$bonusCas2 = $this->db->get_where('tbl_total_cashback_markisa', ['kode_member' => $data['kode_member']])->row_array();
							if ($bonusCas2 == false) {
								echo "0";
							}else{
								echo $bonusCas2['total_bonus'];
								$total_bonusCasMarkisa += $bonusCas2['total_bonus'];
							}
							?>
						</td>
						<td>
							<?php 
							$this->db->select_sum('bonus');
							$bonus = $this->db->get_where('tbl_bonus',['dari' => $data['kode_member']])->row_array();
							?>
							<?= "Rp " . number_format($bonus['bonus'],0,',','.'); ?>
							<?php 
							$bonus_afiliator += $bonus['bonus'];
							?>

						</td>


					<?php } ?>

					<tr style="background-color: orange; font-size: 13px;">
						<th>Total : </th>
						<th><?= $total ?></th>
						<th>-</th>
						<th>-</th>
						<th>-</th>
						<th><?= $stok_ratumerak ?></th>
						<th><?= $stok_markisa ?></th>
						<th><?= $stok_b_ratumerak ?></th>
						<th><?= $stok_b_markisa ?></th>
						<th><?= "Rp " . number_format($total_afiliasi ,0,',','.'); ?></th>
						<th><?= "Rp " . number_format($total_bonusCasMerak ,0,',','.'); ?></th>
						<th><?= "Rp " . number_format($total_bonusCasMarkisa ,0,',','.'); ?></th>
						<th><?= "Rp " . number_format($bonus_afiliator ,0,',','.'); ?></th>
					</tr>

				</table>
			</center>

			<!-- <h5>Total Jumlah Member : <?= $total ?></h5>
			<h5>Total Stok Ratumerak : <?= $stok_ratumerak ?> Stok </h5>
			<h5>Total Stok Markisa : <?= $stok_markisa ?> Stok </h5>
			<h5>Total Stok Bonus Ratumerak : <?= $stok_b_ratumerak ?> Stok </h5>
			<h5>Total Stok Bonus Markisa : <?= $stok_b_markisa ?> Stok </h5>
			<h5>Total Jumlah Bonus Afiliasi : <?= "Rp " . number_format($total_afiliasi ,0,',','.'); ?></h5>
			<h5>Total Jumlah Bonus Cashback Ratumerak : <?= "Rp " . number_format($total_bonusCasMerak ,0,',','.'); ?></h5>
			<h5>Total Jumlah Bonus Cashback Markisa : <?= "Rp " . number_format($total_bonusCasMarkisa ,0,',','.'); ?></h5> -->




			<div style="position: absolute;top: 95%">
				<hr >
				<p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
				</p>
			</div>
		</p>





	</body></html>
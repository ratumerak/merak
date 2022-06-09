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
					<th>Affiliator</th>
					<th>Bonus Awal</th>
					<th>Total Withdraw</th>
					<th>Total Bonus</th>
					<th>Date</th>
				</tr>

				<?php $no = 1; ?>
				<?php   $bonus_awal2 = 0; ?>
				<?php   $total_wt2 = 0 ; ?>
				<?php foreach ($afiliasi as $data) { ?>
					<tr>
						<td><?= $no++; ?></td>
						<td>
							<?php 
							$mbr = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member']])->row_array();
							echo $mbr['username'];
							?>
						</td>
						<td>
							<?php   
							$this->db->select_sum('bonus');
							$bonus_awal = $this->db->get_where('tbl_bonus',['kode_member' => $data['kode_member']])->row_array();
							echo "Rp " . number_format($bonus_awal['bonus'],0,',','.');

							$bonus_awal2 += $bonus_awal['bonus'];

							?>
						</td>
						<td>
							<?php   

							$this->db->select_sum('penarikan');
							$total_wt = $this->db->get_where('tbl_witdraw',['kode_member' => $data['kode_member']])->row_array();
							echo "Rp " . number_format($total_wt['penarikan'],0,',','.');

							$total_wt2 += $total_wt['penarikan'];

							?>
						</td>
						<td><?= "Rp " . number_format($data['total_bonus'],0,',','.');  ?></td>

						<td><?= $data['date_create'] ?></td>
					</td>
				</tr>
			<?php } ?>

			<tr style="background-color: orange; font-size: 13px; color: black;">
				<th>Total</th>
				<th><?= $no -=1; ?></th>
				<th><?= "Rp " . number_format($bonus_awal2  ,0,',','.');  ?></th>
				<th><?= "Rp " . number_format($total_wt2,0,',','.');  ?></th>
				<th> <?= "Rp " . number_format($total_bonus['total_bonus'],0,',','.');  ?></th>
				<th>-</th>
			</tr>



		</table>
	</center>
	<!-- <h6>Jumlah Totol Bonus Afiliasi : <?= "Rp " . number_format($total_bonus['bonus'],0,',','.');  ?></h6> -->
	<div style="position: absolute;top: 95%">
		<hr >
		<p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
		</p>
	</div>
</p>

</body></html>
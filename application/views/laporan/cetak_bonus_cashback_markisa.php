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
					<th>Username</th>
					<th>Bonus</th>
					<th>Produk</th>
					<th>Qty Order</th>
					<th>Date</th>
				</tr>

				<?php $no = 1; ?>
				<?php $qtorder = 0; ?>
				<?php foreach ($bonus as $data) { ?>
					<tr>
						<td><?= $no++; ?></td>
               <!--  <td><a href="#" data-toggle="modal" data-target="#example<?= $data['id_order'] ?>">
                  <?= $data['kode_member'] ?>
              </a></td> -->
              <td>
              	<?php 
              	$mbr = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member']])->row_array();
              	echo $mbr['username'];
              	?>
              </td>
              <td><?= $data['bonus_cashback'] ?></td>


              <td>Ratumerak</td>
              <td><?= $data['qty_order'] ?></td>
              <td><?= $data['date_create'] ?></td>


          </tr>

          <?php 
          $qtorder += $data['qty_order'];
          ?>

      <?php } ?>


      <tr style="background-color: orange; font-size: 13px; color: black;">
      	<th>Total</th>
      	<th><?= $no -= 1 ?></th>
      	<th><?= "Rp " . number_format($total_bonus['bonus_cashback'],0,',','.');  ?></th>
      	<td>-</td>
      	<td><?= $qtorder ?></td>
      	<th>-</th>
      	
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
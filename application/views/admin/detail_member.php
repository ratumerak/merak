 <div class="container-fluid">



 	<!-- DataTales Example -->
 	<div class="card shadow mb-4">
 		<div class="card-header py-3">
 			<h6 class="m-0 font-weight-bold text-primary">Detail Transaksi Member</h6>
 		</div>
 		<div class="card-body">

 			<div class="table-responsive">
 				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 					<thead>
 						<tr>
 							<th>No</th>
 							<th>Order Id</th>
 							<th>Produk</th>
 							<th>Jumlah Topup</th>
 							<th>Qty</th>
 							<th>Harga</th>
 							<th>Tgl Topup</th>
 							
 						</tr>
 					</thead>

 					<tbody>
 						<?php $no = 1; ?>
 						<?php $topup1 = 0; ?>
 						<?php $qty = 0; ?>
 						<?php $harga = 0; ?>
 						<?php foreach ($topup as $data) { ?>
 							<tr>
 								<td><?= $no++; ?></td>
 								<td><?= $data['order_id'] ?></td>
 								<td><?= $data['produk'] ?></td>
 								<td><?= $data['jumlah_topup'] ?></td>
 								<td><?= $data['qty'] ?></td>
 								<td><?= $data['harga'] ?></td>
 								<td><?= $data['date_create'] ?></td>
 							</tr>

 							<?php 
 							$topup1 += $data['jumlah_topup'];
 							$qty += $data['qty'];
 							$harga += $data['harga'];
 							?>

 						<?php } ?>

 					</tbody>
 					<tfoot>
 						<tr style="background-color: orange; color: black; text-align: center; font-size: 13px;">
 							<td>Total</td>
 							<td>-</td>
 							<td>-</td>
 							<td><?= $topup1 ?></td>
 							<td><?= $qty ?></td>
 							<td><?= "Rp " . number_format($harga ,0,',','.'); ?></td>
 							<td>-</td>
 							
 						</tr>
 					</tfoot>
 				</table>
 				<!-- <h5 style="color: orange;">Total Jumlah Topup : <?= $total['jumlah_topup'] ?> / <?= $total['qty'] ?></h5>
 					<h5 style="color: orange;">Total Harga : <?= $total['harga'] ?></h5> -->
 			</div>

 		</div>
 	</div>
 </div>
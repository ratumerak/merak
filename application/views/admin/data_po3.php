<?php   
if (!isset($produk)) {
	$produk = '';
}
?>
<div class="container-fluid">

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data PO</h6>
		</div>
		<div class="card-body">
			<?php 
			if (isset($tgl_awal)) { ?>
				<a href="<?= base_url('Laporan/data_po?tgl_awal=') ?><?= $tgl_awal ?>&&tgl_akhir=<?= $tgl_akhir ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
			<?php }elseif (isset($filter_produk)) { ?>
				<a href="<?= base_url('Laporan/data_po?produk=') ?><?= $filter_produk ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>

			<?php }elseif (isset($tgl_awal_all)) { ?>
				<a href="<?= base_url('Laporan/data_po?tgl_awal_all=') ?><?= $tgl_awal_all ?>&&tgl_akhir_all=<?= $tgl_akhir_all ?>&&produk_all=<?= $produk_all ?>" target="_blank" class="btn btn-primary mt-2 mb-2">Cetak PDF</a>
			<?php }else{ ?>
				<a href="<?= base_url('Laporan/data_po') ?>" target="_blank" class="btn btn-danger mt-2 mb-2">Cetak PDF</a>
			<?php } ?>
			<hr>
			<h5>Data <?= $tgl ?></h5>
			<hr>

			<form class="form-inline float-left" method="post" action="">
				<div class="form-group mb-2 mr-2">
					<label for="staticEmail2" class="sr-only">Filter Produk</label>
					<select class="form-control" name="produk">
						<option value="">-- Pilih Berdasarkan Produk --</option>
						<option value="all">All</option>
						<option value="ratu merak">Ratumerak</option>
						<option value="markisa">Markisa</option>
					</select>
				</div>

				<!-- <input type="submit" name="filter_produk" value="Search" class="btn btn-primary ml-2">
				</form> -->



				<!-- <form class="form-inline" method="post" action=""> -->
					<div class="form-group mb-2">
						<label for="staticEmail2" class="sr-only">Tgl Awal</label>
						<input type="date" name="tgl_awal" class="form-control" id="inputdate2">
					</div>
					<div class="form-group mx-sm-3 mb-2">
						<label for="inputdate2" class="sr-only">Tgl Akhir</label>
						<input type="date" name="tgl_akhir" class="form-control">
					</div>

					<input type="submit" name="kirim" value="Search" class="btn btn-primary">
				</form>


				<div class="table-responsive">


					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<tr style="text-align: center;">
							<th rowspan="2">Kode Member</th>
							<th rowspan="2">Topup</th>
							<th rowspan="2">Paket</th>
							<th rowspan="2">Paket Bonus</th>
							<th colspan="2">Total Stok</th>
							<th colspan="2"> Stok Saat Ini</th>


							<th colspan="2">Stok Keluar</th>
							<th colspan="2">Total Bonus Topup</th>
							<th colspan="2">Stok Bonus Topup Saat Ini</th>
							<th colspan="2">Stok Bonus Keluar</th>
							<th colspan="2">Total Cashback</th>
							<th colspan="2">Total Cashback Saat Ini</th>
							<th colspan="2">Cashback Wd</th>
							<th rowspan="2">Total Bonus Afiliasi</th>
							<th rowspan="2">Bonus Afiliasi Saat Ini</th>
							<th rowspan="2">Bonus Afilasi Wd</th>
						</tr>

						<tr>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
							<td>Ratumerak</td>
							<td>Markisa</td>
						</tr>


						<?php 
						$total_harga2 = 0;
						$paket1 = 0;
						$paket2 = 0;
						$stok_paket = 0;
						$stok_bonus = 0;
						$bns_merak = 0;
						$bns_markisa = 0;
						$wt_merak = 0;
						$wt_markisa = 0;
						$bns_aff = 0;
						$bns_aff2 = 0;
						$wt_afiliasi = 0;
						$stok_perproduk1 = 0;
						$stok_perproduk2 = 0;
						$stok_keluar1 = 0;
						$stok_keluar2 = 0;
						$stok_bnsperproduk1 = 0;
						$stok_bnsperproduk2 = 0;
						$stok_bns_k1 = 0;
						$stok_bns_k2 = 0; 
						$total_bonus_topup1 = 0;
						$total_bonus_topup2 = 0;
						$stok_bns_topup1 = 0;
						$stok_bns_topup2 = 0;
						$bns_markisa_saatini = 0;
						$bns_merak_saatini = 0;
						$total_stok_markisa = 0;
						$total_stok_merak = 0;
						$cek = '';

						?>

						<?php foreach ($po as $data) {?>
							<?php 

							if (isset($tgl_awal)) {
								$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
								$row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows();
							}elseif (isset($filter_produk)) {
								$this->db->where('produk', $filter_produk);
								$row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows();
							}elseif (isset($produk_all)) {
								$this->db->where("date BETWEEN '$tgl_awal_all' AND '$tgl_akhir_all'");
								$this->db->where('produk', $produk_all);
								$row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows();
							}
							else{

								$row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows();
							}



      // $register = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member']])->row_array();
      // if ($data['kode_member'] == $register['kode_member']) {
							?>
							<?php if ($row > 1) { ?>
								<tr>
									<?php if ($cek != $data['kode_member']) { ?>
										<td rowspan="<?= $row ?>"><?= $data['kode_member'] ?></td>
									<?php } ?>
									<td>
										<?= "Rp " . number_format($data['harga'],0,',','.');  ?>
										<?php $total_harga2 += $data['harga']; ?>
									</td>

									<td>
										<?php if ($data['jumlah_topup'] < 10) {
											echo $data['jumlah_topup'];
											$paket1 += $data['jumlah_topup'];
										} ?>
									</td>
									<td> <?php if ($data['jumlah_topup'] >= 10) {
										echo $data['jumlah_topup'];
										$paket2 += $data['jumlah_topup'];
									} ?>
								</td>

								<!-- total stok -->

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk != '') {
											$this->db->where('produk', $produk);
										}elseif (isset($tgl_awal)) {
											$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
										}
										$this->db->select_sum('jumlah_topup');
										$this->db->where('produk', 'ratu merak');
										$stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
										echo $stok['jumlah_topup'] * 10;
										$total_stok_merak += $stok['jumlah_topup'] * 10;
										?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk != '') {
											$this->db->where('produk', $produk);
										}elseif (isset($tgl_awal)) {
											$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
										}
										$this->db->select_sum('jumlah_topup');
										$this->db->where('produk', 'markisa');
										$stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
										echo $stok['jumlah_topup'] * 10;
										$total_stok_markisa += $stok['jumlah_topup'] * 10;
										?>
									</td>
								<?php } ?>

								<!-- ------------- -->





								<!-- stok perproduk -->
								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'ratu merak' || $produk == '' ) {
											$this->db->where('kode_member', $data['kode_member']);
											$total_merak = $this->db->get('tbl_stok')->row_array();
											echo $total_merak['jumlah_stok'];
											$stok_perproduk1 +=  $total_merak['jumlah_stok'];
										}else{
											echo "-";
										}

										?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'markisa' || $produk == '' ) {
											$this->db->where('kode_member', $data['kode_member']);
											$total_markisa = $this->db->get('tbl_stok_markisa')->row_array();
											echo $total_markisa['jumlah_stok'];
											$stok_perproduk2 +=  $total_markisa['jumlah_stok'];
										}else{
											echo "-";
										}

										?>
									</td>
								<?php } ?>

								<!-- --- -->






								<!-- stok keluar -->
								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'ratu merak' || $produk == '' ) {
											$this->db->select_sum('qty');
											$this->db->where('kode_member', $data['kode_member']);
											$this->db->where('produk', 'ratumerak');
											$stok_keluar11 = $this->db->get('tbl_order')->row_array();
											echo $stok_keluar11['qty'];
											$stok_keluar1 +=  $stok_keluar11['qty'];
										}else{
											echo "-";
										}

										?>
									</td>
								<?php } ?>


								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'markisa' || $produk == '' ) {
											$this->db->select_sum('qty');
											$this->db->where('kode_member', $data['kode_member']);
											$this->db->where('produk', 'markisa');
											$stok_keluar22 = $this->db->get('tbl_order')->row_array();
											echo $stok_keluar22['qty'];
											$stok_keluar2 +=  $stok_keluar22['qty'];

										}else{
											echo "-";
										}

										?>

									</td>
								<?php } ?>

								<!-- ---- -->


								<!-- stok bonus topup -->
								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'ratu merak' || $produk == '' ) {
											$this->db->select_sum('bonus');
											if (isset($tgl_awal)) {
												$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
											}
											$this->db->where('produk','ratu merak');
											$stok_b1 = $this->db->get_where('tbl_bonus_topup',['kode_member' => $data['kode_member']])->row_array();
											echo $stok_b1['bonus'];
											$total_bonus_topup1 += $stok_b1['bonus'];
										}else{
											echo "-";
										}


										?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'markisa' || $produk == '' ) {
											$this->db->select_sum('bonus');
											if (isset($tgl_awal)) {
												$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
											}
											$this->db->where('produk','markisa');
											$stok_b2 = $this->db->get_where('tbl_bonus_topup', ['kode_member' => $data['kode_member']])->row_array();
											echo $stok_b2['bonus'];
											$total_bonus_topup2 += $stok_b2['bonus'];
										}else{
											echo "-";
										}

										?>
									</td>
								<?php } ?>

								<!-- --------------- -->


								<!-- stok bonus saat ini -->

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'ratu merak' || $produk == '' ) {
											$stok_bns1 = $this->db->get_where('tbl_bonus_topup_ratumerak',['kode_member' => $data['kode_member']])->row_array();
											echo $stok_bns1['total_stok_bonus'];
											$stok_bnsperproduk1 += $stok_bns1['total_stok_bonus'];
										}else{
											echo "-";
										}


										?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'markisa' || $produk == '' ) {
											$stok_bns2 = $this->db->get_where('tbl_bonus_topup_markisa',['kode_member' => $data['kode_member']])->row_array();
											echo $stok_bns2['total_stok_bonus'];
											$stok_bnsperproduk2 += $stok_bns2['total_stok_bonus'];

										}else{
											echo "-";
										}

										?>
									</td>
								<?php } ?>

								<!-- ----------------- -->

								<!-- stok bonus keluar -->
								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'ratu merak' || $produk == '' ) {
											$this->db->select_sum('qty');
											$this->db->where('kode_member', $data['kode_member']);
											$this->db->where('produk', 'bonus ratumerak');
											$stok_bnskeluar1 = $this->db->get('tbl_order')->row_array();
											echo $stok_bnskeluar1['qty'];
											$stok_bns_k1 += $stok_bnskeluar1['qty'];
										}else{
											echo "-";
										}

										?>
									</td>
								<?php } ?>


								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										if ($produk == 'markisa' || $produk == '' ) {
											$this->db->select_sum('qty');
											$this->db->where('kode_member', $data['kode_member']);
											$this->db->where('produk', 'bonus markisa');
											$stok_bnskeluar2 = $this->db->get('tbl_order')->row_array();
											echo $stok_bnskeluar2['qty'];
											$stok_bns_k2 += $stok_bnskeluar2['qty'];
										}else{
											echo "-";
										}

										?>
									</td>
								<?php } ?>

								<!-- ---- -->


								<!-- total cashback -->

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php   if ($produk == 'ratu merak' || $produk == '') { ?>
											<?php 
											$total_bns_cashback1 = $this->db->get_where('tbl_bonus_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
											if ($total_bns_cashback1 == true) {
												echo $total_bns_cashback1['bonus_cashback'];
												$bns_merak += $total_bns_cashback1['bonus_cashback'];
											}else{
												echo "0";
											}

											?>
										<?php }else{
											echo "-";
										} ?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php   if ($produk == 'markisa' || $produk == '') { ?>
											<?php 
											$total_bns_cashback2 = $this->db->get_where('tbl_bonus_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
											if ($total_bns_cashback2 == true) {
												echo $total_bns_cashback2['bonus_cashback'];
												$bns_markisa += $total_bns_cashback2['bonus_cashback'];
											}else{
												echo "0";
											}
											?>
										<?php   }else{
											echo "-";
										} ?>
									</td>
								<?php } ?>

								<!-- ----------------- -->


								<!-- total cashback saat ini-->

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php   if ($produk == 'ratu merak' || $produk == '') { ?>
											<?php 
											$bns_cashback1 = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
											if ($bns_cashback1 == true) {
												echo $bns_cashback1['total_bonus'];
												$bns_merak_saatini += $bns_cashback1['total_bonus'];
											}else{
												echo "0";
											}

											?>
										<?php }else{
											echo "-";
										} ?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php   if ($produk == 'markisa' || $produk == '') { ?>
											<?php 
											$bns_cashback2 = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
											if ($bns_cashback2 == true) {
												echo $bns_cashback2['total_bonus'];
												$bns_markisa_saatini += $bns_cashback2['total_bonus'];
											}else{
												echo "0";
											}
											?>
										<?php   }else{
											echo "-";
										} ?>
									</td>
								<?php } ?>

								<!-- ----------------- -->



								<!-- cashback wt -->

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php if ($produk == 'ratu merak' || $produk == '') { ?>
											<?php 
											$this->db->select_sum('penarikan');
											$this->db->where('status', 1);
											$wt_bonus1 = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
											if ($wt_bonus1 == true) {
												echo $wt_bonus1['penarikan'];
												$wt_merak += $wt_bonus1['penarikan'];
											}else{
												echo "0";
											}
											?>
										<?php }else{
											echo "-";
										} ?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php   if ($produk == 'markisa' || $produk == '') { ?>
											<?php 
											$this->db->select_sum('penarikan');
											$this->db->where('status', 1);
											$wt_bonus2 = $this->db->get_where('tbl_witdraw_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
											if ($wt_bonus2 == true) {
												echo $wt_bonus2['penarikan'];
												$wt_markisa += $wt_bonus2['penarikan'];
											}else{
												echo "0";
											}
											?>
										<?php   }else{
											echo "-";
										} ?>
									</td>
								<?php } ?>

								<!-- ------------ -->

								<!-- total bonus affiliasi -->
								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php  
										$this->db->select_sum('bonus');
										$bonus_aff = $this->db->get_where('tbl_bonus',['kode_member' => $data['kode_member']])->row_array();
										if ($bonus_aff == true) {
											echo $bonus_aff['bonus'];
											$bns_aff += $bonus_aff['bonus'];
										}else{
											echo "0";
										}
										?>
									</td>
								<?php } ?>



								<!-- total bonus affiliasi saat ini -->
								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										$bonus2 = $this->db->get_where('tbl_total_bonus',['kode_member' => $data['kode_member']])->row_array();
										if ($bonus2 == true) {
											echo $bonus2['total_bonus'];
											$bns_aff2 += $bonus2['total_bonus'];
										}else{
											echo "0";
										}
										?>
									</td>
								<?php } ?>

								<?php if ($cek != $data['kode_member']) { ?>
									<td rowspan="<?= $row ?>">
										<?php 
										$wt_aff = $this->db->get_where('tbl_witdraw',['kode_member' => $data['kode_member']])->row_array();
										if ($wt_aff == true) {
											echo $wt_aff['penarikan'];
											$wt_afiliasi += $wt_aff['penarikan'];
										}else{
											echo "0";
										}
										?>
									</td>
								<?php } ?>

							</tr>
							<!-- ---------------------- -->



							<!-- table tanpa row -->

						<?php }else{ ?>
							<tr>
								<td><?= $data['kode_member'] ?></td>
								<td><?= "Rp " . number_format($data['harga'],0,',','.');  ?></td>
								<?php $total_harga2 += $data['harga']; ?>
								<td>
									<?php if ($data['jumlah_topup'] < 10) {
										echo $data['jumlah_topup'];
										$paket1 += $data['jumlah_topup'];
									} ?>
								</td>


								<td> 
									<?php if ($data['jumlah_topup'] >= 10) {
										echo $data['jumlah_topup'];
										$paket2 += $data['jumlah_topup'];
									} ?>
								</td>


								<!-- total stok -->

								<td>
									<?php 
									if ($produk != '') {
										$this->db->where('produk', $produk);
									}elseif (isset($tgl_awal1)) {
										$this->db->where("date BETWEEN '$tgl_awal1' AND '$tgl_akhir1'");
									}
									$this->db->select_sum('jumlah_topup');
									$this->db->where('produk','ratu merak');
									$stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
									echo  $stok['jumlah_topup'] * 10;
									$total_stok_merak += $stok['jumlah_topup'] * 10;
									?>
								</td>

								<td>
									<?php 
									if ($produk != '') {
										$this->db->where('produk', $produk);
									}elseif (isset($tgl_awal1)) {
										echo $tgl_awal1;
										$this->db->where("date BETWEEN '$tgl_awal1' AND '$tgl_akhir1'");
									}
									$this->db->select_sum('jumlah_topup');
									$this->db->where('produk','markisa');
									$stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
									echo  $stok['jumlah_topup'] * 10;
									$total_stok_markisa += $stok['jumlah_topup'] * 10;
									?>
								</td>
								<!--  --------------- -->


								
								<!-- stok perproduk -->
								<td>
									<?php 
									if ($produk == 'ratu merak' || $produk == '' ) {
										$this->db->where('kode_member', $data['kode_member']);
										$total_merak = $this->db->get('tbl_stok')->row_array();
										echo $total_merak['jumlah_stok'];
										$stok_perproduk1 += $total_merak['jumlah_stok'];

									}else{
										echo "-";
									}

									?>
								</td>

								<td>
									<?php 
									if ($produk == 'markisa' || $produk == '' ) {
										$this->db->where('kode_member', $data['kode_member']);
										$total_markisa = $this->db->get('tbl_stok_markisa')->row_array();
										echo $total_markisa['jumlah_stok'];
										$stok_perproduk2 += $total_markisa['jumlah_stok'];
									}else{
										echo "-";
									}

									?>
								</td>

								<!-- ----- -->



								<td>
									<?php 
									if ($produk == 'ratu merak' || $produk == '' ) {
										$this->db->select_sum('qty');
										$this->db->where('kode_member', $data['kode_member']);
										$this->db->where('produk', 'ratumerak');
										$stok_keluar11 = $this->db->get('tbl_order')->row_array();
										echo $stok_keluar11['qty'];
										$stok_keluar1 +=  $stok_keluar11['qty'];

									}else{
										echo "-";
									}

									?>
								</td>

								<td>
									<?php 
									if ($produk == 'markisa' || $produk == '' ) {
										$this->db->select_sum('qty');
										$this->db->where('kode_member', $data['kode_member']);
										$this->db->where('produk', 'markisa');
										$stok_keluar22 = $this->db->get('tbl_order')->row_array();
										echo $stok_keluar22['qty'];
										$stok_keluar2 +=  $stok_keluar22['qty'];
									}else{
										echo "-";
									}

									?>
								</td>

								<!-- stok bonus topup -->

								<td>
									<?php 
									if ($produk == 'ratu merak' || $produk == '' ) {
										$this->db->where('kode_member', $data['kode_member']);
										$this->db->select_sum('bonus');
										$this->db->where('produk','ratu merak');
										if (isset($tgl_awal)) {
											$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
										}
										$stok_b1 = $this->db->get('tbl_bonus_topup')->row_array();
										echo $stok_b1['bonus'];
										$total_bonus_topup1 += $stok_b1['bonus'];

									}else{
										echo "-";
									}

									?>
								</td>

								<td>
									<?php 
									if ($produk == 'markisa' || $produk == '' ) {
										$this->db->where('kode_member',$data['kode_member']);
										$this->db->select_sum('bonus');
										$this->db->where('produk','markisa');
										if (isset($tgl_awal)) {
											$this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
										}
										$stok_b2 = $this->db->get('tbl_bonus_topup')->row_array();
										echo $stok_b2['bonus'];
										$total_bonus_topup2 += $stok_b2['bonus'];
									}else{
										echo "-";
									}


									?>
								</td>
								<!-- -------------- -->


								<td>

									<?php 
									if ($produk == 'ratu merak' || $produk == '' ) {
										$stok_bns1 = $this->db->get_where('tbl_bonus_topup_ratumerak',['kode_member' => $data['kode_member']])->row_array();
										echo $stok_bns1['total_stok_bonus'];
										$stok_bnsperproduk1 += $stok_bns1['total_stok_bonus'];
									}else{
										echo "-";
									}
									?>
								</td>

								<td>
									<?php 
									if ($produk == 'markisa' || $produk == '' ) {
										$stok_bns2 = $this->db->get_where('tbl_bonus_topup_markisa',['kode_member' => $data['kode_member']])->row_array();
										echo $stok_bns2['total_stok_bonus'];
										$stok_bnsperproduk2 += $stok_bns2['total_stok_bonus'];
									}else{
										echo "-";
									}
									?>

								</td>

								<!-- stok bnonus keluar -->
								<td>
									<?php   if ($produk == 'ratu merak' || $produk == '' ) { ?>
										<?php 
										$this->db->select_sum('qty');
										$this->db->where('kode_member', $data['kode_member']);
										$this->db->where('produk', 'bonus ratumerak');
										$stok_bnskeluar1 = $this->db->get('tbl_order')->row_array();
										echo $stok_bnskeluar1['qty'];
										$stok_bns_k1 += $stok_bnskeluar1['qty'];
									}else{
										echo "-";

									}
									?>

								</td>

								<td>
									<?php   if ($produk == 'markisa' || $produk == '' ) { ?>
										<?php 
										$this->db->select_sum('qty');
										$this->db->where('kode_member', $data['kode_member']);
										$this->db->where('produk', 'bonus markisa');
										$stok_bnskeluar2 = $this->db->get('tbl_order')->row_array();
										echo $stok_bnskeluar2['qty'];
										$stok_bns_k2 += $stok_bnskeluar2['qty'];
									}else{
										echo "-";
									}
									?>

								</td>

								<!-- --------- -->


								<!-- total Cashbak -->
								<td>
									<?php   if ($produk == 'ratu merak' || $produk == '' ) { ?>
										<?php
										$total_bns_cashback1 = $this->db->get_where('tbl_bonus_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
										if ($total_bns_cashback1 == true) {
											echo $total_bns_cashback1['bonus_cashback'];
											$bns_merak += $total_bns_cashback1['bonus_cashback'];
										}else{
											echo "0";
										}
										?>
									<?php   }else{
										echo "-";
									} ?>
								</td>
								<td>
									<?php   if ($produk == 'markisa' || $produk == '') { ?>
										<?php 
										$total_bns_cashback2 = $this->db->get_where('tbl_bonus_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
										if ($total_bns_cashback2 == true) {
											echo $total_bns_cashback2['bonus_cashback'];
											$bns_markisa += $total_bns_cashback2['bonus_cashback'];
										}else{
											echo "0";
										}
										?>
									<?php   }else{
										echo "-";
									} ?>
								</td>
								<!-- ----------- -->

								<!-- total Cashbak saat ini -->
								<td>
									<?php   if ($produk == 'ratu merak' || $produk == '' ) { ?>
										<?php
										$bns_cashback1 = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
										if ($bns_cashback1 == true) {
											echo $bns_cashback1['total_bonus'];
											$bns_merak_saatini += $bns_cashback1['total_bonus'];
										}else{
											echo "0";
										}
										?>
									<?php   }else{
										echo "-";
									} ?>
								</td>
								<td>
									<?php   if ($produk == 'markisa' || $produk == '') { ?>
										<?php 
										$bns_cashback2 = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
										if ($bns_cashback2 == true) {
											echo $bns_cashback2['total_bonus'];
											$bns_markisa_saatini += $bns_cashback2['total_bonus'];
										}else{
											echo "0";
										}
										?>
									<?php   }else{
										echo "-";
									} ?>
								</td>
								<!-- ----------- -->


								<td>
									<?php   if ($produk == 'ratu merak' || $produk == '') { ?>
										<?php 
										$this->db->select_sum('penarikan');
										$this->db->where('status', 1);
										$wt_bonus1 = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
										if ($wt_bonus1 == true) {
											echo $wt_bonus1['penarikan'];
											$wt_merak += $wt_bonus1['penarikan'];
										}else{
											echo "0";
										}
										?>
									<?php   }else{
										echo "-";
									} ?>
								</td>
								<td>
									<?php   if ($produk == 'markisa' || $produk == '') { ?>
										<?php 
										$this->db->select_sum('penarikan');
										$this->db->where('status', 1);
										$wt_bonus2 = $this->db->get_where('tbl_witdraw_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
										if ($wt_bonus2 == true) {
											echo $wt_bonus2['penarikan'];
											$wt_markisa += $wt_bonus2['penarikan'];
										}else{
											echo "0";
										}
										?>
									<?php   }else{
										echo "-";
									} ?>
								</td>


								<!-- bonus affiliasi -->
								<td>
									<?php 
									$this->db->select_sum('bonus');
									$bonus_aff = $this->db->get_where('tbl_bonus',['kode_member' => $data['kode_member']])->row_array();
									if ($bonus_aff == true) {
										echo $bonus_aff['bonus'];
										$bns_aff += $bonus_aff['bonus'];
									}else{
										echo "0";
									}
									?>
								</td>

								<!-- --------- -->

								<!-- bonus affiliasi saat ini -->

								<td>
									<?php 
									$bonus2 = $this->db->get_where('tbl_total_bonus',['kode_member' => $data['kode_member']])->row_array();
									if ($bonus2 == true) {
										echo $bonus2['total_bonus'];
										$bns_aff2 += $bonus2['total_bonus'];
									}else{
										echo "0";
									}
									?>
								</td>
								<!-- --------- -->


								<!-- wt affilias  --> 
								<td>
									<?php 
									$wt_aff = $this->db->get_where('tbl_witdraw',['kode_member' => $data['kode_member']])->row_array();
									if ($wt_aff == true) {
										echo $wt_aff['penarikan'];
										$wt_afiliasi += $wt_aff['penarikan'];
									}else{
										echo "0";
									}
									?>
								</td>

								<!-- ------- -->
							</tr>
						<?php } ?>
						<?php $cek = $data['kode_member'] ?>
						<!-- <?php  $stok_bonus += $bonus ?> -->
						<!-- <?php  $cashback1 += $bns_cashback1['total_bonus']; ?> -->


					<?php } ?>

					<tfoot>
						<tr style="font-size: 10px; background-color: orange; color: white;">
							<td>Total</td>
							<td><?= "Rp " . number_format($total_harga2,0,',','.');  ?>  </td>
							<td><?= $paket1 ?></td>
							<td><?= $paket2 ?></td>
							<td><?= $total_stok_merak ?></td>
							<td><?= $total_stok_markisa ?></td>

							<td><?= $stok_perproduk1 ?></td>
							<td><?= $stok_perproduk2 ?></td>

							<td><?= $stok_keluar1 ?></td>
							<td><?= $stok_keluar2 ?></td>

							<td><?= $total_bonus_topup1 ?></td>
							<td><?= $total_bonus_topup2 ?></td>

							<td><?= $stok_bnsperproduk1 ?></td>
							<td><?= $stok_bnsperproduk2 ?></td>
							<td><?= $stok_bns_k1 ?></td>
							<td><?= $stok_bns_k2 ?></td>
							<td><?= "Rp " . number_format($bns_merak,0,',','.');  ?></td>
							<td><?= "Rp " . number_format($bns_markisa,0,',','.');  ?></td>
							<td><?= "Rp " . number_format($bns_merak_saatini,0,',','.');  ?></td>
							<td><?= "Rp " . number_format($bns_markisa_saatini,0,',','.');  ?></td>

							<td><?= "Rp " . number_format($wt_merak,0,',','.');  ?> </td>
							<td><?= "Rp " . number_format($wt_markisa,0,',','.');  ?></td>
							<td><?= "Rp " . number_format($bns_aff,0,',','.');  ?></td>
							<td><?= "Rp " . number_format($bns_aff2,0,',','.');  ?></td>
							<td><?= "Rp " . number_format($wt_afiliasi,0,',','.');  ?></td>
						</tr>
					</tfoot>


				</table>
				<hr>
<!-- <h6>Jumlah Total Qty Stok : <?= $jml_topup['jumlah_topup'] * 10 ?> Qty </h6>
<h6>Jumlah Total Uang: <?= "Rp " . number_format($jml_uang['harga'],0,',','.');  ?> </h6>
-->
<!-- 
    <table border="1" cellspacing="0">
      <tr>
        <th>Kode Member</th>
        <th>Topup</th>
        <th>Harga</th>
      </tr>

      <?php foreach ($po as $data) { ?>
        <?php $top = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->result_array(); ?>
        <?php $row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows(); ?>
        <?php if ($row > 1) { ?>
         <tr>
          <td rowspan="<?= $row ?>"><?= $data['kode_member'] ?></td>
          <?php foreach ($top as $dat) {  ?>
            <td><?= $no++ ?></td>
            <td><?= $dat['jumlah_topup'] ?></td>
            <td><?= $dat['harga'] ?></td>
          </tr>
        <?php } ?>
      <?php }else{ ?>
        <?php foreach ($top as $dat) {  ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['kode_member'] ?></td>
            <td><?= $dat['jumlah_topup'] ?></td>
            <td><?= $dat['harga'] ?></td>
          </tr>
        <?php } ?>
      <?php } ?>
    <?php } ?>


</table> -->

<br>

     <!--  <table border="1" cellspacing="0">
       <tr>
        <th>No</th>
        <th>Nama </th>
        <th>Hobi</th>
      </tr>
      <tr>
        <td rowspan="2">1</td>
        <td rowspan="2">Zikri Febrian</td>
        <td>Renang</td>
      </tr>
      <tr>
        <td>Bola Kaki</td>
      </tr>
  </table> -->


     <!--  <table border="1" cellspacing="0">
        <tr>
         <th rowspan="2">No</th>
         <th rowspan="2">NIM</th>
         <th rowspan="2">Nama</th>
         <th colspan="3" width="30%">DATA NILAI</th>
       </tr>
       <tr>
         <td>UTS</td>
         <td>UAS</td>
         <td>IPK</td>
       </tr>
       <tr>
         <td>1</td>
         <td>160210056</td>
         <td>Zikri Febrian</td>
         <td>85</td>
         <td>90</td>
         <td>A</td>
       </tr>
       <tr>
         <td>2</td>
         <td>160210070</td>
         <td>Raja Zulfiando</td>
         <td>80</td>
         <td>75</td>
         <td>B</td>
       </tr>
   </table> -->
</div>
</div>
</div>

</div>



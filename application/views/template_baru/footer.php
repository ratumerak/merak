<style>

	@media (min-width: 576px) {

		#footerMobile{

			display: none;

		}


	}

</style>


<style>

	@media (max-width: 576px) {
		.text-menu-footer{
			font-size: 10px;
		}

	}

</style>

<div id="footerMobile" class="fixed-bottom" style="background-color: #9500ff; height: 60px; box-shadow: 5px 10px 8px #888888;">

	<div class="container">

		<div class="row">

			<div class="col-1">



			</div>

			<div class="col-10">

				<div class="row">

					<div class="col-3">

						<center>

							<a href="<?= base_url('utama/') ?>">

								<i class="fas fa-home mt-2" style="font-size: 20px; color: white;"></i><br>

								<label class="text-menu-footer" style="color: white;">Home</label>
							</a>

						</center>

					</div>

					<?php 
					$user = $this->db->get_where('tbl_member', ['kode_member' => $this->session->kode_member])->row_array();
					?>
					<?php if ($user == false) {?>


						<div class="col-3">
							<center>
								<a href="<?= base_url('utama/topup') ?>">
									<i class="fas fa-arrow-up mt-2" style="font-size: 20px; color: white;" ></i><br>
									<label class="text-menu-footer" style="color: white;">Topup</label>
								</a>
							</center>
						</div>
					<?php }else{?>
						<div class="col-3">
							<center>
								<a href="<?= base_url('utama/order') ?>">
									<i class="fas fa-shopping-bag mt-2" style="font-size: 20px; color: white;" ></i><br>
									<label class="text-menu-footer" style="color: white;">Order</label>
								</a>
							</center>
						</div>

					<?php } ?>


					<div class="col-3">
						<center>   
							<a href="<?= base_url('utama/Withdraw') ?>">
								<i class="fas fa-money-bill mt-2" style="font-size: 20px; color: white;"></i><br>
								<label class="text-menu-footer" style="color: white;"> Withdraw</label>
							</a>
						</center>
					</div>

					<?php if ($user == false) {?>


						<div class="col-3">
							<center>
								<a href="<?= base_url('utama/data_bonus') ?>">
									<i class="fas fa-coins mt-2" style="font-size: 20px; color: white;"></i><br>
									<label class="text-menu-footer" style="color: white;"> Bonus</label>
								</a>
							</center>
						</div>
					<?php }else{ ?>


						<div class="col-3">
							<center>
								<a href="<?= base_url('utama/topup') ?>">
									<i class="fas fa-arrow-up mt-2" style="font-size: 20px; color: white;"></i><br>
									<label class="text-menu-footer" style="color: white;"> Topup</label>
								</a>
							</center>
						</div>
					<?php } ?>


				</div>

			</div>
			<div class="col-1">
			</div>
		</div>
	</div>

</div> 
<!-- <footer class="footer">

          <div class="d-sm-flex justify-content-center justify-content-sm-between">

            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>

            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>

          </div>

          <div class="d-sm-flex justify-content-center justify-content-sm-between">

            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 

          </div>

      </footer>  -->

      <!-- partial -->

  </div>

  <!-- main-panel ends -->

</div>   

<!-- page-body-wrapper ends -->

</div>

<!-- container-scroller -->



<!-- plugins:js -->

<script src="<?= base_url('assets_baru/') ?>vendors/js/vendor.bundle.base.js"></script>

<!-- endinject -->

<!-- Plugin js for this page -->

<script src="<?= base_url('assets_baru/') ?>vendors/chart.js/Chart.min.js"></script>

<script src="<?= base_url('assets_baru/') ?>vendors/datatables.net/jquery.dataTables.js"></script>

<script src="<?= base_url('assets_baru/') ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>

<script src="<?= base_url('assets_baru/') ?>js/dataTables.select.min.js"></script>



<!-- End plugin js for this page -->

<!-- inject:js -->

<script src="<?= base_url('assets_baru/') ?>js/off-canvas.js"></script>

<script src="<?= base_url('assets_baru/') ?>js/hoverable-collapse.js"></script>

<script src="<?= base_url('assets_baru/') ?>js/template.js"></script>

<script src="<?= base_url('assets_baru/') ?>js/settings.js"></script>

<script src="<?= base_url('assets_baru/') ?>js/todolist.js"></script>

<!-- endinject -->

<!-- Custom js for this page-->

<script src="<?= base_url('assets_baru/') ?>js/dashboard.js"></script>

<script src="<?= base_url('assets_baru/') ?>js/Chart.roundedBarCharts.js"></script>

<!-- End custom js for this page-->





<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="<?php echo base_url() ?>assets/alert.js"></script>

<?php echo "<script>".$this->session->flashdata('message')."</script>"?>

<?php $this->session->unset_userdata('message') ?>
<?php $this->session->unset_userdata('login') ?>






<script>







	$(document).ready(function(){



            // select prov



            $("#prov").change(function(){

            	var id = $(this).val()

            	var url = "<?= base_url('utama/kab?id=') ?>"+id;

            	$("#kab").load(url);

            })



            // select kab

            $("#kab").change(function(){

            	var id = $(this).val()

            	var url = "<?= base_url('utama/kec2?id=') ?>"+id;

            	$("#kec").load(url);

            })





            // select kec



            $("#kec").change(function(){

            	var id = $(this).val()

            	var url = "<?= base_url('utama/kel?id=') ?>"+id;

            	$("#kel").load(url);



            })







        })



    </script>



    <script>

    	$('#myModal').modal('show')

    </script>



    <script>

    	function bacaGambar(input) {

    		if (input.files && input.files[0]) {

    			var reader = new FileReader();



    			reader.onload = function (e) {

    				$('#gambar_nodin').attr('src', e.target.result);

    			}



    			reader.readAsDataURL(input.files[0]);

    		}

    	}



    	$("#preview_gambar").change(function(){

    		bacaGambar(this);

    	});

    </script>





</script>



<script>

	$(document).ready(function(){



		$("#save").click(function(){



			$("#load2").show();

		})

	})

</script>

</body>



</html>

</body>



</html>




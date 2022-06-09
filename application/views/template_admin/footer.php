<footer class="sticky-footer bg-white">
                <!-- <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                  </div> -->
                </footer>
                <!-- End of Footer -->

              </div>
              <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="<?= base_url('login_admin/logout') ?>">Logout</a>
                </div>
              </div>
            </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

          <!-- Bootstrap core JavaScript-->
          <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
          <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
          <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Core plugin JavaScript-->
          <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Custom scripts for all pages-->
          <script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

          <!-- Page level plugins -->
          <script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>

          <!-- Page level custom scripts -->
          <script src="<?= base_url('assets/') ?>js/demo/chart-area-demo.js"></script>
          <script src="<?= base_url('assets/') ?>js/demo/chart-pie-demo.js"></script>
          <script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
          <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
          <script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
          <script src="<?php echo base_url() ?>assets/alert.js"></script>
          <?php echo "<script>".$this->session->flashdata('message')."</script>"?>
          <?php $this->session->unset_userdata('message') ?>
          <?php $this->session->unset_userdata('message_admin') ?>


          <script>



            $(document).ready(function(){

             $("#store").change(function(){
              var id = $(this).val()
              var url = "<?= base_url('admin/kab?id=') ?>"+id;
              var url2 = "<?= base_url('admin/list_kec?id=') ?>"+id;
              $("#kab").load(url);
              $("#list_kec").load(url2);
            })


            // select prov

           // $("#prov").change(function(){
           //      var id = $(this).val()
           //      var url = "<?= base_url('utama/kab?id=') ?>"+id;
           //      $("#kab").load(url);
           // })

            // select kab
            $("#kab").change(function(){
              var id = $(this).val()
              var url = "<?= base_url('admin/kec?id=') ?>"+id;
              $("#kec").load(url);
            })


            // select kec

           //  $("#kec").change(function(){
           //      var id = $(this).val()
           //      var url = "<?= base_url('utama/kel?id=') ?>"+id;
           //      $("#kel").load(url);

           // })


            // $("#kel").change(function(){

            //     var id_kel =$(this).val()
            //     var get =  "<?= base_url('ebunga/get_produk?id=') ?>"+id_kel;
            //      var get2 =  "<?= base_url('ebunga/load') ?>";
            //     $("#loading").show();
            //       setTimeout(function () {
            //           $("#produk").load(get);
            //              $("#loading").load(get2);

            //         }, 1000); 

            // })

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


 </body>

 </html>
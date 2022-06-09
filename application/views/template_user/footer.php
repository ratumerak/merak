      <!-- <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer> -->
    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="<?= base_url() ?>/assets2/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>/assets2/js/core/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>/assets2/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets2/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assets2/js/material-dashboard.min.js?v=3.0.0"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>assets2/alert.js"></script>
     <?php echo "<script>".$this->session->flashdata('message')."</script>"?>


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
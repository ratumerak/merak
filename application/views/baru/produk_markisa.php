<div class="main-panel" id="app">
        <div class="content-wrapper">
          <div class="row"> 
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Order Produk Markisa</h4>

                   <img class="d-block w-100" src="<?= base_url('assets_baru/images/ratumar.png') ?>" alt=""  style="border-radius: 10px;">

                   <div class="mt-2 alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Hello <?= $this->session->username ?>. </strong> Ayoo order produk markisa dengean harga Rp.1200.000 anda mendapatkan 10 stok paket paroduk markisa dan dapatkan keuntungannya.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="display:none;">
                      <strong>Hello <?= $this->session->username ?>. </strong> Mohon maaf anda sudah melakukan order produk markisa, untuk meningkatkan stok produk markisa anda silahkan melakukan topup <a href="<?= base_url('utama/topup') ?>" style="color:black"><b>Disini</b></a>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                   
                  

                       <p class="card-text mt-3" style="font-weight: bold;">Markisa merupakan beras premium dengan kualitas baik, dengan harga yang terjangkau. 1 X Order produk markisa anda mendapatkan 10 sak beras produk markisa.</p>
                       <form id="payment-form" method="post" action="<?=site_url()?>/snap_markisa/finish">

                         <input type="hidden" name="result_type" id="result-type" value="">

                        <input type="hidden" name="result_data" id="result-data" value="">

                        <input type="hidden" name="nama" id="nama" value="<?= $this->session->username ?>">

                         <input type="hidden" name="email" id="email" value="<?= $this->session->email ?>">

                        <input type="hidden" name="kode_member" id="kode_member" value="<?= $this->session->kode_member ?>">

                        <input type="hidden" name="nama_produk" id="nama_produk" value="markisa">

                        <input type="hidden" name="harga" id="harga" value="1200000">
                      </form>

                       <?php 
                          if ($cek == true) { 
                        ?>
                          <a href="#" class="btn btn-primary btn-block" id="btn-markisa">Order Markisa</a>
                      <?php }else{ ?>
                            <button type="submit" class="btn btn-primary btn-block" id="pay-button">Order Markisa</button>
                      <?php } ?>
                

                  
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
      
        <!-- content-wrapper ends -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
        $(document).ready(function(){

            $("#btn-markisa").click(function(){
    $("#alert").show();
            })
        })
    </script> 


    <script>

  

  

    $('#pay-button').click(function (event) {

      event.preventDefault();

      $(this).attr("disabled", "disabled");



      var nama  = $("#nama").val();

      var email = $("#email").val();

      var kode_member = $("#email").val();

      var nama_produk = $("#nama_produk").val();

      var harga = $("#harga").val();

    

    $.ajax({

      type : 'POST',

      url: '<?=site_url()?>/snap_markisa/token',

      data : {

        nama : nama,

        email : email,

        kode_member : kode_member,

        harga : harga,

        nama_produk : nama_produk,



      },

      cache: false,



      success: function(data) {

        //location = data;



        console.log('token = '+data);

        

        var resultType = document.getElementById('result-type');

        var resultData = document.getElementById('result-data');



        function changeResult(type,data){

          $("#result-type").val(type);

          $("#result-data").val(JSON.stringify(data));

          //resultType.innerHTML = type;

          //resultData.innerHTML = JSON.stringify(data);

        }



        snap.pay(data, {

          

          onSuccess: function(result){

            changeResult('success', result);

            console.log(result.status_message);

            console.log(result);

            $("#payment-form").submit();

          },

          onPending: function(result){

            changeResult('pending', result);

            console.log(result.status_message);

            $("#payment-form").submit();

          },

          onError: function(result){

            changeResult('error', result);

            console.log(result.status_message);

            $("#payment-form").submit();

          }

        });

      }

    });

  });



  </script>

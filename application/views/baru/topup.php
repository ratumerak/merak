
</style>
<div class="main-panel" >
  <div class="content-wrapper">
    <div class="row"> 
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body" id="app">
            <h4 class="card-title">Topup Produk</h4>

            <img class="d-block w-100 mb-3" src="<?= base_url('assets_baru/images/topup.png') ?>" alt="Second slide" style="border-radius: 10px;">

            

            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a :class="{ active: ratumerak, 'bg-primary text-white': color1 }" class="nav-link" @click="topupMerak" href="#">Topup Ratumerak</a>
              </li>
              <li class="nav-item">
                <a  :class="{ active: markisa, 'bg-primary text-white': color2 }" class="nav-link" @click="topupMarkisa" href="#">Topup Markisa</a>
              </li>
              ;
            </ul>

            <div class="row">

              <div class="col-sm-12" id="ratu">

                <div class="card">

                  <div class="card-body">

                    <h5 class="card-title text-primary"> Topup Produk Ratumerak</h5>
                    <hr>

                    
                    

                    <div class="form-group">

                      <label>Jumlah Paket</label>

                      <input type="number" name="paket" v-model="paket" min="1" class="form-control" >

                    </div>



                    <div class="form-group">

                      <label>Jumlah Qty</label>

                      <input type="number" readonly="" name="qty" v-model="stok()" class="form-control">

                    </div>

                    

                    <div class="form-group">

                      <label>Total Harga</label>

                      <p style="font-weight: bold">{{formatRp(total_harga())}}</p>

                    </div>

                    

                    <form id="payment-form" method="post" action="<?=site_url()?>/snap_topup/finish">

                      <input type="hidden" name="result_type" id="result-type" value="">

                      <input type="hidden" name="result_data" id="result-data" value="">

                      <input type="hidden" id="nama_produk" name="produk" value="ratu merak">

                      <input type="hidden" id="paket" name="paket" v-model="paket">

                      <input type="hidden" id="slug" name="slug" value="ratu-merak">

                      <input type="hidden" id="harga" name="harga" v-model="total_harga()">

                      <input type="hidden" id="qty" name="qty" v-model="stok()">

                      <input type="hidden" id="kode_member" name="kode_member" value="<?= $this->session->kode_member ?>">

                      <input type="hidden" id="nama" name="nama" value="<?= $this->session->username ?>">

                    </form>

                    <button v-if="cek_paket2() == false " class="btn btn-primary btn btn-block" onclick="swal('Opps!', 'JUmlah paket tidak boleh kurang dari 1', 'warning' )" >Topup ratumerak</button>

                    <button v-else="" id="pay-button" class="btn btn-primary btn btn-block"><i class="fas fa-credit-card"></i>  Topup ratumerak</button>

                    

                    

                  </div>

                </div>

              </div>
              <hr>

              <div class="col-sm-12" id="markisa" style="display:none;">

                <div class="card">

                  <div class="card-body">

                    <h5 class="card-title text-primary"><i class="fas fa-up-to-line"></i> Topup Produk Markisa</h5>
                    <hr>
                    
                    

                    <div class="form-group">

                      <label>Jumlah Paket</label>

                      <input type="number" name="paket" v-model="paket_markisa" min="1" class="form-control">

                    </div>



                    <div class="form-group">

                      <label>Jumlah Qty</label>

                      <input type="number" readonly="" name="qty" v-model="stokMarkisa()" class="form-control">

                    </div>



                    <div class="form-group">

                      <label>Total Harga</label>

                      <p style="font-weight: bold">{{formatRp(total_harga_markisa())}}</p>

                    </div> 



                    <form id="payment-form2" method="post" action="<?=site_url()?>/snap_topup_markisa/finish">

                      <input type="hidden" name="result_type2" id="result-type2" value="">

                      <input type="hidden" name="result_data2" id="result-data2" value="">

                      <input type="hidden" id="nama_produk2" name="produk2" value="markisa">

                      <input type="hidden" id="paket2" name="paket2" v-model="paket_markisa">

                      <input type="hidden" id="slug2" name="slug2" value="markisa">

                      <input type="hidden" id="harga2" name="harga2" v-model="total_harga_markisa()">

                      <input type="hidden" id="qty2" name="qty2" v-model="stokMarkisa()">

                      <input type="hidden" id="kode_member2" name="kode_member2" value="<?= $this->session->kode_member ?>">

                      <input type="hidden" id="nama2" name="nama2" value="<?= $this->session->username ?>">

                    </form>



                    <button v-if="cek_paket() == false " class="btn btn-primary btn btn-block" onclick="swal('Opps!', 'JUmlah paket tidak boleh kurang dari 1', 'warning' )" >Topup markisa </button>

                    <button v-else="" id="pay-button2" class="btn btn-primary btn btn-block"><i class="fas fa-credit-card"></i> Topup markisa</button>                       

                    



                  </div>

                </div>

              </div>

            </div>

            
            
          </div>
        </div>
      </div>
      
      
    </div>
  </div>
  <!-- content-wrapper ends -->
  <?php 

  $harga_ratumerak = $ratu_merak['harga'];

  $markisa = $markisa['harga'];

  ?>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>

  <script>

    var app = new Vue({

      el: '#app',

      data: {

        hargaratumerak : "<?= $harga_ratumerak ?>",

        hargamarkisa : "<?= $markisa ?>",

        paket : 1,

        qty : 10,



        paket_markisa : 1,

        qty_markisa : 10,

        bonus : 4,

        ratumerak : true,
        color1 : true,
        color2 : false,
        markisa : false,

      },



      methods : {



        stok : function(){



          return Number(this.paket) * Number(this.qty);

        },



        total_harga : function(){



          return Number(this.hargaratumerak) * Number(this.paket);

        }, 



        formatRp : function(nilai){



          const numb = Number(nilai);

          const format = numb.toString().split('').reverse().join('');

          const convert = format.match(/\d{1,3}/g);

          const rupiah = 'Rp ' + convert.join('.').split('').reverse().join('');

          return rupiah;

        },



        stokMarkisa : function(){



          return Number(this.paket_markisa) * Number(this.qty_markisa);

        },



        total_harga_markisa : function(){



          return Number(this.hargamarkisa) * Number(this.paket_markisa);

        },



        cek_paket : function(){



          if (this.paket_markisa < 1) {

            return false

          }else{

            return true

          }

        },



        cek_paket2 : function(){



          if (this.paket < 1) {

            return false

          }else{

            return true

          }

        },

        topupMerak : function(){

          this.ratumerak = true;
          this.color1 = true;
          this.color2 = false;
          this.markisa = false;
          $("#markisa").hide();
          $("#ratu").show();


        },

        topupMarkisa : function(){
         this.color1 = false;
         this.color2 = true;
         this.markisa = true;
         this.ratumerak = false;
         $("#markisa").show();
         $("#ratu").hide();


       }







     }

   })

 </script>




 <script type="text/javascript">



  $('#pay-button').click(function (event) {

    event.preventDefault();

    $(this).attr("disabled", "disabled");



    var nama  = $("#nama").val();

    var email = $("#email").val();

    var kode_member = $("#email").val();

    var nama_produk = $("#nama_produk").val();

    var harga = $("#harga").val();

    var slug = $("#slug").val();

    var paket = $("#paket").val();

    var qty = $("#qty").val();



    $.ajax({

      type : 'POST',

      url: '<?=site_url()?>/snap_topup/token',

      data : {

        nama : nama,

        email : email,

        kode_member : kode_member,

        harga : harga,

        nama_produk : nama_produk,

        slug : slug,

        paket : paket,

        qty : qty,



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



<script type="text/javascript">



  $('#pay-button2').click(function (event) {

    event.preventDefault();

    $(this).attr("disabled", "disabled");



    var nama  = $("#nama2").val();

    var email = $("#email2").val();

    var kode_member = $("#email2").val();

    var nama_produk = $("#nama_produk2").val();

    var harga = $("#harga2").val();

    var slug = $("#slug2").val();

    var paket = $("#paket2").val();

    var qty = $("#qty2").val();



    $.ajax({

      type : 'POST',

      url: '<?=site_url()?>/snap_topup_markisa/token',

      data : {

        nama : nama,

        email : email,

        kode_member : kode_member,

        harga : harga,

        nama_produk : nama_produk,

        slug : slug,

        paket : paket,

        qty : qty,



      },

      cache: false,



      success: function(data) {

        //location = data;



        console.log('token = '+data);

        

        var resultType = document.getElementById('result-type2');

        var resultData = document.getElementById('result-data2');



        function changeResult(type,data){

          $("#result-type2").val(type);

          $("#result-data2").val(JSON.stringify(data));

          //resultType.innerHTML = type;

          //resultData.innerHTML = JSON.stringify(data);

        }



        snap.pay(data, {



          onSuccess: function(result){

            changeResult('success', result);

            console.log(result.status_message);

            console.log(result);

            $("#payment-form2").submit();

          },

          onPending: function(result){

            changeResult('pending', result);

            console.log(result.status_message);

            $("#payment-form2").submit();

          },

          onError: function(result){

            changeResult('error', result);

            console.log(result.status_message);

            $("#payment-form2").submit();

          }

        });

      }

    });

  });



</script>


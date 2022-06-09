 <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-arrow-circle-up"></i> Topup</h6>
        </div>
        <div class="card-body">
            <div class="row">

              <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Well done!</h4>
              <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
              <hr>
              <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
            
            <?php echo $this->session->flashdata('message') ?>
                
                

                <div class="row" id="app">
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Ratu Merak</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
			  <button v-if="cek_paket2() == false " class="btn btn-primary btn btn-block" onclick="swal('Opps!', 'JUmlah paket tidak boleh kurang dari 1', 'warning' )" >Topup markisa</button>
                          <button v-else="" id="pay-button" class="btn btn-primary btn btn-block">Topup ratumerak</button>
                         
                       
                        
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Merkisa</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
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
			<?php if ($cek_produk_markisa == false) { ?>
                            <button class="btn btn-primary btn btn-block" onclick="swal('Opps!', 'Anda harus membeli produk markisa terlebih dahulu', 'warning' )">Topup markisa</button>
                        <?php }else{ ?>
                         <button v-if="cek_paket() == false " class="btn btn-primary btn btn-block" onclick="swal('Opps!', 'JUmlah paket tidak boleh kurang dari 1', 'warning' )" >Topup markisa</button>
			  <button v-else="" id="pay-button2" class="btn btn-primary btn btn-block">Topup markisa</button>                       
			 <?php } ?>

                       
                     <!--    <form method="post" action="">
                          <input type="hidden" name="produk" value="markisa">
                          <input type="hidden" name="slug" value="markisa">
                          <input type="hidden" name="harga" v-model="total_harga_markisa()">
                          <input type="hidden" name="qty" v-model="stokMarkisa()">
                          <input type="submit" name="kirim_markisa" class="btn btn-primary btn-block" value="Topup Markisa">
                        </form> -->

                      
                      </div>
                    </div>
                  </div>
                </div>

              
            </div>



        
        </div>
    </div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Isi Profil Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('utama/profil') ?>">
                 <div class="form-group">
                 <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
                 </div>

                 <div class="form-group">
                 <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                        <option>Laki - Laki</option>
                        <option>Perempuan</option>
                    </select>
                 </div>
                 <div class="form-group">
                 <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control"  required="">
                 </div>

                 <div class="form-group">
                 <label for="exampleInputEmail1">Tgl Lahir</label>
                    <input type="date" class="form-control" required="" name="tgl_lahir">
                 </div>
                 <div class="form-group">
                 <label for="exampleInputEmail1">Alamat Lengkap</label>
                   <textarea class="form-control" name="alamat"></textarea>
                 </div>

                 total_harga : function(){

               }

                 <div class="form-group">
                 <label for="exampleInputEmail1">No Rek</label>
                    <input type="number" class="form-control" required="" name="no_rek">
                    <small>Masukan nomor rekening anda yang masih berlaku</small>
                 </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
          </form>



      </div>
    </div>
  </div>
</div>
<?php 
  $harga_ratumerak = $ratu_merak['harga'];
  $markisa = $markisa['harga'];
 ?>

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


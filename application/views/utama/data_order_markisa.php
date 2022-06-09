 <div class="container-fluid">

                   

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Order Markisa</h6>
                        </div>
                        <div class="card-body">
                           <?php echo $this->session->flashdata('message1') ?>


                          
                          <div class="row">

                            <?php foreach ($markisa as $data) { ?>
                            <div class="col-sm-6 col-4">
                              <img src="<?= base_url('assets/img/markisa.jpeg') ?>" class="img-fluid" alt="Responsive image" style="height: 100px;">
                          </div> 

                          <div class="col-sm-6 col-8">
                            <table class="table table-hover">
                              
                                <tr>
                                  <th scope="row">Nama Produk</th>
                                  <td>:</td>
                                  <td><?= $data['merek'] ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Harga</th>
                                  <td>:</td>
                                  <td><?= $data['harga'] ?></td>
                                 
                                </tr>
                                <tr>
                                  <th scope="row">Stok</th>
                                  <td>:</td>
                                  <td><?= $data['stok'] ?></td>
                                </tr>

                                <?php 

                                  $cek_pay = $this->db->get_where('tbl_checkout_markisa',['kode_member' => $data['kode_member']])->row_array();
                                  if ($cek_pay == true) { ?>

                               <tr>
                                  <th scope="row">Orde Id</th>
                                  <td>:</td>
                                  <td><?= $cek_pay['order_id'] ?></td>
                                  
                                </tr>

                                

                                 

                                 <tr>
                                  <th scope="row">Status Pembayaran</th>
                                  <td>:</td>
                                  <td>
                                    <?php if ($cek_pay['status'] == 200) {
                                      echo "success";
                                    }else{
                                      echo "panding";
                                    } ?>
                                  </td>
                                  
                                </tr>

                                 <?php }else{ ?>

                                  <tr>
                                  <th scope="row">Date Order</th>
                                  <td>:</td>
                                  <td><?= $data['date_create'] ?></td>
                                  
                                </tr>
                              <?php } ?>

                                  
                              </tbody>
                            </table>
                           
                          </div>

                           <form id="payment-form" method="post" action="<?=site_url()?>/snap_markisa/finish">
                            
                           <input type="hidden" name="result_type" id="result-type" value="">
                          <input type="hidden" name="result_data" id="result-data" value="">
                          <input type="hidden" name="nama" id="nama" value="<?= $this->session->username ?>">
                           <input type="hidden" name="email" id="email" value="<?= $this->session->email ?>">
                          <input type="hidden" name="kode_member" id="kode_member" value="<?= $this->session->kode_member ?>">
                          <input type="hidden" name="nama_produk" id="nama_produk" value="<?= $data['merek'] ?>">
                          <input type="hidden" name="harga" id="harga" value="<?= $data['harga'] ?>">

                          </form>

                            <?php } ?>
                        </div>

                      <?php if ($cek_pay == true) { ?>
                         <a href="<?= $cek_pay['pdf'] ?>" target="_blank" class="btn btn-primary btn-block">Detail Transaksi</a>
                           <a href="" class="btn btn-info btn-block">Kembali</a>
                      <?php }else{ ?>

                        <button type="submit" class="btn btn-primary btn-block" id="pay-button">Bayar</button>
                        <a href="" class="btn btn-info btn-block">Kembali</a>

                      <?php } ?>
                     
                    </div>

                </div>

      
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
</script>
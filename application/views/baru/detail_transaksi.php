<div class="main-panel">
  <div class="content-wrapper">
    <div class="row"> 
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Detail Transaksi Member <?= $member ?></h4>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Order Id
                    </th>
                    <th>
                      Topup
                    </th>
                    <th>
                      Harga
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($transaksi as $data) { ?>
                    <tr>
                      <td class="py-1">
                        <img src="<?= base_url('assets_baru/') ?>images/topup3.png" alt="image"/>
                        <p><?= $data['order_id'] ?></p>
                        <small><?= ucfirst($data['produk'])  ?></small>
                      </td>
                      <td>
                        <?= $data['jumlah_topup'] ?> Paket
                      </td>

                      <td>

                        <?= "Rp " . number_format($data['harga'],2,',','.'); ?>
                      </td>
                      <td>
                      </td>

                    </tr>

                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <!-- content-wrapper ends -->

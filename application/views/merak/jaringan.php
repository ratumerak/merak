<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Jaringan Anda</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">

                <center>
                <div class="tf-tree tf-gap-lg">
                    <div class="tf-tree tf-gap-lg">
                <ul>
                  <li>
                    <span class="tf-nc"><?= $member['username'] ?></span>
                    <ul>
                      <?php foreach ($level2 as $lev2) { ?>
                      <li>
                        <span class="tf-nc"><?= $lev2['username'] ?></span>
                        <ul>
                          <?php 

                              $get = $this->db->get_where('tbl_register',['member_get' => $lev2['kode_member']])->result_array();
                              if ($get == true) {
                              foreach ($get as $get1) {
                           ?>
                          <li><span class="tf-nc"><?= $get1['username'] ?></span></li>
                        <?php }

                      }else{
                        echo "kosong";

                      } ?>
                         <!--  <li><span class="tf-nc">5</span></li> -->
                        </ul>
                      </li>

                    <?php } ?>

                    

                    </ul>
                  </li>
                </ul>
            </div>
          
              </div>
              </center>
            </div>
          </div>
        </div>
      </div>
    </div>
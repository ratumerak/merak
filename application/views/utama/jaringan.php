 <div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Affiliator</h6>
        </div>
        <div class="card-body">

         <center>
                      
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

            </center>


        </div>
    </div>
</div>
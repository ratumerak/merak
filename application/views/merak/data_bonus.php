<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Data Bonus Anda</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Bonus</th>
                       <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; ?>
                 <?php foreach ($bonus as $data) { ?>
                    <tr>
                      <td class="text-center">
                         <small class="badge badge-success"> <?=  "Rp " . number_format($data['bonus'],0,',','.');  ?> </small>                    
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0"><?= $data['date'] ?></p>
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
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.print.css' rel='stylesheet' media='print' />


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container">
    <!--   <?= $this->session->flashdata('hello'); ?> -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <h4 style="font-weight: bold; margin-bottom: 30px; ">Data Order Selesai</h4>
        <div class="row">

          
         
          <div class="container">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>No Telp Pembeli</th>
                  <th>Produk</th>
                  <th>Qty</th>
                  <th>Alamat Lengkap</th>
                  <th>Tgl Pesan</th>
                  <th>Status Order</th>
                </tr>
                </thead>
                <tbody>

                  <?php $no = 1; ?>
                 <?php foreach ($order as $data) { ?>
                <tr> 
                               
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['no_telp_pembeli'] ?></td>
                    <td><?= $data['produk'] ?></td>
                    <td><?= $data['qty'] ?></td>
                    <td><?= $data['alamat_lengkap'] ?></td>
                    <td><?= $data['data_order'] ?></td>
                     <td><?= $data['status_order'] ?></td>
                </tr>      

              <?php } ?>

                    
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                 <th>Nama</th>
                  <th>No Telp Pembeli</th>
                  <th>Produk</th>
                  <th>Qty</th>
                  <th>Alamat Lengkap</th>
                  <th>Tgl Pesan</th>
                  <th>Status Order</th>
                
                </tr>
                </tfoot>
              </table>
          </div>
         </div>


   

         


          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <script src="http://momentjs.com/downloads/moment.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> 

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- kalender -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

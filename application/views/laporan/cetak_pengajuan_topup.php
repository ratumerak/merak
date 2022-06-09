<!DOCTYPE html>
<html><head>
  <title>Pdf</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      },

      td{
        text-align: center;
      }
    </style>
  </head><body>
    <h2 style="font-weight:bold; margin-bottom: 10px;">Laporan <?= $data ?></h2>
    <br>
    <br>

    <center>
      <table style="width:80%;">

        <tr>
          <th>No</th>
          <th>Kode Member</th>
          <th>Produk</th>
          <th>Jml Paket</th>
          <th>QTY</th>
          <th>Harga</th>
          <th>Status Pembayaran</th>
          <th>Tgl Topup</th>

        </tr>
        <?php $jumlah_paket = 0; ?>
        <?php $jumlah_qty = 0; ?>
        <?php $jumlah_harga = 0; ?>
        <?php $no = 1; ?>
        <?php foreach ($topup as $data) { ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['kode_member'] ?></td>
            <td><?= $data['produk'] ?></td>
            <td><?= $data['jumlah_topup'] ?></td>
            <td><?= $data['qty'] ?></td>
            <td><?= $data['harga'] ?></td>
            <td><small class="badge badge-danger">Belum Ada Pembayaran</small> </td>

            <td><?= $data['date_create'] ?></td>
          </tr>
          <?php   
          $jumlah_paket +=$data['jumlah_topup'];
          $jumlah_qty +=$data['qty'];
          $jumlah_harga +=$data['harga'];
          ?>
        <?php } ?>
        <tr style="background-color: orange; font-size: 13px; color: black; text-align: center;">
         <td>Total</td>
         <td><?= $total_member ?></td>
         <td> - </td>
         <td><?= $jumlah_paket ?></td>
         <td><?= $jumlah_qty ?></td>
         <td><?= "Rp " . number_format($jumlah_harga ,0,',','.'); ?></td>
         <td>-</td>
         <td>-</td>
       </tr>

     </table>
   </center>
   <!--  <h5>Total Member Pengajuan Topup : <?= $total_member ?></h5> -->
   <div style="position: absolute;top: 95%">
    <hr >
    <p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
    </p>
  </div>
</p>

</body></html>
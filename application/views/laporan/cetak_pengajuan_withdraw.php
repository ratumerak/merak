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
    <h2 style="font-weight:bold; margin-bottom: 10px;"><?= $data ?></h2>
    <br>
    <br>

    <center>
      <table style="width:80%;">

        <tr>
         <th>No</th>
         <th>Kode Member</th>
         <th>Username</th>
         <th>Email</th>
         <th>No Telp</th>
         <th>Bank</th>
         <th>Nomor Rek</th>
         <th>Jumlah Withdraw</th>
         <th>Tgl Withdraw</th>
         <th>Status</th>
       </tr>
       <?php $no = 1; ?>
       <?php foreach ($wt as $data) { ?>

        <?php   

        $profil = $this->db->get_where('tbl_profil',['kode_member' => $data['kode_member']])->row_array();

        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $data['kode_member'] ?></td>
          <td><?= $data['username'] ?></td>
          <td><?= $data['email'] ?></td>
          <td><?= $data['no_telp'] ?></td>
          <td><?= $profil['name_bank'] ?></td>
          <td><?= $profil['no_rek'] ?></td>
          <td><?= "Rp " . number_format($data['penarikan'],0,',','.');  ?></td>
          <td><?= $data['date_create'] ?></td>
          <td>
            <?php   

            if ($data['status'] == 0) {
              echo "Belum diproses";
            }else{

              echo "Sudah diproses";
            }
            ?>
          </td>
        </tr>

      <?php } ?>
      <tr style="background-color: orange; font-size: 13px; color: black;">
        <td>Total</td>
        <td><?= $no -= 1; ?></td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td><?= "Rp " . number_format($total_penarikan['penarikan'],0,',','.');  ?></td>
        <td>-</td>
        <td>-</td>
        
      </tr>

    </table>
  </center>
  <!-- <h6>Jumlah Total Uang Pengajuan Withdraw Afiliasi : <?= "Rp " . number_format($total_penarikan['penarikan'],0,',','.');  ?></h6> -->
  <div style="position: absolute;top: 95%">
    <hr >
    <p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.
    </p>
  </div>
</p>
</body></html>
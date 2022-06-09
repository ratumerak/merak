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
   <?php   
   if (!isset($produk)) {
    $produk = '';
  }
  ?>
  <h2 style="font-weight:bold; margin-bottom: 10px;"><?= $data ?></h2>

  <br>

  <br>



  <center>

    <table style="width:80%;">

     <tr style="text-align: center;">
       <th rowspan="2">Kode Member</th>
       <th rowspan="2">Topup</th>
       <th rowspan="2">Paket</th>
       <th rowspan="2">Paket Bonus</th>
       <th rowspan="2">Stok</th>
       <th rowspan="2">Stok Bonus</th>
       <th colspan="2">Cashback</th>
       <th colspan="2">Cashback Wd</th>
       <th rowspan="2">Bonus Afiliasi</th>
       <th rowspan="2">Bonus Afilasi Wd</th>
     </tr>

     <tr>
       <td>Ratumerak</td>
       <td>Markisa</td>
       <td>Ratumerak</td>
       <td>Markisa</td>
     </tr>
     <?php 
    $total_harga2 = 0;
     $paket1 = 0;
     $paket2 = 0;
     $stok_paket = 0;
     $stok_bonus = 0;
     $bns_merak = 0;
     $bns_markisa = 0;
     $wt_merak = 0;
     $wt_markisa = 0;
     $bns_aff = 0;
     $wt_afiliasi = 0;
     $cek = '';

     ?>

     <?php foreach ($po as $data) {?>
      <?php 

      if (isset($tgl_awal)) {
        $this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        $row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows();
      }elseif (isset($filter_produk)) {
        $this->db->where('produk', $filter_produk);
        $row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows();
      }else{

        $row = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->num_rows();
      }



      // $register = $this->db->get_where('tbl_register',['kode_member' => $data['kode_member']])->row_array();
      // if ($data['kode_member'] == $register['kode_member']) {
      ?>
      <?php if ($row > 1) { ?>
        <tr>
          <?php if ($cek != $data['kode_member']) { ?>
            <td rowspan="<?= $row ?>"><?= $data['kode_member'] ?></td>
          <?php } ?>
          <td><?= $data['harga'] ?></td>
          <?php $total_harga2 += $data['harga'] ?>

          <td>
            <?php if ($data['jumlah_topup'] < 10) {
              echo $data['jumlah_topup'];
              $paket1 += $data['jumlah_topup'];
            } ?>
          </td>
          <td> <?php if ($data['jumlah_topup'] >= 10) {
            echo $data['jumlah_topup'];
            $paket2 += $data['jumlah_topup'];
          } ?>
        </td>

        <?php if ($cek != $data['kode_member']) { ?>
          <td rowspan="<?= $row ?>">
           <?php 
           if ($produk != '') {
            $this->db->where('produk', $produk);
          }elseif (isset($tgl_awal)) {
           $this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
         }
         $this->db->select_sum('jumlah_topup');
         $stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
         echo $stok['jumlah_topup'] * 10;
         $stok_paket += $stok['jumlah_topup'] * 10;
         ?>
       </td>
     <?php } ?>

     <td>
       <?php 
       $jml = $data['jumlah_topup'];

       if ($jml == 50) {
        $bonus = 20;
      }elseif($jml >= 40){
        echo $bonus = 16;
      }elseif ($jml >= 30) {
        echo $bonus = 12;
      }elseif ($jml >= 20) {
        echo $bonus = 8;
      }elseif ($jml >= 10) {
        echo $bonus = 4;
      }else{
        echo $bonus = 0;
      }
      ?>
    </td>
    <?php if ($cek != $data['kode_member']) { ?>
      <td rowspan="<?= $row ?>">
        <?php   if ($produk == 'ratu merak' || $produk == '') { ?>
          <?php 
          $bns_cashback1 = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
          if ($bns_cashback1 == true) {
           echo $bns_cashback1['total_bonus'];
           $bns_merak += $bns_cashback1['total_bonus'];
         }else{
          echo "0";
        }

        ?>
      <?php }else{
        echo "-";
      } ?>
    </td>
  <?php } ?>

  <?php if ($cek != $data['kode_member']) { ?>
    <td rowspan="<?= $row ?>">
      <?php   if ($produk == 'markisa' || $produk == '') { ?>
        <?php 
        $bns_cashback2 = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
        if ($bns_cashback2 == true) {
         echo $bns_cashback2['total_bonus'];
         $bns_markisa += $bns_cashback2['total_bonus'];
       }else{
        echo "0";
      }
      ?>
    <?php   }else{
      echo "-";
    } ?>
  </td>
<?php } ?>


<?php if ($cek != $data['kode_member']) { ?>
  <td rowspan="<?= $row ?>">
    <?php if ($produk == 'ratu merak' || $produk == '') { ?>
      <?php 
      $this->db->select_sum('penarikan');
      $this->db->where('status', 1);
      $wt_bonus = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
      if ($wt_bonus == true) {
       echo $wt_bonus['penarikan'];
       $wt_merak += $wt_bonus['penarikan'];
     }else{
      echo "0";
    }
    ?>
  <?php }else{
    echo "-";
  } ?>
</td>
<?php } ?>

<?php if ($cek != $data['kode_member']) { ?>
  <td rowspan="<?= $row ?>">
    <?php   if ($produk == 'markisa' || $produk == '') { ?>
      <?php 
      $this->db->select_sum('penarikan');
      $this->db->where('status', 1);
      $wt_bonus = $this->db->get_where('tbl_witdraw_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
      if ($wt_bonus == true) {
       echo $wt_bonus['penarikan'];
       $wt_markisa += $wt_bonus['penarikan'];
     }else{
      echo "0";
    }
    ?>
  <?php   }else{
    echo "-";
  } ?>
</td>
<?php } ?>


<?php if ($cek != $data['kode_member']) { ?>
  <td rowspan="<?= $row ?>">
    <?php 
    $bonus2 = $this->db->get_where('tbl_total_bonus',['kode_member' => $data['kode_member']])->row_array();
    if ($bonus2 == true) {
     echo $bonus2['total_bonus'];
     $bns_aff += $bonus2['total_bonus'];
   }else{
    echo "0";
  }
  ?>
</td>
<?php } ?>

<?php if ($cek != $data['kode_member']) { ?>
  <td rowspan="<?= $row ?>">
    <?php 
    $wt_aff = $this->db->get_where('tbl_witdraw',['kode_member' => $data['kode_member']])->row_array();
    if ($wt_aff == true) {
     echo $wt_aff['penarikan'];
     $wt_afiliasi += $wt_aff['penarikan'];
   }else{
    echo "0";
  }
  ?>
</td>
<?php } ?>

</tr>


<?php }else{ ?>
  <tr>
    <td><?= $data['kode_member'] ?></td>
    <td><?= $data['harga'] ?></td>
    <?php $total_harga2 += $data['harga'] ?>
    <td>
      <?php if ($data['jumlah_topup'] < 10) {
        echo $data['jumlah_topup'];
        $paket1 += $data['jumlah_topup'];
      } ?>
    </td>
    <td> 
      <?php if ($data['jumlah_topup'] >= 10) {
        echo $data['jumlah_topup'];
        $paket2 += $data['jumlah_topup'];
      } ?>
    </td>
    <td>
      <?php 
      if ($produk != '') {
        $this->db->where('produk', $produk);
      }elseif (isset($tgl_awal)) {
       $this->db->where("date BETWEEN '$tgl_awal' AND '$tgl_akhir'");
     }
     $this->db->select_sum('jumlah_topup');
     $stok = $this->db->get_where('tbl_topup',['kode_member' => $data['kode_member']])->row_array();
     echo  $stok['jumlah_topup'] * 10;
     $stok_paket += $stok['jumlah_topup'] * 10;
     ?>
   </td>
   <td>
     <?php 
     $jml = $data['jumlah_topup'];

     if ($jml == 50) {
      $bonus = 20;
    }elseif($jml >= 40){
      echo $bonus = 16;
    }elseif ($jml >= 30) {
      echo $bonus = 12;
    }elseif ($jml >= 20) {
      echo $bonus = 8;
    }elseif ($jml >= 10) {
      echo $bonus = 4;
    }else{
      echo $bonus = 0;
    }
    ?>
  </td>


  <td>
    <?php   if ($produk == 'ratu merak' || $produk == '' ) { ?>
      <?php
      $bns_cashback1 = $this->db->get_where('tbl_total_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
      if ($bns_cashback1 == true) {
        echo $bns_cashback1['total_bonus'];
        $bns_merak += $bns_cashback1['total_bonus'];
      }else{
        echo "0";
      }
      ?>
    <?php   }else{
      echo "-";
    } ?>
  </td>
  <td>
    <?php   if ($produk == 'markisa' || $produk == '') { ?>
      <?php 
      $bns_cashback2 = $this->db->get_where('tbl_total_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
      if ($bns_cashback2 == true) {
        echo $bns_cashback2['total_bonus'];
        $bns_markisa += $bns_cashback2['total_bonus'];
      }else{
        echo "0";
      }
      ?>
    <?php   }else{
      echo "-";
    } ?>
  </td>
  <td>
   <?php   if ($produk == 'ratu merak' || $produk == '') { ?>
    <?php 
    $this->db->select_sum('penarikan');
    $this->db->where('status', 1);
    $wt_bonus = $this->db->get_where('tbl_witdraw_cashback_ratumerak',['kode_member' => $data['kode_member']])->row_array();
    if ($wt_bonus == true) {
     echo $wt_bonus['penarikan'];
     $wt_merak += $wt_bonus['penarikan'];
   }else{
    echo "0";
  }
  ?>
<?php   }else{
  echo "-";
} ?>
</td>
<td>
 <?php   if ($produk == 'markisa' || $produk == '') { ?>
  <?php 
  $this->db->select_sum('penarikan');
  $this->db->where('status', 1);
  $wt_bonus = $this->db->get_where('tbl_witdraw_cashback_markisa',['kode_member' => $data['kode_member']])->row_array();
  if ($wt_bonus == true) {
   echo $wt_bonus['penarikan'];
   $wt_markisa += $wt_bonus['penarikan'];
 }else{
  echo "0";
}
?>
<?php   }else{
  echo "-";
} ?>
</td>

<td>
  <?php 
  $bonus2 = $this->db->get_where('tbl_total_bonus',['kode_member' => $data['kode_member']])->row_array();
  if ($bonus2 == true) {
   echo $bonus2['total_bonus'];
   $bns_aff += $bonus2['total_bonus'];
 }else{
  echo "0";
}
?>
</td>
<td>
  <?php 
  $wt_aff = $this->db->get_where('tbl_witdraw',['kode_member' => $data['kode_member']])->row_array();
  if ($wt_aff == true) {
   echo $wt_aff['penarikan'];
   $wt_afiliasi += $wt_aff['penarikan'];
 }else{
  echo "0";
}
?>
</td>
</tr>
<?php } ?>
<?php $cek = $data['kode_member'] ?>
<?php  $stok_bonus += $bonus ?>
<!-- <?php  $cashback1 += $bns_cashback1['total_bonus']; ?> -->


<?php } ?>
<tr style="background-color: orange;">
  <td>Total</td>
  <td><?= "Rp " . number_format($total_harga2,0,',','.');  ?>  </td>
  <td><?= $paket1 ?></td>
  <td><?= $paket2 ?></td>
  <td><?= $stok_paket ?></td>
  <td><?= $stok_bonus ?></td>
  <td><?= "Rp " . number_format($bns_merak ,0,',','.');  ?></td>
  <td><?= "Rp " . number_format($bns_markisa,0,',','.');  ?> </td>
  <td><?= "Rp " . number_format($wt_merak,0,',','.');  ?> </td>
  <td><?= "Rp " . number_format($wt_markisa,0,',','.');  ?></td>
  <td><?= "Rp " . number_format($bns_aff,0,',','.');  ?></td>
  <td><?= "Rp " . number_format($wt_afiliasi,0,',','.');  ?></td>
</tr>
</table>
</center>

<div style="position: absolute;top: 95%">
 <p style="font-style: italic;">Dicetak pada tanggal <?= date('Y-m-d') ?>.</p>

</div>

</p>

</body></html>
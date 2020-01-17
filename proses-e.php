<div class="col-md-12">

  <?php
  include 'konversi.php';
  $awal = microtime(true);
    if(isset($_POST['kirim'])){ 
      // include 'konversi.php';

      $kata=$_POST['kata'];
      $kunci=$_POST['kunci'];
                 $len_plaint = strlen($kata); //menghitung panjang string
                  $len_kunci = strlen($kunci);
                  $split_plaint = str_split($kata);
                  $split_kunci = str_split($kunci);
                  $i = 0;

                  for ($j = 0; $j < $len_plaint; $j++) {
                      if ($i == $len_kunci) {
                          $i = 0;
                      }
                      $split_kunci2[$j] = $split_kunci[$i];
                      $i++;
                  }
  //**memasukan kunci**//
                  $c = '';
                  $d = '';
                  $e = '';
                  for ($j = 0; $j < $len_plaint; $j++) {
                      $a = char_to_desimal($split_plaint[$j]);
                      $b = char_to_desimal($split_kunci2[$j]);
                      $c.=decimal_to_biner($a);
                      $d.=decimal_to_biner($b);
                      $e.=desimal_to_char($b);
                  }
                  $p = array($c);
                  $p = implode("", $p);
                  $p = str_split($p, 8);
                  $count_p = count($p);

                  $count_p;
                  $k = array($d);
                  $k = implode("", $k);
                  $k = str_split($k, 8);
                  $count_k = count($k);
                  $iv = "00000000";
                  //**memilih level 1 untuk enkripsi**//

                  for ($j = 0; $j < $count_p; $j++) {

                      $plaint = $p[$j];
                      $kunci = $k[$j];
                      $a = $plaint ^ $iv;
                      $h = $kunci ^ $a;
                      $hasil[$j] = $h;
  //**proses wrapping index**//
                      $h1 = strlen($h);
                      $split_h = str_split($h);
                      $i = 1;

                      for ($L = 0; $L < $h1; $L++) {
                          if ($i == $h1) {
                              $i = 0;
                          }
                          $split_h2[$L] = $split_h[$i];
                          $i++;
                      }
  //**waraping index dimasukan ke biner**//
                      $b = '';
                      for ($L = 0; $L < $h1; $L++) {
                          $b.=$split_h2[$L];
                      }
                      $hasil[$j] = $b;
                      $iv = $b;
                  }

              for ($L = 0; $L < $count_p; $L++) {
                      $hasil[$L];
                  }
  //**menampilkan cbc berdasarkan blok index*//
                  $a ='';
                  for ($i = 0; $i < 8; $i++) {
                      for ($j = 0; $j < $count_p; $j++) {
                          $a.=$hasil[$j][$i];
                      }
                  }


                  echo '<div class="col-md-6">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                      <h3 class="panel-title">CHIPERTEXT CBC Modifikasi</h3>
                      </div>
                      <div class="panel-body">
                       <div class="input-group">
                      ';
                  // echo '</div>';


                  echo '<textarea class="form-control" style="width:350px; height=350px;" name="code"  id="generate-notif1">';

                  echo $a=bin_to_hex($a);
                  echo '</textarea>


                  </div>
                  <button class="btn btn-info" type="button" onclick=copyToClipboard1()>Copy</button>

                  </div>

                  </div>';




  $akhir = microtime(true);
  $lama = $akhir - $awal;
  $jkk=$a;
  $mouse=strlen($jkk)+1;
  $filep=strlen($kata)+1;
  // for($i=1;$i<= strlen($a);$i++){
  // $pisah = implode(" ", $a);
  // }
//  $hasil = strlen($a);
  ?>
  <script>
      function copyToClipboard1() {
     $("#generate-notif1").select();
     document.execCommand("copy");
   }
      </script>
      <ul class="list-group">
        <li class="list-group-item">
          <!-- <span class="badge">14</span> -->
          <b><u>Hasil Analisis</u></b>
        </li>
        <li class="list-group-item">
          <span class="badge"><?php echo strlen($a) ; ?> byte</span>
          Jumlah seluruh bit
        </li>
        <li class="list-group-item">
          <span class="badge"><?php echo round($lama, 4); ?> microsecond</span>
          Lama Proses
        </li>
        <li class="list-group-item">
          <span class="badge"><?php echo  $pisah; ?> byte</span>
          plainteks
        </li>
         <li class="list-group-item">
          <span class="badge"><?php echo $a; ?> byte</span>
          chiperteks
        </li>
      </ul>
<?php
}
?>
  </div>

  <?php
  $awal2 = microtime(true);

  if(isset($_POST['kirim'])){
    // echo "berhasil";


    $kata=$_POST['kata'];
    $kunci=$_POST['kunci'];
    $len_plaint = strlen($kata);
    $len_kunci = strlen($kunci);
    $split_plaint = str_split($kata);
    $split_kunci = str_split($kunci);

    $i = 0;

    for ($j = 0; $j < $len_plaint; $j++) {
        if ($i == $len_kunci) {
            $i = 0;
        }
        $split_kunci2[$j] = $split_kunci[$i];
        $i++;
    }
//**memasukan kunci**//
    $c = '';
    $d = '';
    $e = '';
    for ($j = 0; $j < $len_plaint; $j++) {
        $a = char_to_desimal($split_plaint[$j]);
        $b = char_to_desimal($split_kunci2[$j]);
        $c.=decimal_to_biner($a);
        $d.=decimal_to_biner($b);
        $e.=desimal_to_char($b);
    }
    $p = array($c);
    $p = implode("", $p);
    $p = str_split($p, 8);
    $count_p = count($p);

    $count_p;
    $k = array($d);
    $k = implode("", $k);
    $k = str_split($k, 8);
    $count_k = count($k);
    $iv = "00000000";
    //**memilih level 1 untuk enkripsi**//

    for ($j = 0; $j < $count_p; $j++) {

        $plaint = $p[$j];
        $kunci = $k[$j];
        $a = $plaint ^ $iv;
        $h = $kunci ^ $a;
        $hasil[$j] = $h;
//**proses wrapping index**//
        $h1 = strlen($h);
        $split_h = str_split($h);
        $i = 1;

        for ($L = 0; $L < $h1; $L++) {
            if ($i == $h1) {
                $i = 0;
            }
            $split_h2[$L] = $split_h[$i];
            $i++;
        }
//**waraping index dimasukan ke biner**//
        $b = '';
        for ($L = 0; $L < $h1; $L++) {
            $b.=$split_h2[$L];
        }
        $hasil[$j] = $b;
        $iv = $b;
    }
$a='';
    for ($L = 0; $L < $count_p; $L++) {
        $a.=$hasil[$L];
    }

    echo '<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">CHIPERTEXT CBC </h3>
        </div>
        <div class="panel-body">
         <div class="input-group">
        ';
    // echo '</div>';


    echo '<textarea class="form-control" style="width:350px; height=350px;" name="code"  id="generate-notif">';

    echo $a=bin_to_hex($a);
    echo '</textarea>


    </div>
    <button class="btn btn-info" type="button" onclick=copyToClipboard()>Copy</button>

    </div>

    </div>';


    $akhir2 = microtime(true);
    $lama2 = $akhir2 - $awal2;
    $jkk2=$a;
    $mouse2=strlen($jkk)+1;
    $filep2=strlen($kata)+1;
    


   ?>
   <script>
       function copyToClipboard() {
      $("#generate-notif").select();
      document.execCommand("copy");
    }
       </script>
       <ul class="list-group">
         <li class="list-group-item">
           <!-- <span class="badge">14</span> -->
           <b><u>Hasil Analisis</u></b>
         </li>
         <li class="list-group-item">
           <span class="badge"><?php echo strlen($a); ?> byte</span>
           Jumlah seluruh bit
         </li>
         <li class="list-group-item">
           <span class="badge"><?php echo round($lama2, 4); ?> microsecond</span>
           Lama Proses
         </li>
         <li class="list-group-item">
           <span class="badge"><?php echo $mouse2; ?> byte</span>
           Ukuran File E
         </li>
       </ul>
 <?php
 }
 ?>
   </div>
</div>
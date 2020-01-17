    <div class="col-md-12">
    
<?php
error_reporting(0);
ini_set('display_errors',0);
include 'konversi.php';
// include 'index.php';

if(isset($_POST['kirim'])){
    $awal = microtime(true);

    $kata=$_POST['kata1'];
    $kunci=$_POST['kunci'];
    $kata=hex_to_bin($kata);
    $len_plaint = strlen($kata);
            $split_kunci = str_split($kunci);
            $len_kunci = strlen($kunci);
            $p = array($kata);
            $p = implode("", $p);
            $p = str_split($p, 8);
            $count_p = count($p);
            $h = '';
            $j = '';
            for ($b = 0; $b < $count_p; $b++) {
                $m = 8;
                $h = $h + $m;
                $h;
            }
            $h;

            if ($len_plaint >= 8 && $len_plaint == $h && $len_plaint % 2 == 0) {
                $p = array($kata);
                $p = implode("", $p);
                $p = str_split($p, 8);
                $count_p = count($p);
//                print_r($p);
                $count_p;
                $i = 0;
                for ($j = 0; $j < $count_p; $j++) {
                    if ($i == $len_kunci) {
                        $i = 0;
                    }
                    $split_kunci2[$j] = $split_kunci[$i];
                    $i++;
                }

                //**memasangkan kunci**//
                $d = '';
                for ($j = 0; $j < $count_p; $j++) {
                    $b = char_to_desimal($split_kunci2[$j]);
                    $d.=decimal_to_biner($b);
                }
                $k = array($d);
                $k = implode("", $k);
                $k = str_split($k, 8);
                $count_k = count($k);

                for ($i = 0; $i < $len_plaint; $i++) {
                    $hasil[$i] = $kata[$i];
                }

                for ($i = 0; $i < $len_plaint; $i++) {
                    $hasil[$i];
                }
                $i = 0;
                $n = 0;
                $baris = 0;
                while ($i < $len_plaint) {
                    if ($n == $count_p) {
                        $n = 0;
                        $baris++;
                    }
                    $hasil[$n][$baris] = $hasil[$i];
                    $n++;
                    $i++;
                }
                $i = 0;
                while ($i < $count_p) {
                    if (empty($hasil[$i])) {
                        echo "tidak ada dekripsi";
                        exit;
                    } else {
                        $hasil[$i] . "</br>";
                        $i++;
                    }
                }
                $h = '';
                for ($L = 0; $L < $count_p; $L++) {
                    $h.=$hasil[$L];
                }
                //**dekripsi cbc**//
                $p = array($h);
                $p = implode("", $p);
                $p = str_split($p, 8);

                //**dekripsi **//
                $iv = "00000000";
                $hasil;
                for ($m = 0; $m < $count_p; $m++) {
                    $h = "$p[$m]";
                    $h2 = strlen($h);
                    $split_h = str_split($h);
//**proses wrapping index**//
                    $i = 7;
                    for ($L = 0; $L < $h2; $L++) {
                        if ($i == $h2) {
                            $i = 0;
                        }
                        $split_h2[$L] = $split_h[$i];
                        $i++;
                    }
//**waraping index dimasukan ke biner**//
                    $b = '';
                    for ($L = 0; $L < $h2; $L++) {
                        $b.=$split_h2[$L];
                    }
//**dekripsi cbc prosesnya**//
                    //proses dekripsi cbc
                    $hasil[$m] = $b;
                    $plaint = "$b";
                    $plr = "$p[$m]";
                    $kunci = "$k[$m]";
                    $d = $plaint ^ $kunci;
                    $h = $d ^ $iv;
                    $hasil[$m] = $h;
                    $iv = "$plr";
                }
//**mengubah ke char**//
                $a = '';
                for ($j = 0; $j < $count_p; $j++) {
                    $hasil[$j] . " ";
                    $a = $a . chr(bindec($hasil[$j]));
                }
                echo '<div class="col-md-5">
                <div class="panel panel-default">
                <div class="panel-heading">PLAINTEXT CBC Modifikasi</div>
                <div class="panel-body">
                <textarea rows="5" cols="50" id="generate-notif">';
                echo $a;
                echo '</textarea>
                <button class="btn btn-info" type="button" onclick=copyToClipboard()>Copy</button>
                </div></div>';
            }

  $akhir = microtime(true);
  $lama = $akhir - $awal;
  $jkk=$a;
  $mouse=strlen($jkk)+1;
  $filep=strlen($kata)+1;
        

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
          <span class="badge"><?php echo $filep ; ?> byte</span>
          Ukuran File E
        </li>
        <li class="list-group-item">
          <span class="badge"><?php echo round($lama, 4); ?> microsecond</span>
          Lama Proses
        </li>
        <li class="list-group-item">
          <span class="badge"><?php echo $mouse; ?> byte</span>
          Ukuran File P
        </li>
      </ul>
<?php
}
?>
  </div>


<?php 
if(isset($_POST['kirim'])){
    $awal2 = microtime(true);
    $kata=$_POST['kata2'];
    $kunci=$_POST['kunci'];
    $kata=hex_to_bin($kata);
 $len_plaint = strlen($kata);
            $split_kunci = str_split($kunci);
            $len_kunci = strlen($kunci);
            $p = array($kata);
            $p = implode("", $p);
            $p = str_split($p, 8);
            $count_p = count($p);
            $h = '';
            $j = '';
            for ($b = 0; $b < $count_p; $b++) {
                $m = 8;
                $h = $h + $m;
                $h;
            }
            $h;

            if ($len_plaint >= 8 && $len_plaint == $h && $len_plaint % 2 == 0) {
                $p = array($kata);
                $p = implode("", $p);
                $p = str_split($p, 8);
                $count_p = count($p);
//                print_r($p);
                $count_p;
                $i = 0;
                for ($j = 0; $j < $count_p; $j++) {
                    if ($i == $len_kunci) {
                        $i = 0;
                    }
                    $split_kunci2[$j] = $split_kunci[$i];
                    $i++;
                }

                //**memasangkan kunci**//
                $d = '';
                for ($j = 0; $j < $count_p; $j++) {
                    $b = char_to_desimal($split_kunci2[$j]);
                    $d.=decimal_to_biner($b);
                }
                $k = array($d);
                $k = implode("", $k);
                $k = str_split($k, 8);
                $count_k = count($k);

                for ($i = 0; $i < $len_plaint; $i++) {
                    $hasil[$i] = $kata[$i];
                }
                $h='';
                for ($i = 0; $i < $len_plaint; $i++) {
                    $h.=$hasil[$i];
                }
//                $i = 0;
//                $n = 0;
//                $baris = 0;
//                while ($i < $len_plaint) {
//                    if ($n == $count_p) {
//                        $n = 0;
//                        $baris++;
//                    }
//                    $hasil[$n][$baris] = $hasil[$i];
//                    $n++;
//                    $i++;
//                }
//                $i = 0;
//                while ($i < $count_p) {
//                    if (empty($hasil[$i])) {
//                        echo "tidak ada dekripsi";
//                        exit;
//                    } else {
//                        $hasil[$i] . "</br>";
//                        $i++;
//                    }
//                }
//                $h = '';
//                for ($L = 0; $L < $count_p; $L++) {
//                    $h.=$hasil[$L];
//                }
                //**dekripsi cbc**//
                $p = array($h);
                $p = implode("", $p);
                $p = str_split($p, 8);
                //**dekripsi **//
                $iv = "00000000";
                $hasil;
                for ($m = 0; $m < $count_p; $m++) {
                    $h = "$p[$m]";
                    $h2 = strlen($h);
                    $split_h = str_split($h);
//**proses wrapping index**//
                    $i = 7;
                    for ($L = 0; $L < $h2; $L++) {
                        if ($i == $h2) {
                            $i = 0;
                        }
                        $split_h2[$L] = $split_h[$i];
                        $i++;
                    }
//**waraping index dimasukan ke biner**//
                    $b = '';
                    for ($L = 0; $L < $h2; $L++) {
                        $b.=$split_h2[$L];
                    }
//**dekripsi cbc prosesnya**//
                    //proses dekripsi cbc
                    $hasil[$m] = $b;
                    $plaint = "$b";
                    $plr = "$p[$m]";
                    $kunci = "$k[$m]";
                    $d = $plaint ^ $kunci;
                    $h = $d ^ $iv;
                    $hasil[$m] = $h;
                    $iv = "$plr";
                }
//**mengubah ke char**//
                $a = '';
                for ($j = 0; $j < $count_p; $j++) {
                    $hasil[$j] . " ";
                    $a = $a . chr(bindec($hasil[$j]));
                }
                echo '<div class="col-md-5">
                <div class="panel panel-default">
                <div class="panel-heading">PLAINTEXT CBC</div>
                <div class="panel-body">
                <textarea rows="5" cols="50" id="generate-notif1">';
                echo $a;
                echo '</textarea>
                <button class="btn btn-info" type="button" onclick=copyToClipboard1()>Copy</button>
                </div></div>';
                // echo '<textarea rows="5" id="result" cols="50">';
                // echo $a;
                // echo '</textarea><br/>';
    $akhir2 = microtime(true);
    $lama2 = $akhir2 - $awal2;
    $jkk2=$a;
    $mouse2=strlen($jkk)+1;
    $filep2=strlen($kata)+1;


    }

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
           <span class="badge"><?php echo $filep2; ?> byte</span>
           Ukuran File E
         </li>
         <li class="list-group-item">
           <span class="badge"><?php echo round($lama2, 4); ?> microsecond</span>
           Lama Proses
         </li>
         <li class="list-group-item">
           <span class="badge"><?php echo $mouse2; ?> byte</span>
           Ukuran File P
         </li>
       </ul>
 <?php
 }
 ?>
   </div>
</div>
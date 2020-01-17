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
                  //$kata = char_to_desimal($kata);
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
                  //echo $c;
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
?>
<?php
                  $jkk = $a;
                  $jkk = bin_to_hex($jkk);

                  echo '<div class="col-md-6 col-md-offset-2">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                      <h3 class="panel-title">CHIPERTEXT CBC Modifikasi</h3>
                      </div>
                      <div class="panel-body">
                       <div class="input-group">
                      ';
                  // echo '</div>';
                  echo '<textarea class="form-control" style="width:500px; height=350px;" name="code"  id="generate-notif1">';
                  echo $jkk;
                  echo '</textarea>
                  </div>
                  <button class="btn btn-info" type="button" onclick=copyToClipboard1()>Copy</button>
                  </div>;
                 </div>';
         
    //memisahkan plainteks
   $code = array($c);
   $code = implode("", $code);
   $code = str_split($code, 1);
   //print_r($code);

   //memisahkan chiperteks
   $codec = array($a);
   $codec = implode("", $codec);
   $codec = str_split($codec, 1);
   //print_r($codec);

   //menyimpan string
   foreach ($code as $key => $value) {
    $temp[]=$value;
   }
   foreach ($codec as $key => $value) {
    $temp1[]=$value;
   }
   $c_k = count($code);
   $tot=0;
    for ($i=0; $i <$c_k; $i++) { 
      //echo $temp1[$i].$temp[$i]."</br>";
      if($temp1[$i]!=$temp[$i]){
        $tot++;
      }
    }
    //echo $tot;

    echo "</br>";
    $c1 = strlen($c);
    $ae = ($tot/$c1)*100;
    $ae1 = ceil($ae);
   //var_dump($code)
  ?>
</div>

  <div class="col-md-12">
     <ul class="list-group">
        <li class="list-group-item">
          <b><u>Plainteks dan Chiper</u></b>
        </li>
        <li class="list-group-item">
          <span  class="badge" ><?php echo($c) ?> bit</span>
          Plainteks
        </li>	
        <li class="list-group-item">
          <span class="badge"><?php echo ($a) ?> bit</span>
          Chiperteks
        </li>
         <li class="list-group-item">
          <span class="badge"><?php echo ($a) ?> bit</span>
          Jumlah bit
        </li>
      </ul>
   </div>


<!--       <ul class="list-group">
        <li class="list-group-item">
          <b><u>Hasil Analisis</u></b>
        </li>
        <li class="list-group-item">
          <span data-toggle="tooltip" data-placement="top" class="badge" title='<?php echo($c) ?>'><?php echo $c1 ; ?> bit</span>
          Jumlah seluruh bit biner
        </li>
        <li class="list-group-item">
          <span class="badge"><?php echo  $tot; ?> bit</span>
          Jumlah bit berbeda
        </li>
        <li class="list-group-item">
          <button class="badge"><?php echo $ae1; ?> %</button>
          Avalanche Effect
        </li>
       
         
      </ul>

 -->
<?php
}
?>
  </div>

  <div class="col-md-6">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                      <h3 class="panel-title">Rumus Avalanche Effect</h3>
                      </div>
                      <div class="panel-body">
                        <h5>&emsp;&emsp;&emsp;&emsp;Jumlah bit yang berbeda</h5>
                        <h5>AE = ________________________&emsp;X 100%</h5>
                        <h5>&emsp;&emsp;&emsp;&emsp;&emsp;Jumlah seluruh bit</h5>
                  </div>
                  </div>
                </div>
                </br></br>
                  <div class="col-md-6">
                   <div class="panel panel-primary">
                      <div class="panel-heading">
                      <h3 class="panel-title">Avalanche Effect</h3>
                      </div>
                      <div class="panel-body">
                        <h5>&emsp;&emsp;&emsp;<?php echo "$tot"; ?></h5>
                        <h5>AE = -------------  &emsp;X 100%</h5>
                        <h5>&emsp;&emsp;&emsp;<?php echo "$c1 "; ?></h5>
                        <h5>AE = &emsp;<?php echo "$ae1"; ?> % => kategori <b><?php if($ae1>=45 && $ae1<=65){echo "baik";}
                              else {echo "kurang baik";}
                         ?></b></h5>
                  </div>
                  </div>
                </div>
    <script>
      	function copyToClipboard1() {
     	$("#generate-notif1").select();
     	document.execCommand("copy");
   		}
    </script>
    <script>
      $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
      });
    </script>
    <script>
		$(document).ready(function(){
		    $('[data-toggle="popover"]').popover();   
		});
</script>
   </div>
</div> 
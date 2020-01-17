<?php
//**MURNI CBC
function proses_auto_enk_cbc_murni($kata,$kunci){
echo "<b>enkripsi cbc murni</b>".'</br>';
if (!empty($kata)) {
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
//**menampilkan cbc berdasarkan blok index*//
//                $a = '';
//                for ($i = 0; $i < 8; $i++) {
//                    for ($j = 0; $j < $count_p; $j++) {
//                        $a.= $hasil[$j][$i];
//                    }
//                }

                echo '<textarea rows="5" id="result" cols="50">';
                echo $a=bin_to_hex($a);
                echo '</textarea><br/>';
            } else {
                echo "tidak ada ekripsi" . "</br>";
            }
return $a;
}

function proses_manual_enk_cbc_murni($kata,$kunci){
echo "<b>enkripsi cbc murni</b>".'</br>';
if (!empty($kata)) {
                $len_plaint = strlen($kata);
                $len_kunci = strlen($kunci);
                $split_plaint = str_split($kata);
                $split_kunci = str_split($kunci);
                echo'kunci:'. $kunci."</br>";
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
                 echo "<b>memasangkan kunci dan plainteks</b>" . "</br>";
                echo "plainteks:" . $kata . "</br>";
                echo "kunci cbc:" . $e . "</br>";
                echo "bilangan biner plainteks:" . $c . "</br>";
                echo "bilangan biner kunci:" . $d . "</br>";
                echo "<b>memecah string menjadi 8 bits</b>" . "</br>";
                echo "plainteks:" . "</br>";
                $p = array($c);
                $p = implode("", $p);
                $p = str_split($p, 8);
                $count_p = count($p);
                print_r($p);
                echo $count_p;
                echo "</br>";
                echo "kunci:" . "</br>";
                $k = array($d);
                $k = implode("", $k);
                $k = str_split($k, 8);
                $count_k = count($k);
                print_r($k);
                echo "</br>";

                $iv = "00000000";
                echo "<b>proses enkripsi CBC</b>" . "</br>";
                //**memilih level 1 untuk enkripsi**//

                for ($j = 0; $j < $count_p; $j++) {

                    $plaint = $p[$j];
                    $kunci = $k[$j];
                    echo "iv    :" . $iv . "<br/>";
                    echo "plaint:" . $plaint . "<br/>";
                    echo "kunci :" . $kunci . "<br/>";
                    $a = $plaint ^ $iv;
                    $h = $kunci ^ $a;
                    $hasil[$j] = $h;
                    echo "hasil sebelum wrapping 1 bits :" . $h . "<br/>";
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
                    echo "hasil wrapping ke kiri 1 bits:" . $b . "</br>";
                    $hasil[$j] = $b;
                    $iv = $b;
                }
//**menampilkan cbc berdasarkan blok index*//
               $a = '';
                echo "<b>hasil cbc murni</b>" . "</br>";
                for ($L = 0; $L < $count_p; $L++) {
                    $a.=$hasil[$L];
                }
                echo 'biner cbc murni:'.$a.'</br>';
                echo 'hexa cbc murni:'.'</br>';
               echo '<textarea rows="5" id="result" cols="50">';
               echo $a=bin_to_hex($a);
                echo '</textarea><br/>';
            } else {
                echo "tidak ada ekripsi" . "</br>";
            }
return $a;
}



//**MODIFIKASI CBC


function proses_auto_enk_cbc_modifikasi($kata,$kunci){
echo "<b>enkripsi cbc modifikasi</b>".'</br>';
if (!empty($kata)) {
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

            for ($L = 0; $L < $count_p; $L++) {
                    $hasil[$L];
                }
//**menampilkan cbc berdasarkan blok index*//
                $a = '';
                for ($i = 0; $i < 8; $i++) {
                    for ($j = 0; $j < $count_p; $j++) {
                        $a.= $hasil[$j][$i];
                    }
                }
                echo '<textarea rows="5" id="result" cols="50">';
                echo $a=bin_to_hex($a);
                echo '</textarea><br/>';
            } else {
                echo "tidak ada ekripsi" . "</br>";
            }
return $a;
}

function proses_manual_enk_cbc_modifikasi($kata,$kunci){
    echo "<b>enkripsi cbc modifikasi</b>".'</br>';
if (!empty($kata)) {
                $len_plaint = strlen($kata);
                $len_kunci = strlen($kunci);
                $split_plaint = str_split($kata);
                $split_kunci = str_split($kunci);
                echo'kunci:'. $kunci."</br>";
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
                 echo "<b>memasangkan kunci dan plainteks</b>" . "</br>";
                echo "plainteks:" . $kata . "</br>";
                echo "kunci cbc:" . $e . "</br>";
                echo "bilangan biner plainteks:" . $c . "</br>";
                echo "bilangan biner kunci:" . $d . "</br>";
                echo "<b>memecah string menjadi 8 bits</b>" . "</br>";
                echo "plainteks:" . "</br>";
                $p = array($c);
                $p = implode("", $p);
                $p = str_split($p, 8);
                $count_p = count($p);
                print_r($p);
                echo $count_p;
                echo "</br>";
                echo "kunci:" . "</br>";
                $k = array($d);
                $k = implode("", $k);
                $k = str_split($k, 8);
                $count_k = count($k);
                print_r($k);
                echo "</br>";

                $iv = "00000000";
                echo "<b>proses enkripsi CBC</b>" . "</br>";
                //**memilih level 1 untuk enkripsi**//

                for ($j = 0; $j < $count_p; $j++) {

                    $plaint = $p[$j];
                    $kunci = $k[$j];
                    echo "iv    :" . $iv . "<br/>";
                    echo "plaint:" . $plaint . "<br/>";
                    echo "kunci :" . $kunci . "<br/>";
                    $a = $plaint ^ $iv;
                    $h = $kunci ^ $a;
                    $hasil[$j] = $h;
                    echo "hasil sebelum wrapping 1 bits :" . $h . "<br/>";
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
                    echo "hasil wrapping ke kiri 1 bits:" . $b . "</br>";
                    $hasil[$j] = $b;
                    $iv = $b;
                }
                         $a = '';
                echo "<b>hasil sebelum diambil berdasarkan indeks per blok</b>" . "</br>";
                $a='';
                for ($L = 0; $L < $count_p; $L++) {
                    $a.=$hasil[$L].'</br>';
                }
                echo 'biner cbc murni:'."</br>";
                echo $a;
//**menampilkan cbc berdasarkan blok index*//
                $a = '';
                for ($i = 0; $i < 8; $i++) {
                    for ($j = 0; $j < $count_p; $j++) {
                        $a.= $hasil[$j][$i];
                    }
                }
                echo "<b>hasil setelah diambil berdasarkan indeks per blok</b>" . "</br>";
                echo "biner cbc modifikasi:".$a.'</br>';
                echo 'hexa cbc modifikasi:'.'</br>';
                echo '<textarea rows="5" id="result" cols="50">';
                echo $a=bin_to_hex($a);
                echo '</textarea><br/>';
            } else {
                echo "tidak ada ekripsi" . "</br>";
            }

return $a;

}
?>

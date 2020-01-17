<?php

//**DEKRIPSI CBC MURNI
function proses_auto_dek_cbc_murni($kata,$kunci){
    echo "<b>dekripsi cbc murni</b>".'</br>';
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
                echo '<textarea rows="5" id="result" cols="50">';
                echo $a;
                echo '</textarea><br/>';
            } else {
                echo "string anda bukan hexa desimal !" . "</br>";
            }
            return $a;
}

function proses_manual_dek_cbc_murni($kata,$kunci){
    echo "<b>dekripsi cbc murni</b>".'</br>';
                echo "<b>memasangkan kunci dan cipherteks</b>" . "</br>";
                echo "menampilkan cipherteks:" . $kata . "</br>";
                echo 'mengubah hexa ke biner:';
                $kata=hex_to_bin($kata);
                echo $kata.'</br>';
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
                echo "<b>memecah string menjadi 8 bits</b>" . "</br>";
                echo "cipherteks:" . "</br>";
                print_r($p);
                echo "</br>";
                echo "kunci:" . "</br>";
                $k = array($d);
                $k = implode("", $k);
                $k = str_split($k, 8);
                $count_k = count($k);
                print_r($k);
                echo "</br>";

                for ($i = 0; $i < $len_plaint; $i++) {
                    $hasil[$i] = $kata[$i];
                }

                $h='';
                echo "asli cipherteks:";
                for ($i = 0; $i < $len_plaint; $i++) {
                    $h.=$hasil[$i];
                }
               echo $h."</br>";
//                echo "<b>mengembalikan ke bentuk asal berdasarkan indeks per blok</b>" . "</br>";
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
//                        echo $hasil[$i] . "</br>";
//                        $i++;
//                    }
//                }
//                echo "larik:";
//                $h = '';
//                for ($L = 0; $L < $count_p; $L++) {
//                    $h.=$hasil[$L];
//                    echo $hasil[$L];
//                }
//                echo "</br>";
                //**dekripsi cbc**//
                $p = array($h);
                $p = implode("", $p);
                $p = str_split($p, 8);
                echo "cipherteks:";
                print_r($p);
                echo "</br>";
                echo "kunci:";
                print_r($k);
                echo "</br>";

                echo '<b> proses dekripsi cbc</b>'.'</br>';
                //**dekripsi **//
                $iv = "00000000";
                $hasil;
                for ($m = 0; $m < $count_p; $m++) {
                    $h = "$p[$m]";
                    $h2 = strlen($h);
                    $split_h = str_split($h);
                    echo "hasil sebelum wrapping 1 bits :" . $h . "<br/>";
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
                    echo "hasil wrapping ke kanan 1 bits:" . $b . "</br>";
//**dekripsi cbc prosesnya**//
                    //proses dekripsi cbc
                    $hasil[$m] = $b;
                    $plaint = "$b";
                    $plr = "$p[$m]";
                    $kunci = "$k[$m]";
//                echo "pb" . $plr . "<br/>";
                    echo "cipherteks:" . $plaint . "<br/>";
                    echo "kunci:" . $kunci . "<br/>";
                    echo "iv :" . $iv . "<br/>";
                    $d = $plaint ^ $kunci;
                    $h = $d ^ $iv;
                    $hasil[$m] = $h;
                    $iv = "$plr";
                    echo"Hasil plainteknya:" . $h . "<br/>";
                }
//**mengubah ke char**//
                echo "<b>" . "hasil dekripsi cbc murni:</b>" . "</br>";
                $a = '';
                echo 'hasil cbc murni biner:';
                for ($j = 0; $j < $count_p; $j++) {
                    echo $hasil[$j] . " ";
                    $a = $a . chr(bindec($hasil[$j]));
                }
                echo "<br/>";
                echo "hasil dekripsi cbc murni teks :" . "</br>";
                echo '<textarea rows="2" id="result" cols="50">';
                echo $a;
                echo '</textarea><br/>';
        } else {
                echo "string anda bukan hexa desimal !" . "</br>";
            }
            return $a;
}


//**DEKRIPSI CBC MODIFIKASI
function proses_auto_dek_cbc_modifikasi($kata,$kunci){
    echo "<b>dekripsi cbc modifikasi</b>".'</br>';
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
                echo '<textarea rows="5" id="result" cols="50">';
                echo $a;
                echo '</textarea><br/>';
            } else {
                echo "string anda bukan hexa desimal !" . "</br>";
            }
            return $a;
}

function proses_manual_dek_cbc_modifikasi($kata,$kunci){
                echo "<b>dekripsi cbc modifikasi</b>".'</br>';
                echo "<b>memasangkan kunci dan cipherteks</b>" . "</br>";
                echo "menampilkan cipherteks:" . $kata . "</br>";
                echo 'mengubah hexa ke biner:';
                $kata=hex_to_bin($kata);
                echo $kata.'</br>';
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
                echo "<b>memecah string menjadi 8 bits</b>" . "</br>";
                echo "cipherteks:" . "</br>";
                print_r($p);
                echo "</br>";
                echo "kunci:" . "</br>";
                $k = array($d);
                $k = implode("", $k);
                $k = str_split($k, 8);
                $count_k = count($k);
                print_r($k);
                echo "</br>";

                for ($i = 0; $i < $len_plaint; $i++) {
                    $hasil[$i] = $kata[$i];
                }


                echo "asli cipherteks:";
                for ($i = 0; $i < $len_plaint; $i++) {
                    echo $hasil[$i];
                }
                echo "</br>";
                echo "<b>mengembalikan ke bentuk asal berdasarkan indeks per blok</b>" . "</br>";
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
                        echo $hasil[$i] . "</br>";
                        $i++;
                    }
                }
                echo "hasil setelah dikembalikan:";
                $h = '';
                for ($L = 0; $L < $count_p; $L++) {
                    $h.=$hasil[$L];
                    echo $hasil[$L];
                }
                echo '</br>';
                echo'<b>proses dekripsi:</b>';
                echo "</br>";
                //**dekripsi cbc**//
                $p = array($h);
                $p = implode("", $p);
                $p = str_split($p, 8);
                echo "cipherteks:";
                print_r($p);
                echo "</br>";
                echo "kunci:";
                print_r($k);
                echo "</br>";

                //**dekripsi **//
                $iv = "00000000";
                $hasil;
                for ($m = 0; $m < $count_p; $m++) {
                    $h = "$p[$m]";
                    $h2 = strlen($h);
                    $split_h = str_split($h);
                    echo "hasil sebelum wrapping 1 bits :" . $h . "<br/>";
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
                    echo "hasil wrapping ke kanan 1 bits:" . $b . "</br>";
//**dekripsi cbc prosesnya**//
                    //proses dekripsi cbc
                    $hasil[$m] = $b;
                    $plaint = "$b";
                    $plr = "$p[$m]";
                    $kunci = "$k[$m]";
//                echo "pb" . $plr . "<br/>";
                    echo "cipherteks:" . $plaint . "<br/>";
                    echo "kunci:" . $kunci . "<br/>";
                    echo "iv :" . $iv . "<br/>";
                    $d = $plaint ^ $kunci;
                    $h = $d ^ $iv;
                    $hasil[$m] = $h;
                    $iv = "$plr";
                    echo"Hasil plainteksnya:" . $h . "<br/>";
                }
//**mengubah ke char**//
                 echo "<b>" . "hasil dekripsi cbc modifikasi:</b>" . "</br>";
                echo "hasil dekripsi dalam biner :";
                $a = '';
                for ($j = 0; $j < $count_p; $j++) {
                    echo $hasil[$j] . " ";
                    $a = $a . chr(bindec($hasil[$j]));
                }
                echo "<br/>";
                echo "hasil dekripsi cbc modifikasi dalam teks:" . "</br>";
                echo '<textarea rows="2" id="result" cols="50">';
                echo $a;
                echo '</textarea><br/>';
        } else {
              echo "string anda bukan hexa desimal !" . "</br>";
            }
            return $a;
}

?>

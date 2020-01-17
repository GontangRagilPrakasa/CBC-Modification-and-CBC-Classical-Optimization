<?php


    function char_to_desimal($a) {
        $i = ord($a);
        if ($i >= 0 && $i <= 255) {
            return ($i);
        } else {
            return NULL;
        }
    }

    function desimal_to_char($a){
        $i=chr($a);
         if ($i >= 0 && $i <= 255) {
            return ($i);
        } else {
            return NULL;
        }

    }

    function decimal_to_biner($a){
        $y = "";
        $decimal = $a;
        for ($i = ($decimal); $i >= 1; $i = (floor($i)) / 2) {
            if (($i % 2) != 0) {
                $y.=1;
            } else {
                $y.=0;
            }
        }
        $bin = strrev($y);
        $bin = substr("00000000", 0, 8 - strlen($bin)) . $bin;
        return $bin;
    
}
   function bin_to_hex($a) {
        $bin = array($a);
        $bin = implode("", $bin);
        $biner = str_split($bin, 4);
        $count_biner = count($biner);
        //  echo "biner:";
        //  print_r($biner);

        $str = $bin;

//tabel konversi hexa

        $binary['0000'] = "0";
        $binary['0001'] = "1";
        $binary['0010'] = "2";
        $binary['0011'] = "3";
        $binary['0100'] = "4";
        $binary['0101'] = "5";
        $binary['0110'] = "6";
        $binary['0111'] = "7";
        $binary['1000'] = "8";
        $binary['1001'] = "9";
        $binary['1010'] = "A";
        $binary['1011'] = "B";
        $binary['1100'] = "C";
        $binary['1101'] = "D";
        $binary['1110'] = "E";
        $binary['1111'] = "F";


        $inhex = "";

//konversi binary ke hexa
        for ($i = 0; $i < strlen($str); $i = $i + 4) {
            $set = substr($str, $i, 4);
            $inhex .= $binary[$set];
        }
        $inhex;
        return $inhex;
    }

    function hex_to_bin($a) {
        $str = $a;
        $jm = '0';
        $st = strlen($str);
        if ($st % 2 != 0) {
//tabel konversi hexa
            $str = $str . $jm;
            $hexa['*'] = "";
            $hexa['0'] = "0000";
            $hexa['1'] = "0001";
            $hexa['2'] = "0010";
            $hexa['3'] = "0011";
            $hexa['4'] = "0100";
            $hexa['5'] = "0101";
            $hexa['6'] = "0110";
            $hexa['7'] = "0111";
            $hexa['8'] = "1000";
            $hexa['9'] = "1001";
            $hexa['A'] = "1010";
            $hexa['B'] = "1011";
            $hexa['C'] = "1100";
            $hexa['D'] = "1101";
            $hexa['E'] = "1110";
            $hexa['F'] = "1111";
            $hexa['a'] = "1010";
            $hexa['b'] = "1011";
            $hexa['c'] = "1100";
            $hexa['d'] = "1101";
            $hexa['e'] = "1110";
            $hexa['f'] = "1111";

            $inhex = "";

//konversi Hexa ke Biner
            for ($i = 0; $i < strlen($str); $i = $i + 1) {
                $set = substr($str, $i, 1);
                $inhex .= $hexa[$set];
            }
            $inhex;
            return $inhex;
        } else if ($st % 2 == 0) {

            $str;
//tabel konversi hexa
            $hexa['*'] = "";
            $hexa['0'] = "0000";
            $hexa['1'] = "0001";
            $hexa['2'] = "0010";
            $hexa['3'] = "0011";
            $hexa['4'] = "0100";
            $hexa['5'] = "0101";
            $hexa['6'] = "0110";
            $hexa['7'] = "0111";
            $hexa['8'] = "1000";
            $hexa['9'] = "1001";
            $hexa['A'] = "1010";
            $hexa['B'] = "1011";
            $hexa['C'] = "1100";
            $hexa['D'] = "1101";
            $hexa['E'] = "1110";
            $hexa['F'] = "1111";
            $hexa['a'] = "1010";
            $hexa['b'] = "1011";
            $hexa['c'] = "1100";
            $hexa['d'] = "1101";
            $hexa['e'] = "1110";
            $hexa['f'] = "1111";

            $inhex = "";

//konversi Hexa ke Biner
            for ($i = 0; $i < strlen($str); $i = $i + 1) {
                $set = substr($str, $i, 1);
                $inhex .= $hexa[$set];
            }
            $inhex;
            return $inhex;
        }



        function bin_to_dec($a) {
            $bin = array($a);
            $bin = implode("", $bin);
            $biner = str_split($bin, 4);
            $count_biner = count($biner);
            //print_r($biner);
            $str = $bin;

//tabel konversi ke desimal

            $binary['0000'] = "0";
            $binary['0001'] = "1";
            $binary['0010'] = "2";
            $binary['0011'] = "3";
            $binary['0100'] = "4";
            $binary['0101'] = "5";
            $binary['0110'] = "6";
            $binary['0111'] = "7";
            $binary['1000'] = "8";
            $binary['1001'] = "9";
            $binary['1010'] = "10";
            $binary['1011'] = "11";
            $binary['1100'] = "12";
            $binary['1101'] = "13";
            $binary['1110'] = "14";
            $binary['1111'] = "15";

            $inhex = "";

//konversi binary ke hexa
            for ($i = 0; $i < strlen($str); $i = $i + 4) {
                $set = substr($str, $i, 4);
                $inhex .= $binary[$set];
            }
            $inhex;
            return $inhex;
        }

    }
?>

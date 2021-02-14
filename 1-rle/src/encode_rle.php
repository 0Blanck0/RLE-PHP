<?php

function encode_rle(string $str) {
    if (is_string($str)) {
        $i = 0;
        $a = 0;
        $prec = '';
        $result = '';

        while ($i < strlen($str)) {
            if (($str[$i] >= "A" && $str[$i] <= "Z") || ($str[$i] >= "a" && $str[$i] <= "z")) {

                if ($prec == '')
                    $prec = $str[$i];

                if ($str[$i] == $prec)
                    $a++;
                else {
                    $result = "$result"."$a"."$prec";
                    $prec = $str[$i];
                    $a = 1;
                }

                $i++;
            } else
                return "$$$";
        }

        if ($a != 0)
            $result = "$result"."$a"."$prec";

        return $result;
    } else
        return "$$$";
}

?>

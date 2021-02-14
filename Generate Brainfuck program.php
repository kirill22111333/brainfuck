<?php

    function bf_encode(string $target): string{
        $out = '++++++++[>++++[>++>+++>+<<<-]<-]>>+>+<';
        $lUp = 'A'; $lLow = 'a'; $lPun = ' ';
        for($i=0; $i<strlen($target); ++$i) {
        $c = $target[$i];
        if (ctype_upper($c)) {
            $out .= write($c, $pos, $lUp, '<', '<<', 1, 2);
            $lUp = $c;
            $pos = 0;
            continue;
        }
        if (ctype_lower($c)) {
            $out .= write($c, $pos, $lLow, '>', '<', 0, 2);
            $lLow = $c;
            $pos = 1;
            continue;
        }
        $out .= write($c, $pos, $lPun, '>>', '>', 0, 1);
        $lPun = $c;
        $pos = 2;
        }
        return $out ?: '';
    }
    function updates($c, $l) {
        if ($c > $l) $out .= str_repeat('+', $c-$l); elseif ($c < $l) $out .= str_repeat('-', $l-$c);
        return $out;
    }
    function write($c, $p, $l, $min, $max, $num1, $num2) {
        if ($p == $num1) $out .= $min; elseif ($p == $num2) $out .= $max;
        return $out.updates(ord($c), ord($l)).'.';
    }

  var_dump(bf_encode('Hello World!'));
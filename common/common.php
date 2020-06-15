<?php

function sanitize($before){
    foreach($before as $key=>$value){
        $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    return $after;
}


function rnd_str($length) {
    $result = null;
    $str = array_merge(range('a','z'), range('A','Z'), range('0','9'));
    for ($i = 0; $i < $length; $i++) {
        $result .= $str[rand(0, count($str)-1)];
    }
    return $result;
}

?>
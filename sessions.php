<?php

session_start();
$loginCheck = $_SESSION['loginCheck'] ?? false;

$user_name = 'admin';
$pass_word = '1234';

function login(){
    session_regenerate_id(true);
    $_SESSION['loginCheck']=true;
}

function logout(){
    $_SESSION=[];

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time()-2, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

    session_destroy();

}

function require_login($loginCheck){
    if($loginCheck == false){
        header('Location: login.php');
        exit;
    }
}


?>
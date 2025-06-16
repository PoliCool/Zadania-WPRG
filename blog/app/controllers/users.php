<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include(ROOT_PATH.'app/database/db.php');

$errors = [];
function loginUser($user){
    $_SESSION['user_id']=$user['id'];
    $_SESSION['username']=$user['username'];
    $_SESSION['admin']=$user['admin'];
    $_SESSION['message']='You are now logged in';
    $_SESSION['type']='success';
    header('Location:'.BASE_URL.'/index.php');

    /*przekierowanie*/
    if($_SESSION['admin']==1){
        header('Location:'.BASE_URL.'/admin/dashboard.php');
    }else{
        header('Location:'.BASE_URL.'/index.php');
    }
    exit();
}
if(isset($_POST['register_button'])){
    $errors = array();

    /*Walidacja czy coś jest w formularzu*/
    if(empty($_POST['username'])){
        array_push($errors,'Username is required');
    }
    if(empty($_POST['email'])){
        array_push($errors,'Email is required');
    }
    if(empty($_POST['password'])){
        array_push($errors,'Password is required');
    }

    if($_POST['password_confirmation'] !== $_POST['password']){
        array_push($errors,'Passwords do not match');
    }
    /*dd($errors);*/
    $existingUser = selectOne('users',['email'=>$_POST['email']]);
    if(isset($existingUser)){
        array_push($errors,'Email already exists');
    }
    if(count($errors)===0){
        unset($_POST['register_button'], $_POST['password_confirmation']);
        $_POST['admin']=0;
        /*hashowanie hasła*/
        $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $user_id=create('users',$_POST);
        $user = selectOne('users',['id'=>$user_id]);

        /*LOGOWANIE PO REJESTRACJI*/
    loginUser($user);
    }
}

/*LOGOWANIE*/
if(isset($_POST['login_button'])){
    $errors = array();
    if(empty($_POST['username'])){
        array_push($errors,'Username is required');
    }
    if(empty($_POST['password'])){
        array_push($errors,'Password is required');
    }
    if(count($errors)===0){
        $user = selectOne('users',['username'=>$_POST['username']]);
        if($user && password_verify($_POST['password'],$user['password'])){
            loginUser($user);
        }else{
            array_push($errors,'Wrong username or password');
        }
    }
}
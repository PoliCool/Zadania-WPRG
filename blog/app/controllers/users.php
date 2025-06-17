<?php

include(ROOT_PATH.'app/database/db.php');
include(ROOT_PATH.'app/helpers/middleware.php');
$table='users';
$admin_users = selectAll($table,['admin'=>1]);

$errors = array();
$id="";
$username="";
$email="";
$password="";
$passwordConfirmation="";

$errors = [];
function loginUser($user){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    // Przekierowanie zależnie od roli
    if ($_SESSION['admin'] == 1) {
        header('Location: ' . BASE_URL . '/admin/users/create.php');
    } else {
        header('Location: ' . BASE_URL . '/index.php');
    }
    exit();
}


/*rejestracja*/

if(isset($_POST['register_button']) || isset($_POST['create_admin'])){
    $errors = array();

    if(empty($_POST['username'])){
        array_push($errors,'Username is required');
    }
    if(empty($_POST['email'])){
        array_push($errors,'Email is required');
    }

    if(empty($_POST['email'])){
        array_push($errors,'Email is required');
    } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        array_push($errors, 'Email format is invalid');
    }

    if(empty($_POST['password'])){
        array_push($errors,'Password is required');
    }
    if($_POST['password_confirmation'] !== $_POST['password']){
        array_push($errors,'Passwords do not match');
    }

    $existingUser = selectOne('users',['email'=>$_POST['email']]);
    if(isset($existingUser)){
        array_push($errors,'Email already exists');
    }

    if(count($errors) === 0){
        unset($_POST['register_button'], $_POST['password_confirmation'], $_POST['create_admin']);

        // Hashowanie hasła
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Czy to admin?
        if(isset($_POST['admin'])){
            $_POST['admin'] = 1;
        } else {
            $_POST['admin'] = 0;
        }

        $user_id = create('users', $_POST);
        $user = selectOne('users', ['id' => $user_id]);

        // Jeśli admin tworzony, przekierowanie
        if(isset($_POST['create_admin'])){
            $_SESSION['message'] = 'Admin user created successfully';
            $_SESSION['type'] = 'success';
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            // Zwykły użytkownik loguje się od razu
            loginUser($user);
        }
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

if(isset($_GET['delete_id'])){
    $count = delete($table,$_GET['delete_id']);
    $_SESSION['message'] = 'User deleted successfully';
    $_SESSION['type'] = 'success';
    header('Location:' . BASE_URL . '/admin/users/index.php');
    exit();
}

if(isset($_GET['id'])){
    $user = selectOne($table,['id'=>$_GET['id']]);

    $id =$user['id'];
    $username =$user['username'];
    $admin=isset($user['admin']) ? 1 : 0;
    $eamil=$user['email'];
}





if(isset($_POST['update_user'])){
    $errors = array();

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

    $existingUser = selectOne('users',['email'=>$_POST['email']]);
    if(isset($existingUser)){
        array_push($errors,'Email already exists');
    }

    if(count($errors) === 0){
        $id=$_POST['id'];
        unset( $_POST['password_confirmation'], $_POST['update_user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table,$id,$_POST);
        $SESSION['message'] = 'User updated successfully';
        $SESSION['type'] = 'success';
        header('Location:' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
           $username=$_POST['username'];
           $admin=isset($_POST['admin']) ? 1 : 0;
           $eamil=$_POST['email'];
           $password=$_POST['password'];
           $passwordConfirmation=$_POST['password_confirmation'];
        }
}
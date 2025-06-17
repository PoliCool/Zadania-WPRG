<?php
function usersOnly($redirect = '/index.php'){
if(empty($_SESSION['id'])){
    $_SESSION['message'] = 'You must be logged in to view this page';
    $_SESSION['type'] = 'erorr';
    header('Location:'.BASE_URL.$redirect);
    exit(0);
}
}
function adminOnly($redirect = '/index.php'){
    if(empty($_SESSION['user_id']) || empty($_SESSION['admin'])){
        $_SESSION['message'] = 'You are not authorized to view this page';
        $_SESSION['type'] = 'error';
        header('Location:'.BASE_URL.$redirect);
        exit(0);
    }
}

function guestsOnly($redirect = '/index.php'){
    if(isset($_SESSION['id'])){
        header('Location:'.BASE_URL.$redirect);
        exit(0);
    }
}
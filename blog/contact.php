<?php
include("path.php");
include(ROOT_PATH . 'app/database/db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    create('messages', ['email' => $email, 'message' => $message]);


    $_SESSION['type'] = "success";
    header('Location: ' . BASE_URL);
    exit();
} else {
    header('Location: ' . BASE_URL);
    exit();
}

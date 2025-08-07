<?php
session_start();
require_once 'config.php';
$errors=[
    'login'=> $_SESSION['login_error'] ?? '',
    'register'=>$_SESSION['register_error'] ?? ''
];
$activeForm= $_SESSION['active_form'] ?? 'login';

session_unset();

function showError($errors) {
    return !empty($errors) ? "<p class='error-message'>{$errors}</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>



<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carworkshop</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<style>
    .main{
        width:100%;
        background:linear-gradient(rgba(16, 140, 223, 0.5), rgba(12, 102, 187, 0.5)),url('b1.jpeg');
        background-position: center;
        background-size:cover;
        position: relative;
        height: 920px;
    }
</style>
<body>
<div class="main">

<div class="container">
    <div class="form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
        <form action="log_reg.php" method='post'>
            <h2>Login</h2>
            <?= showError($errors['login']); ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            <h4>Login as <a href="adminlogin.php">Admin</a></h4>
        </form>
    </div>


    <div class="form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
        <form action="log_reg.php" method='post'>
            <h2>Register</h2>
            <?= showError($errors['register']); ?>
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
            <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            
        </form>
    </div>
</div>
</div>




<script src="script.js"></script>
</body>
</html>
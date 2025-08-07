<?php
session_start();
require_once 'config.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $checkEmail = $conn->query("SELECT email from users WHERE email='$email'");
    if ($checkEmail->num_rows > 0){
        $_SESSION['register_error'] = 'Email already exists!';
        $_SESSION['active_form'] = 'register';
    }
    else{
        $conn->query("INSERT INTO users(name, email, password, role) VALUES('$name', '$email', 'password', '$role')");  
    }
header('Location: index.php');
exit() ;
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        header('location: user.php');
        exit();
    } else {
        $_SESSION['login_error'] = 'Invalid email or password!';
        $_SESSION['active_form'] = 'login';
    }
    header('Location: index.php');
    exit();

}


if(isset($_POST['add_mechanic'])){
    $name = $_POST['MechanicName'];
    $phone = $_POST['phone'];

    $checkname = $conn->query("SELECT name from mechanicinfo  WHERE name='$name'");
    if ($checkname->num_rows > 0){
        $_SESSION['add_mechanic_error'] = 'Mechanic already exists!';
        $_SESSION['active_form'] = 'add_mechanic';
    }
    else{
        $conn->query("INSERT INTO mechanicinfo (name, phone) VALUES('$name', '$phone')");  
    }
    $_SESSION['add_mechanic_success'] = 'Mechanic added successfully!';
    $_SESSION['active_form'] = 'add_mechanic';

header('Location: add_mechanic.php');
exit() ;
}


?>
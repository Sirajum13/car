<?php
session_start();
require_once 'config.php';

$errors=[
    'login'=> $_SESSION['login_error'] ?? '',
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
        <form action="adminlogin.php" method='post'>


            <h2>Login as Admin</h2>
            <?= showError($errors['login']); ?>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            <p>Login as <a href="index.php">User</a></p>
        </form>
    </div>

<?php
    if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

   $result = $conn->query("SELECT * FROM adminlogin WHERE email='$email' AND password='$password'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;
        header('location: admin.php');
        exit();
    } else {
        $_SESSION['login_error'] = 'Invalid email or password!';
        $_SESSION['active_form'] = 'login';
    }
    header('Location: adminlogin.php');
    exit();

}
?>
<script src="script.js"></script>
</body>
</html>
<?php
session_start();
require_once 'config.php';

$errors=[
    'add_mechanic'=>$_SESSION['add_mechanic_error'] ?? ''
];
$activeForm= $_SESSION['active_form'] ?? 'add_mechanic';

session_unset();

function showError($errors) {
    return !empty($errors) ? "<p class='error-message'>{$errors}</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>mechanic</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="user.css">
</head>
<body>
<div class="container">
    <div class="form-box <?= isActiveForm('add_mechanic', $activeForm); ?>" id="mechanicform">
        <h2 style= "color: #1d1f85ff">Add mechanic information</h2>
        <form action="log_reg.php" method="post">
            <input type="text" name="MechanicName" placeholder="Mechanic Name" required>
   
            <input type="tel" name="phone" placeholder="Phone Number" required>

           <button type="submit" name="add_mechanic">Add Mechanic</button>          

        </form>   
    </div>
</div>


<div class="footer"> <a href="admin.php">Go back to admin Page</a></div>

</body>
</html>
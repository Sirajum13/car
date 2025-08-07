<?php
session_start();
require_once 'config.php';

$name = $_GET['id'] ?? '';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="admin.css">
    
    <title>Change Appointment</title>
</head>

<body>
    <div class="header">
        <a href="admin.php">Back to Admin Dashboard</a>
    </div>

    <div id="changeFormDiv">

        <p style="text-align: center; margin-top: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:38px; color: #ffffffff;">Client Name: <?php echo $name; ?></p>
        <p style="text-align: center; margin-top: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:18px; color: #1b1830ff;">Change Date: </p>

        <form action="apchange.php" method="POST">
            <input type="date" name="appointment_date" placeholder="Appointment Date" required>
            <button type="submit" name="Change" 
               style="align-items: center; 
               background-color: #6747a3ff; color: #d1c4ebff ;
               border: none; border-radius: 15px;">Change</button>

              <?php
            if (isset($_POST['Change'])) {
                $date = $_POST['appointment_date'];
                $query = "UPDATE appointment SET appointment_date='$date' WHERE name='$name'";
                if (mysqli_query($conn, $query)) {
                    echo "<p style='color: green; text-align: center;'>Appointment date changed successfully!</p>";
                } else {
                    echo "<p style='color: red; text-align: center;'>Error changing appointment date: " . mysqli_error($conn) . "</p>";
                }
            }
        ?>
        </form>

    </div>

</body>
  
</html>

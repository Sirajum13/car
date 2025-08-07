<?php
session_start();
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="user.css">
</head>
<body>
<div class="container">
    <div class="form-box active" id="Appointmentform">
        <h1>Car Workshop</h1>
        <h3>Book a Service Appointment</h3>
        <form action="user.php" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="address" placeholder="Address" required> 
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <input type="text" name="car_license" placeholder="Car License No." required>
            <input type="text" name="engine" placeholder="Car Engine No." required>

            <h4 style="font-size: 18px; color: #474b57; margin-bottom: 10px; text-align:left ">Select preferred date:</h4>
            <input type="date" name="appointment_date" placeholder="Appointment Date" required>
           
            <select id="mechanic_id" name="mechanic_id">
                <option value="">select a mechanic</option>


                <?php
                        $query = "SELECT * FROM mechanicinfo;";
                        $result = mysqli_query($conn, $query);
                        $datas = array();

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $datas[] = $row;
                            }
                        }
                    

                        foreach ($datas as $data) {
                            $id = $data['ID'];
                            $checkSlotQuery = "SELECT * FROM appointment where apt_date = '$date' AND ID = '$id';";
                            $slotResult = mysqli_query($conn, $checkSlotQuery);
                            $resultCount = mysqli_num_rows($slotResult);
                            $resultCount = 4 - $resultCount;
                            if ($resultCount == 0) {
                                echo "<option disabled value=" . $data['ID'] . ">" . $data['name'] . " (Slots Available: " .  $resultCount . ")" . "</option>";
                            } else {
                                echo "<option value=" . $data['ID'] . ">" . $data['name'] . " (Slots Available: " .  $resultCount . ")" . "</option>";
                            }
                        }
                        ?>
            </select>

            <button type="submit" name="book_appointment">Book Appointment</button>

        </form>
        <?php
        if (isset($_POST['book_appointment'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $car_license = $_POST['car_license'];
            $engine = $_POST['engine'];
            $appointment_date = $_POST['appointment_date'];
            $mechanic_id = $_POST['mechanic_id'];

            // Check for existing car license or engine number
            $check_sql = "SELECT * FROM appointment WHERE license_no='$car_license' OR engine_no='$engine'";
            $check_result = $conn->query($check_sql);

            if ($check_result->num_rows > 0) {
                echo "<script>alert('Car already booked.');</script>";
            } else {
                $sql = "INSERT INTO appointment (name, email, address, phone, license_no, engine_no, appointment_date, mechanic_id)
                        VALUES ('$name', '$email', '$address', '$phone', '$car_license', '$engine', '$appointment_date', '$mechanic_id')";
                if ($conn->query($sql)) {
                    echo "<script>alert('Appointment booked successfully!');</script>";
                } else {
                    echo "<script>alert('Error: " . $conn->error . "');</script>";
                }
            }
        }
        ?>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>
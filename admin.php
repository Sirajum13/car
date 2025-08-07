<?php
session_start();
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
   <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <div class="main">
        <?php
        $query = "SELECT a.id, a.name AS client_name, a.phone AS client_phone, a.license_no AS car_license, a.engine_no AS engine_no, 
            a.appointment_date, m.name AS mechanic_name FROM appointment a LEFT JOIN mechanicinfo m ON a.mid = m.id
     ORDER BY a.appointment_date DESC";
        $result = mysqli_query($conn, $query);
        $datas = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }
        } ?>
        <h2 style="text-align: center; font-size: 34px; color: #252296ff;">All Appointments</h2>


        <table id="apts">
            <tr>
                <th>ID</th>
                <th>Mechanic</th>
                <th>User</th>
                <th>Car Serial no</th>
                <th>Engine no</th>
                <th>Appointment Date</th>
                <th>Action</th>
            
                
            </tr>
            <?php
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td>
                        <?php echo $data['id']; ?>
                    </td>
                    <td>
                        <?php echo $data['mechanic_name']; ?>
                    </td>
                    <td>
                        <?php echo $data['client_name']; ?>
                    </td>
                    <td>
                        <?php echo $data['car_license']; ?>
                    </td>
                    <td>
                        <?php echo $data['engine_no']; ?>
                    </td>
                    <td>
                        <?php echo $data['appointment_date']; ?>
                    </td>
    
                    <td>
                        <a href="apchange.php?id=<?php echo $data['client_name']; ?>" class="btn" id="edit" name="edit">Edit</a>
                    </td>
                </tr>
            <?php
            }
        ?>
        </table>
    </div>



   <div class="mechanic">
        <h2 style="text-align: center; font-size: 34px; color: #252296ff;">Mechanic Information</h2>
        <table id="apts">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
            </tr>
            <?php
            $query = "SELECT * FROM mechanicinfo";
            $result = mysqli_query($conn, $query);
            $mechanics = array();

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $mechanics[] = $row;
                }
            }

            foreach ($mechanics as $mechanic) {
            ?>
                <tr>
                    <td>
                        <?php echo $mechanic['ID']; ?>
                    </td>
                    <td>
                        <?php echo $mechanic['name']; ?>
                    </td>
                    <td>
                        <?php echo $mechanic['phone']; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

        <button class="mbtn" id="add-mechanic"><a href="add_mechanic.php">Add Mechanic</a></button>
  
   </div>

<div class="footer"> <a href="logout.php">Logout</a></div>






</body>

</html>




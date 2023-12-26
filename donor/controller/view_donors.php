<?php
session_start();
require_once('../model/database.php');

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$db = new Database();
$conn = $db->getConnection();
$user_id = $_SESSION["user"]["id"];

$selectStmt = $conn->prepare("SELECT id, name, blood_group, phone, email, address, donation_count FROM donors WHERE user_id = ?");
$selectStmt->bind_param("i", $user_id);
$selectStmt->execute();
$selectStmt->bind_result($donor_id, $name, $blood_group, $phone, $email, $address, $donation_count);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Donors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .delete-btn {
            background-color: #ff5858;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #ff0000;
        }
    </style>
</head>
<body>

    <h2>Your Donors</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Donation Count</th>
            <th>Action</th>
        </tr>

        <?php
        while ($selectStmt->fetch()) {
            echo '<tr>
            <td>'.$donor_id.'</td>
            <td>'.$name.'</td>
            <td>'.$blood_group.'</td>
            <td>'.$phone.'</td>
            <td>'.$email.'</td>
            <td>'.$address.'</td>
            <td>'.$donation_count.'</td>
            <td><a href="delete_donors.php?IdParcel=<?php echo $user_id?>" style="color: Red;">Delete Profile</a></td>
        </tr>';
        
        }
        ?>

    </table>

    <script>

    </script>

</body>
</html>

<?php
$selectStmt->close();
$conn->close();
?>

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


$selectStmt = $conn->prepare("SELECT message FROM notifications WHERE user_id = ?");
$selectStmt->bind_param("i", $user_id);
$selectStmt->execute();
$selectStmt->bind_result($message);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donation Notifications</title>
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
        }

        th, td {
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>

    <h2>Notifications</h2>
    
    <table border="1">
        <tr>
            <th>Message</th>
        </tr>

        <?php
        while ($selectStmt->fetch()) {
            echo "<tr><td>$message</td></tr>";
        }
        ?>

    </table>

</body>
</html>

<?php
$selectStmt->close();
$conn->close();
?>

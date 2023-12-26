<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../controller/css/style.css" />
    <title>Donor Dashboard</title>
    
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 10px;
        }

        table {
            border: 1px solid black;
            margin: auto;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: darkblue; /* You can change this color as needed */
        }

        a:hover {
            color: #3498db;
        }
    </style>
</head>
<body>

    <h1>Donor Dashboard</h1>
    <h2>Welcome, <?php echo $_SESSION["user"]["first_name"]; ?>!</h2>

    <table border="1">
        <tr>
            <td>
                <ul>
                    <li><a href="../controller/index.php">Donor Data</a></li>                   
                    <li><a href="../controller/donor_feedback.php">Donor Feedback</a></li>
                    <li><a href="../controller/blood_banks.php">Blood Banks</a></li>
                    <li><a href="../controller/notification.php">Notification</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>

            <td style="text-align: right;">
            </td>
        </tr>
    </table>

</body>
</html>

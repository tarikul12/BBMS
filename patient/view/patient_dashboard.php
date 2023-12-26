<?php
session_start();

// Check if the user is logged in, redirect to login page if not
if (!isset($_SESSION["patient"])) {
    header("Location: patient_login.php");
    exit();
}

// Retrieve patient data from the session
$patient_data = $_SESSION["patient"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $patient_data["first_name"]; ?>!</h2>

    <p>This is your patient dashboard. Add your content and features here.</p>

    <ul>
        <li><a href="#">View Medical Records</a></li>
        <li><a href="#">Schedule Appointments</a></li>
        <li><a href="#">Update Profile</a></li>
        <li><a href="../controller/process_patient_logout.php">Logout</a></li>
    </ul>
</body>
</html>

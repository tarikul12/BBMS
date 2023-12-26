<!-- process_update_patient_profile.php -->
<?php
session_start();
require_once('../model/mydb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["patient"])) {
    $db = new MyDB();
    $conn = $db->getConnection();

    $patient_data = $_SESSION["patient"];
    $patient_id = $patient_data["id"];

    // Example: Update patient's profile information
    $new_first_name = $_POST["new_first_name"];
    $new_last_name = $_POST["new_last_name"];

    $updateProfile = $conn->prepare("UPDATE patients SET first_name = ?, last_name = ? WHERE id = ?");
    $updateProfile->bind_param("ssi", $new_first_name, $new_last_name, $patient_id);
    $updateProfile->execute();
    $updateProfile->close();

    $_SESSION["patient"]["first_name"] = $new_first_name;
    $_SESSION["patient"]["last_name"] = $new_last_name;

    $conn->close();

    header("Location: ../views/patient_dashboard.php");
    exit();
} else {
    header("Location: ../views/patient_login.php");
    exit();
}
?>

<!-- process_schedule_appointment.php -->
<?php
session_start();
require_once('../model/mydb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["patient"])) {
    $db = new MyDB();
    $conn = $db->getConnection();

    $patient_data = $_SESSION["patient"];
    $patient_id = $patient_data["id"];

    // Example: Insert appointment information into the database
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["appointment_time"];
    $appointment_notes = $_POST["appointment_notes"];

    $insertAppointment = $conn->prepare("INSERT INTO appointments (patient_id, appointment_date, appointment_time, appointment_notes) VALUES (?, ?, ?, ?)");
    $insertAppointment->bind_param("iss", $patient_id, $appointment_date, $appointment_time, $appointment_notes);
    $insertAppointment->execute();
    $insertAppointment->close();

    $conn->close();

    header("Location: ../views/patient_dashboard.php");
    exit();
} else {
    header("Location: ../views/patient_login.php");
    exit();
}
?>

<!-- process_patient_logout.php -->
<?php
session_start();

// Destroy the session and redirect to login page
session_destroy();
header("Location: ../views/patient_login.php");
exit();
?>

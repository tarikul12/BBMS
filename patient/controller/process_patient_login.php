<?php
session_start();
require_once('../model/mydb.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];

    if ($email && strlen($password) >= 8) {
        $db = new patient(); // Assuming you have a MyDB class for database operations
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM patients WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $patient_data = $result->fetch_assoc();

            if (password_verify($password, $patient_data["password"])) {
                $_SESSION["patient"] = $patient_data;

                $updateLastLogin = $conn->prepare("UPDATE patients SET last_login_time = CURRENT_TIMESTAMP WHERE id = ?");
                $updateLastLogin->bind_param("i", $patient_data["id"]);
                $updateLastLogin->execute();
                $updateLastLogin->close();

                $logLogin = $conn->prepare("INSERT INTO patient_login (patient_id) VALUES (?)");
                $logLogin->bind_param("i", $patient_data["id"]);
                $logLogin->execute();
                $logLogin->close();

                if (isset($_POST['remember'])) {
                    $cookie_name = "remember_me";
                    $cookie_value = $patient_data["email"];
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                }

                header("Location: ../views/patient_dashboard.php");
                exit();
            } else {
                // Increment login attempts and update in patients table
                $updateLoginAttempts = $conn->prepare("UPDATE patients SET login_attempts = login_attempts + 1 WHERE id = ?");
                $updateLoginAttempts->bind_param("i", $patient_data["id"]);
                $updateLoginAttempts->execute();
                $updateLoginAttempts->close();

                header("Location: ../views/patient_login.php?error=Invalid login credentials");
                exit();
            }
        } else {
            header("Location: ../views/patient_login.php?error=Invalid login credentials");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        header("Location: ../views/patient_login.php?error=Invalid email or password format");
        exit();
    }
} else {
    echo "Invalid request!";
}
?>

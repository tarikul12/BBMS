<?php
session_start();
require_once('../model/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];

    if ($email && strlen($password) >= 8) {
        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();

            if (password_verify($password, $user_data["password"])) {
                $_SESSION["user"] = $user_data;


                $updateLastLogin = $conn->prepare("UPDATE users SET last_login_time = CURRENT_TIMESTAMP WHERE id = ?");
                $updateLastLogin->bind_param("i", $user_data["id"]);
                $updateLastLogin->execute();
                $updateLastLogin->close();

                $logLogin = $conn->prepare("INSERT INTO login (user_id) VALUES (?)");
                $logLogin->bind_param("i", $user_data["id"]);
                $logLogin->execute();
                $logLogin->close();

                if (isset($_POST['remember'])) {
                    $cookie_name = "remember_me";
                    $cookie_value = $user_data["email"];
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                }

                header("Location: ../views/dashboard.php");
                exit();
            } else {
                // Increment login attempts and update in users table
                $updateLoginAttempts = $conn->prepare("UPDATE users SET login_attempts = login_attempts + 1 WHERE id = ?");
                $updateLoginAttempts->bind_param("i", $user_data["id"]);
                $updateLoginAttempts->execute();
                $updateLoginAttempts->close();

                header("Location: ../views/login.php?error=Invalid login credentials");
                exit();
            }
        } else {
            header("Location: ../views/login.php?error=Invalid login credentials");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        header("Location: ../views/login.php?error=Invalid email or password format");
        exit();
    }
} else {
    echo "Invalid request!";
}
?>

<?php
require_once('../model/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();

    $first_name = validateName($_POST["first_name"]);
    $last_name = validateName($_POST["last_name"]);
    $email = validateEmail($_POST["email"]);
    $password = validatePassword($_POST["password"]);
    $dob = $_POST["dob"];
    $gender = validateGender($_POST["gender"]);
    $country = $_POST["country"];
    $phone = validatePhoneNumber($_POST["phone"]);
    $nid = validateNID($_POST["nid"]);
    $blood_type = $_POST["blood_type"];
    $terms = isset($_POST["terms"]) ? "Agreed" : "Not Agreed";

    if (empty($errors)) {
        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, dob, gender, country, phone, nid, blood_type, terms) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $first_name, $last_name, $email, $password, $dob, $gender, $country, $phone, $nid, $blood_type, $terms);

        if ($stmt->execute()) {
            header("Location: ../views/login.php");
            exit();
        } else {
            echo "Data is not saved. Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
} else {
    echo "Invalid request!";
}

function validateName($name)
{
    if (preg_match("/^[a-zA-Z ]+$/", $name)) {
        return htmlspecialchars($name);
    } else {
        global $errors;
        $errors[] = "Invalid name format.";
        return "";
    }
}

function validateEmail($email)
{
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email) {
        return $email;
    } else {
        global $errors;
        $errors[] = "Invalid email format.";
        return "";
    }
}

function validatePassword($password)
{
    if (strlen($password) >= 8) {
        return password_hash($password, PASSWORD_DEFAULT);
    } else {
        global $errors;
        $errors[] = "Password should be at least 8 characters.";
        return "";
    }
}

function validateGender($gender)
{
    if (!empty($gender)) {
        return $gender;
    } else {
        global $errors;
        $errors[] = "Please select a gender.";
        return "";
    }
}

function validatePhoneNumber($phone)
{
    if (preg_match("/^\d{11}$/", $phone)) {
        return htmlspecialchars($phone);
    } else {
        global $errors;
        $errors[] = "Invalid phone number format.";
        return "";
    }
}

function validateNID($nid)
{
    if (preg_match("/^\d{10}$/", $nid)) {
        return htmlspecialchars($nid);
    } else {
        global $errors;
        $errors[] = "Invalid NID format.";
        return "";
    }
}
?>

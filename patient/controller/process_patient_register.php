<?php

// Include the database class
require_once "../model/mydb.php";

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new patient();

    // Extract and sanitize form data
    $firstName = sanitizeInput($_POST["first_name"]);
    $lastName = sanitizeInput($_POST["last_name"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);
    $dob = sanitizeInput($_POST["dob"]);
    $gender = sanitizeInput($_POST["gender"]);
    $address = sanitizeInput($_POST["address"]);
    $phone = sanitizeInput($_POST["phone"]);
    $medicalHistory = sanitizeInput($_POST["medical_history"]);
    $terms = isset($_POST["terms"]) ? 1 : 0; 


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into the database
    $sql = "INSERT INTO patients (first_name, last_name, email, password, dob, gender, address, phone, medical_history, terms)
            VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$dob', '$gender', '$address', '$phone', '$medicalHistory', '$terms')";

    // Execute the query
    $result = $db->executeQuery($sql);

    // Check if the query was successful
    if ($result) {
        echo "Registration successful!";
        // Redirect to a success page or perform other actions
    } else {
        echo "Error: " . $db->getErrorMessage();
        // Handle the error appropriately
    }

    // Close the database connection
    $db->closeConnection();
}
?>

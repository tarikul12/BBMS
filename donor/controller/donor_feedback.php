<?php
session_start();
require_once('../model/database.php');

$errors = array();

// Create a new Database instance
$db = new Database();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donorName = $_POST["donor_name"];
    $feedbackMessage = $_POST["feedback_message"];
    $feedbackRating = $_POST["feedback_rating"];

    $insertStmt = $conn->prepare("INSERT INTO feedback (donor_name, rating, message) VALUES (?, ?, ?)");
    $insertStmt->bind_param("sis", $donorName, $feedbackRating, $feedbackMessage);

    if ($insertStmt->execute()) {
        // Feedback inserted successfully
    } else {
        echo "Data is not saved. Error: " . $insertStmt->error;
    }

    $insertStmt->close();
}

// Fetch existing feedback from the database
$selectStmt = $conn->prepare("SELECT donor_name, rating, message FROM feedback");
$selectStmt->execute();
$selectStmt->bind_result($donorName, $feedbackRating, $feedbackMessage);

$feedbackData = array();
while ($selectStmt->fetch()) {
    $feedbackData[] = [
        "donor_name" => $donorName,
        "rating" => $feedbackRating,
        "message" => $feedbackMessage
    ];
}

$selectStmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Feedback</title>

    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        /* Back button styles */
        #backButton {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #backButton:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <form method="post" action="donor_feedback.php">
        <h2 style="text-align: center;">Donor Feedback</h2>

        <label for="donor_name">Donor Name:</label>
        <input type="text" name="donor_name" required>

        <label for="feedback_message">Feedback Message:</label>
        <textarea name="feedback_message" rows="4" cols="50" required></textarea>

        <label for="feedback_rating">Rating (1-5):</label>
        <input type="number" name="feedback_rating" min="1" max="5" required>

        <button type="submit">Submit Feedback</button>
    </form>

    <h2 style="text-align: center;">Existing Feedback</h2>
    <ul>
        <?php foreach ($feedbackData as $feedback): ?>
            <li>
                <strong>Donor Name:</strong> <?php echo $feedback["donor_name"]; ?><br>
                <strong>Rating:</strong> <?php echo $feedback["rating"]; ?><br>
                <strong>Message:</strong> <?php echo $feedback["message"]; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <!-- Back button -->
    <button id="backButton" onclick="goBack()">Go Back</button>

    <script>
        // JavaScript function to go back
        function goBack() {
            window.history.back();
        }
    </script>

</body>
</html>

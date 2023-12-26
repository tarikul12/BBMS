<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your patient registration processing logic here
    include_once "process_patient_register.php";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Patient Registration Form</title>
</head>
<body>
    <h2>Patient Registration Form</h2>
    <form action="process_patient_register.php" method="post" enctype="multipart/form-data">
        <table cellspacing="10" cellpadding="10" border="1" align="center">
            <tr>
                <td>First Name:</td>
                <td><input type="text" id="first_name" name="first_name" required></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" id="last_name" name="last_name" required></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" id="password" name="password" required></td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input type="date" id="dob" name="dob" required></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <label><input type="radio" name="gender" value="Male" required> Male</label>
                    <label><input type="radio" name="gender" value="Female" required> Female</label>
                    <label><input type="radio" name="gender" value="Other" required> Other</label>
                </td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" id="address" name="address" required></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" id="phone" name="phone" required></td>
            </tr>
            <tr>
                <td>Medical History:</td>
                <td><textarea id="medical_history" name="medical_history" rows="4" cols="50" required></textarea></td>
            </tr>
            <tr>
                <td>Profile Picture:</td>
                <td><input type="file" id="profile_picture" name="profile_picture"></td>
            </tr>
            <tr>
                <td>Terms and Conditions:</td>
                <td><label><input type="checkbox" name="terms" required> I agree to the Terms and Conditions</label></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

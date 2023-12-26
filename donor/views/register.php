<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "process_register.php";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../controller/css/style.css" />
    <title>User Registration Form</title>
    <style>
        body {
            font-family: Helvetica, sans-serif;
        }

        table {
            border: 1px solid black;
            margin: auto;
        }

        th, td {
            padding: 10px;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>User Registration Form</h2>
    <form id="registrationForm" action="../controller/process_register.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                <td>Country:</td>
                <td>
                    <select id="country" name="country" required>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="India">India</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Japan">Japan</option>
                        <option value="Korea">Korea</option>
                        <option value="China">China</option>
                        <option value="Italy">Italy</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" id="phone" name="phone" required></td>
            </tr>
            <tr>
                <td>NID (National Identification):</td>
                <td><input type="text" id="nid" name="nid" required></td>
            </tr>
            <tr>
                <td>Blood Type:</td>
                <td>
                    <select id="blood_type" name="blood_type" required>
                        <option value="A Positive">A Positive</option>
                        <option value="A Negative">A Negative</option>
                        <option value="B Positive">B Positive</option>
                        <option value="B Negative">B Negative</option>
                        <option value="AB Positive">AB Positive</option>
                        <option value="AB Negative">AB Negative</option>
                        <option value="O Positive">O Positive</option>
                        <option value="O Negative">O Negative</option>
                    </select>
                </td>
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
    <script src="../controller/js/validation.js"></script>
</body>
</html>

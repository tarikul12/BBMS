<?php
$error_message = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
</head>
<body>
    <h2>Patient Login</h2>

    <?php if (!empty($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="../controller/process_patient_login.php" method="post">
        <table border="1" cellpadding="10" align="center">
            
            <tr>
                <td colspan="2">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </td>
            </tr>

            <!-- Remember Me Checkbox -->
            <tr>
                <td colspan="2" align="center">
                    <label for="remember">Remember Me:</label>
                    <input type="checkbox" id="remember" name="remember">
                </td>
            </tr>

            <!-- Submit Button -->
            <tr>
                <td colspan="2" align="center">
                    <button type="submit">Login</button>
                </td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    Don't have an account? <a href="../views/patient_register.php">Register</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

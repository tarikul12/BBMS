<?php

$error_message = isset($_GET['error']) ? $_GET['error'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../controller/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            font-family: Helvetica, sans-serif;
            text-align: justify;
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

        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>User Login</h2>


    <?php if (!empty($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="../controller/process_login.php" method="post">
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
                <td colspan="2" style="text-align: center;">
                    Don't have an account? <a href="../views/register.php">Register</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

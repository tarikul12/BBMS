<link rel="stylesheet" href="css/style.css">
<form action="../controller/process_update_patient_profile.php" method="post">
    <label for="new_first_name">New First Name:</label>
    <input type="text" id="new_first_name" name="new_first_name" required>

    <label for="new_last_name">New Last Name:</label>
    <input type="text" id="new_last_name" name="new_last_name" required>

    <button type="submit">Update Profile</button>
</form>

<link rel="stylesheet" href="css/style.css">
<form action="../controller/process_schedule_appointment.php" method="post">
    <label for="appointment_date">Appointment Date:</label>
    <input type="date" id="appointment_date" name="appointment_date" required>

    <label for="appointment_time">Appointment Time:</label>
    <input type="time" id="appointment_time" name="appointment_time" required>

    <label for="appointment_notes">Appointment Notes:</label>
    <textarea id="appointment_notes" name="appointment_notes" rows="4" required></textarea>

    <button type="submit">Schedule Appointment</button>
</form>

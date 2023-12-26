<?php
    require_once "conn.php";

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $bloodGroup = $_POST['blood_group'];
        $email = $_POST['email'];
        $contactNumber = $_POST['contact_number'];
        $address = $_POST['address'];
        $donationCount = $_POST['donation_count'];

        if($id != "" && $name != "" && $bloodGroup != "" && $email != "" && $contactNumber != "" && $address != "" && $donationCount != "" ){
            $sql = "INSERT INTO results (`id`, `name`, `blood_group`, `email`, `contact_number`, `address`, `donation_count`) VALUES ('$id', '$name', '$bloodGroup', '$email', '$contactNumber', '$address', $donationCount)";
            
            if (mysqli_query($conn, $sql)) {
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        } else {
            echo "ID, Name, Blood Group, Email, Contact Number, Address, and Donation Count cannot be empty!";
        }
    }
?>

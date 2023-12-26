<?php
    require_once "conn.php";

    if(isset($_POST["name"]) && isset($_POST["grade"]) && isset($_POST["marks"])){
        $id = $_GET["id"];
        $name = $_POST['name'];
        $bloodGroup = $_POST['blood_group'];
        $email = $_POST['email'];
        $contactNumber = $_POST['contact_number'];
        $address = $_POST['address'];
        $donationCount = $_POST['donation_count'];

        $sql = "UPDATE results SET `name`= '$name', `blood_group`= '$bloodGroup', `email`= '$email', `contact_number`= '$contactNumber', `address`= '$address', `donation_count`= $donationCount, `class`= '$grade', `marks`= $marks WHERE id= $id";

        if (mysqli_query($conn, $sql)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../controller/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Details</title>
    
</head>
<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
            <?php 
                require_once "conn.php";
                $sql_query = "SELECT * FROM results WHERE id = ".$_GET["id"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $id = $row['id'];
                        $name = $row['name'];
                        $bloodGroup = $row['blood_group'];
                        $email = $row['email'];
                        $contactNumber = $row['contact_number'];
                        $address = $row['address'];
                        $donationCount = $row['donation_count'];
            ?>
                        <form action="updatedata.php?id=<?php echo $id; ?>" method="post">
                            <div class="row">
                                <div class="form-group col-lg-2">
                                    <label for="">ID</label>
                                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $id; ?>" readonly>
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="">Blood Group</label>
                                    <input type="text" name="blood_group" id="blood_group" class="form-control" value="<?php echo $bloodGroup; ?>" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="">Contact Number</label>
                                    <input type="tel" name="contact_number" id="contact_number" class="form-control" value="<?php echo $contactNumber; ?>" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="">Address</label>
                                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>" required>
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="">Donation Count</label>
                                    <input type="number" name="donation_count" id="donation_count" class="form-control" value="<?php echo $donationCount; ?>" required>
                                </div>
                                <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                                    <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>

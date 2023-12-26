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
        <h1 style="text-align: center;margin: 50px 0;">Donor Details</h1>
        <div class="container">
            <form action="adddata.php" method="post">
                <div class="row">
                    <div class="form-group col-lg-2">
                        <label for="">ID</label>
                        <input type="text" name="id" id="id" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Blood Group</label>
                        <input type="text" name="blood_group" id="blood_group" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Contact Number</label>
                        <input type="tel" name="contact_number" id="contact_number" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="">Donation Count</label>
                        <input type="number" name="donation_count" id="donation_count" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Donation Count</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conn.php";
                        $sql_query = "SELECT * FROM results";
                        if ($result = $conn ->query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $Id = $row['id'];
                                $Name = $row['name'];
                                $BloodGroup = $row['blood_group'];
                                $Email = $row['email'];
                                $ContactNumber = $row['contact_number'];
                                $Address = $row['address'];
                                $DonationCount = $row['donation_count'];
                    ?>
                    <tr class="trow">
                        <td><?php echo $Id; ?></td>
                        <td><?php echo $Name; ?></td>
                        <td><?php echo $BloodGroup; ?></td>
                        <td><?php echo $Email; ?></td>
                        <td><?php echo $ContactNumber; ?></td>
                        <td><?php echo $Address; ?></td>
                        <td><?php echo $DonationCount; ?></td>
                        <td><a href="updatedata.php?id=<?php echo $Id; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="deletedata.php?id=<?php echo $Id; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                            } 
                        } 
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>

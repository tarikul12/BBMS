<?php
    require_once "conn.php";

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $query = "DELETE FROM results WHERE id = '$id'";
        
        if (mysqli_query($conn, $query)) {
            header("location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    } else {
        echo "Invalid ID for deletion.";
    }
?>

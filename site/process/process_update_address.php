<?php
session_start();
include("../common/connect.php");

if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['address'])) {
    $user_id = (int) $_POST['user_id']; // Ensure it's an integer
    $address = trim($_POST['address']); // Sanitize input

    // Prepare the SQL statement
    $qry = "UPDATE register_users SET address = ? WHERE id = ?";
    $stmt = $con->prepare($qry);

    if ($stmt) {
        $stmt->bind_param("si", $address, $user_id); // Bind parameters
        $success = $stmt->execute(); // Execute statement

        if ($success) {
            $_SESSION['success'] = "Updated successfully";
        } else {
            $_SESSION['error'] = "Error updating record: " . $stmt->error;
        }

        $stmt->close(); // Close statement
    } else {
        $_SESSION['error'] = "SQL Error: " . $con->error;
    }
    $user_id =  $user_id + 10201211;
    header("location:../src/profile.php?profile=$user_id");
} else {
    $_SESSION['error'] = "Invalid request";
    header("location:../index.php");
}

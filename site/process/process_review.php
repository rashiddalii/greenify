<?php
    session_start();
    require('../common/connect.php');

    if (isset($_POST['submit_review'])) {
        $user_id = $_POST['user_id'];
        $product_id = $_POST['product_id'];
        $rating = $_POST['rating'];
        $review = trim($_POST['review']);

        if ($rating < 1 || $rating > 5) {
            $_SESSION['error'] = "Please select a valid star rating.";
            header("Location: ../src/detail.php?profile=". $user_id + 10201211 ."&id=" . $product_id);
            exit();
        }

        $stmt = $con->prepare("INSERT INTO reviews (product_id, user_id, rating, review, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("iiis", $product_id, $user_id, $rating, $review);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Review added successfully!";
        } else {
            $_SESSION['error'] = "Failed to add review. Please try again.";
        }

        $stmt->close();
        $con->close();

        header("Location: ../src/detail.php?profile=". $user_id + 10201211 ."&id=" . $product_id);
        exit();
    }
?>

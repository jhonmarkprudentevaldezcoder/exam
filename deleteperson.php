<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {

    require_once 'connection/db_connect.php';

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $id = $_POST['id'];
    $sql = "DELETE FROM person WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        header("Location: dashboard.php");
        exit;
    } else {

        echo "Error: " . $conn->error;
    }


    $conn->close();
} else {

    echo "Invalid request.";
}
?>
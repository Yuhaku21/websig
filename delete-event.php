<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM event WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: data-event.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<?php
include 'config.php';

$id = $_GET['id'];

$sql = "DELETE FROM berita WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: data-berita.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'kampus');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
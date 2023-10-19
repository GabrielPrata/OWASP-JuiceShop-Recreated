<?php

$id = $_GET['id'];
$id = stripslashes($id);
$id = mysqli_real_escape_string($conn, $id);


$sql = "SELECT first_name, last_name FROM users WHERE user_id = '$id'";
$query = mysqli_query($conn, $sql);

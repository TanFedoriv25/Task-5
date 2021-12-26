<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "users");
if(isset($_POST["id"])) {
    foreach($_POST["id"] as $id) {
        $query = "UPDATE user SET status = 'unblocked' WHERE iD = '".$id."'";
        mysqli_query($connect, $query);
    }
}
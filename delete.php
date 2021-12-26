<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "users");
if(isset($_POST["id"])) {
    foreach($_POST["id"] as $id) {
        if($_SESSION['logged_user'] == $id){
            unset($_SESSION['logged_user']);
        }
        $query = "DELETE FROM user WHERE iD = '".$id."'";
        mysqli_query($connect, $query);
    }
}
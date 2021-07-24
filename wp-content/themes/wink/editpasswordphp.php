<?php
session_start();
$_SESSION["userId"] = "1";
$conn = mysqli_connect("localhost", "root", "", "password") or die("Connection Error: " . mysqli_error($conn));

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT * from users WHERE userId='" . $_SESSION["userId"] . "'");
    $row = mysqli_fetch_array($result);
    if ($_POST["currentPassword"] == $row["password"]) {
        mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}
?>

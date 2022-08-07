<?php
include 'dbconnect.php';
session_start();


if (isset($_POST['names']) && isset($_POST['phonenum'])) {

    function validate($data)
    {

        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
}

$email = $_SESSION['email'];
$name = validate($_POST['names']);
$phonenum = (string)validate($_POST['phonenum']);


$sql = "UPDATE user_details SET name='$name',phone_no='$phonenum' WHERE email='$email'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'Update Success';
    header("location: profile.php");
    echo '<script>window.alert("Updated Successfully");</script>';
} else {
    echo $result;
    header("location: profile.php?Error In Updation");
}

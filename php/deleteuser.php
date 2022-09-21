<?php
include 'dbconnect.php';
session_start();


if (isset($_SESSION['email'])) {
    function validate($data)
    {
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }
}

$email = validate($_SESSION['email']);
echo $email;

$sql = "DELETE from user_details where email= '$email'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo 'User Deleted Successfully';
    header('userregisteration.html');

    session_destroy();
} else {
    echo "Record Deletion Failed";
}

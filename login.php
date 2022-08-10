<?php
session_start();
include 'dbconnect.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $password = hash("sha256", $pass);


    $name = null;


    if (empty($email)) {

        header("Location: index.php?error=User Name is required");

        exit();
    } else if (empty($pass)) {

        header("Location: index.php?error=Password is required");

        exit();
    } else {

        $sql = "SELECT * FROM user_details WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $sql);
        $rows = (int)mysqli_num_rows($result);

        if ($rows > 0) {

            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $password) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['profile'] = $row['profile'];


                $email = $row['email'];
                $name = $row['name'];

                header("Location: index.php");

                exit();
            } else {

                header("Location: userregisteration.html?error=Incorrect User name or password");

                exit();
            }
        } else {
            echo $password;

            header("Location: userregisteration.html?error=Sign Up To Continue");

            exit();
        }
    }
} else {

    header("Location: userregisteration.html");

    exit();
}

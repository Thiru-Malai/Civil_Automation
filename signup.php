<?php
session_start();
include 'dbconnect.php';


if(isset($_POST['names']) && isset($_POST['ids']) && isset($_POST['emails']) && isset($_POST['passwords']) && isset($_POST['phonenum'])){

  function validate($data){
    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;
  }

}



$name = validate($_POST['names']);
$id = (int)validate($_POST['ids']);
$email = validate($_POST['emails']);
$password = validate($_POST['passwords']);
$password = hash("sha256", $password);  
$phonenum = validate($_POST['phonenum']);


$sql = "Select * from user_details where email='$email' or id='$id'";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result); 


if($num == 0){
  $sql = "INSERT into user_details (id, name, email, password, phone_no) values ('$id', '$name','$email', '$password', '$phonenum')";
  $result = mysqli_query($conn, $sql);
  
  
  if($result){  
    echo 'Hello';
    header("location: userregisteration.html");
  }
  else{
    echo 'Errors';
    if (!$conn -> query("INSERT into user_details (id, name, email, password, phone_no) values ('$id', '$name','$email', '$password', '$phonenum')")) {
      echo("Error description: " . $conn -> error);
    }
  }
}
else{
  echo 'index.php';
  header("location: index.php?Hello");
}

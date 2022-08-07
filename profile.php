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

$email = $_SESSION['email'];

$name = "";
$id = "";
$img = "";
$phonenum = "";
$sql = "SELECT * FROM user_details WHERE email='$email'";

$result = mysqli_query($conn, $sql);
$rows = (int)mysqli_num_rows($result);


if ($rows > 0) {

    $row = mysqli_fetch_assoc($result);


    echo "Logged in!";

    $_SESSION['email'] = $row['email'];

    $id = $row['id'];
    $email = $row['email'];
    $name = $row['name'];
    $phonenu = $row['phone_no'];
    $profile = $row['profile'];
} else {

    header("Location: index.php?error=Incorrect User name or password");

    exit();
}


?>


<html>

<head>
    <title>
        Profile
    </title>
    <link rel="stylesheet" href="assets/css/profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="user left">
        <div id="user-left-elements">
            <span class="material-symbols-outlined" onclick="goBack()">
                arrow_back_ios
            </span>
            <span style="font-size: 2rem;">Profile</span>

            <div class="profile-elements">
                <div class="user-details">
                    <br>
                    ID: <label name="id"><?php echo $id ?></label>
                    <br>
                    <br>
                    NAME: <label name="name"><?php echo $name ?></label>
                    <br>
                    <br>
                    EMAIL: <label name="email"><?php echo $email ?></label>
                    <br>
                    <br>
                    PHONE NUMBER: <label name="phonenum"><?php echo $phonenu ?></label>
                </div>
            </div>
        </div>
    </div>

    <div class="user right">
        <div id="user-right-elements">
            <div class="edit-profile">
                <span style="font-size: 2rem;">Edit Profile</span>
                <br>
                <span class="form">
                    <form action="profile-update.php" method="post">
                        <input type="text" name="names" placeholder="Name" id="names" required>
                        <br>
                        <input type="number" name="phonenum" placeholder="Phone Number" id="phonenum" required>
                        <br>
                        <input type="submit" name="update" name="update" value="Update" id="update">
                    </form>
                </span>
                <span class="profile-image">
                    <img src="<?php echo $profile ?>" width="240" height="240" alt="Profile Pic">
                </span>
            </div>
        </div>

    </div>

</body>

<script>
    function goBack(){
        location.href = "index.php";
    }
</script>

</html>
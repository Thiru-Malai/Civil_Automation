<html>
<head>
  <title>Login Portal</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link rel="stylesheet" href="assets\css\login-style.css" />
</head>
<?php if (isset($_GET['error'])) { ?>

  <p class="error"><?php echo $_GET['error']; ?></p>

<?php } ?>
<?php if (!isset($_SESSION['name'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: userregisteration.html');
}
  
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['name']);
    header("location: userregisteration.html");
}?>
<body>

  <div id="login_div" class="main-div">
    <form action="login.php" method="post">
    <h3>Patient's Login</h3>
    <input type="email" placeholder="Email" id="email_field" name="email" />
    <input type="password" placeholder="Password" id="password_field" name="password" />

    <button type="submit" onclick="f()">Login to Account</button>
  </form>
  </div>

  <div id="user_div" class="loggedin-div">
    <h3>Welcome User</h3>
    <p id="user_para">Welcome this page is yet to update</p>
    <button onclick="logout()">Logout</button>
  </div>



  <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
  <script>
    // Initialize Firebase
    var config = {
     
        apiKey: "AIzaSyBp96I_CLFp4W2Em8WtrcsH69NId4lQFH4",
        authDomain: "arun-37c8c.firebaseapp.com",
        databaseURL: "https://arun-37c8c-default-rtdb.firebaseio.com",
        projectId: "arun-37c8c",
        storageBucket: "arun-37c8c.appspot.com",
        messagingSenderId: "1035886465499",
        appId: "1:1035886465499:web:8c6d4ccb5ab469c7e617fe",
        measurementId: "G-4FD6FWW3W1"
    
    };
    firebase.initializeApp(config);
  </script>
  <script src="assets\js\login.js"></script>
  <script>
    function f(){
      var password = document.getElementById('password_field').innerHTML;
    console.log(password);
    }

  </script>

</body>
</html>

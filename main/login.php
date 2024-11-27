<?php 
  include("connection.php");
  if(isset($_POST['submit'])){
    $username = $_POST['user'];
    $password = $_POST['password'];

    $sql="select * from users where username='$username' and password ='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count==1){
      session_start();
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['typ'] = $row['type'];
      $_SESSION['id'] = $row['id'];
      header("Location:main.php");
    }
    else {
      echo '<script> window.location.href = "index.php";
      alert("Login failed. Invalid username or password")
      </script>';

    }
  }

?>
<?php 
// ini_set('display_errors', 0);
  include("connection.php");
  if(isset($_POST['submit'])){
    $username = $_POST['r_user'];
    $password = $_POST['r_password'];
    $sqlc="SELECT * FROM users where username='$username'";
    $result=mysqli_query($conn,$sqlc);
    if($username=="" || $password==""){
      echo '<script>
      window.location.href = "index.php";
      alert("Register failed,wrong data")
      </script>';
    } 
    
    else if (mysqli_num_rows($result)>0){
      echo '<script>
      window.location.href = "index.php";
      alert("Register failed, username is taken!")
      </script>';
    }
    else 
    {
      $sql="insert into users(username,password) values('$username','$password')";      
       if ($conn->query($sql) === TRUE   )
      {
        // header("Location:index.php");
        echo "Registered successfully";
        header("Location:index.php");
      }
    }
}
?>




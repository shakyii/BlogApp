<?php 
  include("connection.php");

  
session_start();
$title=$_POST['title'];
$article=$_POST['article'];
$id_author=$_SESSION['id'];

// FILE

$target_dir = "Photos/";
$target_file = $target_dir . basename($_FILES["img"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["img"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
  } else {
    
  }
}
$conn = new mysqli($servername,$mysqluser,"",$db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//GETTING name file
$old_name = $target_dir. basename($_FILES["img"]["name"]);
$new_name = $target_dir. uniqid() . '_' . basename($old_name);

rename($old_name, $new_name);


// INSERT DATES
  $sql = "INSERT INTO articles (author,photo, article,title) VALUES ('$id_author', '$new_name','$article','$title')";
  if (mysqli_query($conn, $sql)) {
    header("Location: main.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

mysqli_close($conn);
?>
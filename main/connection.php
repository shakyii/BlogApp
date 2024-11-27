<?php 
  $servername = "localhost";
  $mysqluser="root";
  $db_name="aplwww";

  $conn = new mysqli($servername,$mysqluser,"",$db_name);

  if($conn -> connect_error){
    die("Connection fialed".$conn->connect_error);
  }
  // echo "Connection Succesful";
?>
<?php 
  include("connection.php");
  if (isset($_GET["id"])) 
  {   
    $sql = " DELETE FROM articles WHERE id = ".$_GET["id"];
    $result = mysqli_query($conn, $sql);
    if($result)
    {
      header("Location: main.php");
      exit;
    }
    else
    {
      echo "Nastąpił problem z usuwaniem";
    }
  }
?>
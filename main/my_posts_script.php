<?php
include("connection.php");

$sql = "SELECT articles.id ,articles.article, articles.title,articles.author,articles.photo ,users.username,users.type FROM articles JOIN users ON articles.author = users.id " ;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    if($_SESSION['id']==$row['author']){
    echo '<div class="post">';
    echo ' <div class="post-text-box">';

    echo "<h2 class='post-title'>".$row["title"]. "</h2>";
    if($row['type']=="m"){ 
      $mod='(moderator)'; 
      echo "<h5 class='post-author'>Autor: ".$row["username"]."<span class='mod'> ".$mod."</span></h5>";
    } else {
      echo "<h5 class='post-author'>Autor: ".$row["username"]."</h5>";
    }    
    echo "<p class='post-article'>".$row["article"]. "</p>";
    echo '<div  class="post-img-box">';
  
    $imageFileType = strtolower(pathinfo($row["photo"],PATHINFO_EXTENSION));
    if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
    || $imageFileType == "gif") {
      
      echo '<img class="post-img" src="'.$row["photo"].'">';
    } else {
      echo ' ';
    }
    echo '</div>';
  
   if (isset($_SESSION['logged_in']) && (($_SESSION['id']==$row['author']) || ($_SESSION['typ']=="m"))) {
      
       echo "<button class='btn'><a class='btn-post' href='edit_post_page.php?id=" . $row["id"] . "'>Edytuj</a></button> ";

       if(($_SESSION['typ']=="m") || ($_SESSION['id']==$row['author'])){
       echo "  <button class='btn'><a class='btn-post' href='delete_post_script.php?id=" . $row["id"] . "'>Usuń</a></button"; 
        }  
   }

  echo '</div>';
  echo '</div>';
  echo '</div>';
}
}
}
?>
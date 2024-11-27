<?php 
  include("connection.php");
  if (isset($_GET["id"])) {
    $sql = "SELECT * FROM articles WHERE id= ".$_GET["id"];
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
  
    echo "<form method='POST' action=''>
          <input type='hidden' name='id' value='".$row["id"]."'>   
          <div class='title-box'<label>Treść artykułu:</label>
          <input type='text' class='input' name='title' value='".$row["title"]."'></div>
          <div class='article-text-box'><label for='artykul'>Artykul:</label>
          <textarea class='input' rows='15' id='artykul' name='article'>".$row["article"]."</textarea></div>
          <button type='submit' class='btn btn-primary' name='upload'>Edytuj</button>
          </form>";
  }

  if (isset($_POST["upload"]) && isset($_POST["id"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $article = $_POST["article"];
  
    $sql = "UPDATE articles SET title='".$title."', article='".$article."' WHERE id=".$id;
    mysqli_query($conn, $sql);
    header("Location: main.php");
  }
?>
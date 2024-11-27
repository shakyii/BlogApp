<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>My posts</title>
  </head>
  <body>
  <header class="header">
      <div class="header-text-box">
        <div class="header-logo">
          <img src="https://picsum.photos/seed/picsum/200/100" alt="" />
        </div>
        <div class="header-text">
          <h1 class="heading-primary">APLIKACJE WWW</h1>
          <h2 class="heading-secondary">Projekt strona z postami</h2>
        </div>
      </div>
      <div class="header-nav-box">
        <div class="btn-box">
        <?php
            session_start();
            if (isset($_SESSION['logged_in'])) {
              if ($_SESSION['logged_in']) {
                echo '<p class="session-welcome">'."Witaj, ".$_SESSION['username']."!" .'</p>';
            } else {
                echo "Nie jesteś zalogowany.";
            }
          }          
        ?>
        </div>
        <div class="search-box">
          <input type="text" class="input" />
          <button class="btn">Search</button>
        </div>
      </div>
    </header>
    <main class="main">
      <section class="article-section">       
        <aside class="aside-box">
          <div>
            <nav class="nav-aside">
              <ul class="ul">
                <li><a href="main.php" class="nav-aside-item">Przeglądaj posty</a></li>
                <li><a href="new_post_page.php" class="nav-aside-item">Dodaj post</a></li>
                <li><a href="my_posts_page.php" class="nav-aside-item">Moje posty</a></li>               
              </li>
              </ul>
            </nav>
          </div>
          <div class="footer">
            <form action="" method="POST">
              <input class="btn" type="submit" name="log_out" value="Wyloguj"/>  
            </form>
          <p>Copyright &copy;</p>
        </div>
        </aside>
        <article class="article-box">       
        <?php
          include "my_posts_script.php";
        ?>
        <?php
          if (isset($_POST['log_out'])) {
            session_destroy();
            echo '<script> window.location.href = "index.php";
            alert("Logged out")
            </script>';
            // header("Location: index.php");
            exit;
          }
        ?>
        </article>
      </section>
    </main>
  </body>
</html>

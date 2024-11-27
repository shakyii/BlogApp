<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Aplikacje WWW</title>
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
          <span class="session-welcome">Witaj na stronie!</span>
        </div>
        <div class="search-box">
          <input type="text" class="input" />         
          <button class="btn">Search</button>
        </div>
      </div>
    </header>
    <main>
      <section class="login-section container">
        <div class="login-box">
        <h2 class="heading-secondary marg-bot">Log in</h2>
          <form action="login.php" method="POST" onsubmit="isvalid()">
            <div class="login-div">
              <label for="login" class="label">Username</label>
              <input type="text" id="user" class="input" name="user" />
            </div>
            <div class="password-div">
              <label for="password" class="label">Password</label>
              <input type="password" id="password" class="input" name="password" />
            </div>
            <input type="submit" name="submit" class="btn marg-top" value="Log in"/>
          </form>
          <?php 
            include("connection.php");
          ?>
        </div>
        <div class="register-box">
          <h2 class="heading-secondary marg-bot">Register</h2>
        <form action="register.php" method="POST" onsubmit="isvalid()">
            <div class="login-div">
              <label for="login" class="label">Username</label>
              <input type="text" id="r_user" class="input" name="r_user" />
            </div>
            <div class="password-div">
              <label for="password" class="label">Password</label>
              <input type="password" id="r_password" class="input" name="r_password" />
            </div>
            <input type="submit" name="submit" class="btn marg-top" value="Register"/>
          </form>
        </div>
        <div> 
        </div>
        <script>
          function isvalid(){
            const user = document.form.user.value;
            const pass = document.form.password.value;
            if(user.length=="" || pass.length==""){
              alert("Username or password is empty!");
              return false;
            }
          }
        </script>
      </section>
    </main>
    <footer></footer>
  </body>
</html>

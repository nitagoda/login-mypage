<?php 
session_start();
if(isset($_SESSION['id'])) {
  header("Location:mypage.php");
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="urf-8">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="login.css">
  </head>

  <body>
    <header>
      <img src="4eachblog_logo.jpg">
      <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
      <form action="mypage.php" method="post">
        
        <div class="contetns-wrapper">
          <div class="mail-wrapper">
            <p>メールアドレス</p>
            <input type="text" name="mail" 
            value=
            "<?php 
              if(isset($_COOKIE['login_keep'])) {
                echo $_COOKIE['mail'];
              }
              ?>">
          </div>
          
          <div class="pass-wrapper">
            <p>パスワード</p>
            <input type="password" name="password" 
            value=
            "<?php 
              if(isset($_COOKIE['login_keep'])) {
                echo $_COOKIE['password'];
              }
            ?>">
          </div>
          
          <p><input type="checkbox" name="login_keep" value="login_keep" 
          <?php 
          if(isset($_COOKIE['login_keep'])) {
            echo "checked='checked'";
          }
          ?>>ログイン状態を保持する</p>
          <div class="button-wrapper">
            <input type="submit" value="ログイン">
          </div>
        </div>
      </form>
    </main>

    <footer>
    <p>ⓒ 2018 InterNous.inc. All rights reserved</p>
    </footer>
  
  </body>
</html>
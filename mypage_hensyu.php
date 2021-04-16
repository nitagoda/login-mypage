<?php 
mb_internal_encoding("utf8");

session_start();

if(empty($_POST['from_mypage'])) {
  header("Location:login_error.php");
}

?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>マイページ編集</title>
    <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
  </head>

  <body>
  <header>
      <img src="4eachblog_logo.jpg">
      <div class="login"><a href="login.php">ログアウト</a></div>
    </header>

    <main>
      <form action="mypage_update.php" method="post">
        <div class="contents-wrapper">
          <div class="text">
            <h2>会員情報</h2>
          </div>    
          <p class="text2">こんにちは! <?php echo $_SESSION['name'] ?>さん</p>
          <div class="info-wrapper">
            <img src="image/<?php echo $_SESSION['picture'] ?>">
            <div class="item-wrapper">
              <p>氏名：<input type="text" name="name" value="<?php echo $_SESSION['name'] ?>"></p>
              <p>メール：<input type="text" name="mail" value="<?php echo $_SESSION['mail'] ?>"></p>
              <p>パスワード：<input type="text" name="password" value="<?php echo $_SESSION['password'] ?>"></p>
            </div>
          </div>
          <p class="text2"><input type="textarea" name="comments" value="<?php echo $_SESSION['comments'] ?>"></p>
          <div class="button-wrapper">
            <input type="submit" value="この内容に編集する">
          </div>
        </div>
      </form>
    </main>

    <footer>
      <p>ⓒ 2018 InterNous.inc. All rights reserved</p>
    </footer>
  </body>

</html>
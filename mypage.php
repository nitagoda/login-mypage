<?php 
mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])) {
try{
  $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root","");
} catch(PDOException $e){
  die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセス出来ません。<br>しばらくしてから再度ログインをしてください。</p><a href='http://localhost/4each_register/login.php'></a>");
}

$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

$stmt->bindValue(1,$_POST["mail"]);
$stmt->bindValue(2,$_POST["password"]);

$stmt->execute();
$pdo = NULL;

foreach ($stmt as $row) {
  $_SESSION['id'] = $row['id'];
  $_SESSION['name'] = $row['name'];
  $_SESSION['mail'] = $row['mail'];
  $_SESSION['password'] = $row['password'];
  $_SESSION['picture'] = $row['picture'];
  $_SESSION['comments'] = $row['comments'];
}

if (empty($_SESSION['name'])) {
  header("location:http://localhost/4each_register/login_error.php");
}

if(!empty($_POST['login_keep'])) {
  $_SESSION['login_keep'] = $_POST['login_keep'];
}

}

if(!empty($_SESSION['id']) && !empty($_SESSION['login_keep'])) {
  setcookie('mail', $_SESSION['mail'], time()+60*60*24*7);
  setcookie('password', $_SESSION['password'], time()+60*60*24*7);
  setcookie('login_keep', $_SESSION['login_keep'], time()+60*60*24*7);
} else if(empty($_SESSION['login_keep'])) {
  setcookie('mail', '', time()-1);
  setcookie('password', '', time()-1);
  setcookie('login_keep', '', time(-1));
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>マイページ登録</title>
    <link rel="stylesheet" type="text/css" href="mypage.css">
  </head>

  <body>
    <header>
      <img src="4eachblog_logo.jpg">
      <div class="login"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
      <div class="contents-wrapper">
        <div class="text">
          <h2>会員情報</h2>
        </div>    
        <p class="text2">こんにちは! <?php echo $_SESSION['name'] ?>さん</p>
        <div class="info-wrapper">
          <img src="image/<?php echo $_SESSION['picture'] ?>">
          <div class="item-wrapper">
            <p>氏名：<?php echo $_SESSION['name'] ?></p>
            <p>メール：<?php echo $_SESSION['mail'] ?></p>
            <p>パスワード：<?php echo $_SESSION['password'] ?></p>
          </div>
        </div>
        <p class="text2"><?php echo $_SESSION['comments'] ?></p>
        <form action="mypage_hensyu.php" method="post">
          <input type="hidden" value="<?php echo rand(1,10);?>" name="from_mypage">
          <div class="button-wrapper">
            <input type="submit" value="編集する">
          </div>
        </form>
      </div>
    </main>

    <footer>
      <p>ⓒ 2018 InterNous.inc. All rights reserved</p>
    </footer>
  </body>


</html>
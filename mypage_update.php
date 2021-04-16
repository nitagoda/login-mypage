<?php 
  mb_internal_encoding("utf8");

  session_start();

  try{
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "");
  } catch(PDOException $e){
    die("<p>申し訳ございません。現在サーバーが混みあっており一時的にアクセス出来ません。<br>しばらくしてから再度ログインをしてください。</p><a href='http://localhost/4each_register/login.php'></a>");
  }

  $stmt = $pdo->prepare("update login_mypage set name = ?, mail = ?, password = ?, comments = ?");

  $stmt->bindValue(1,$_POST["name"]);
  $stmt->bindValue(2,$_POST["mail"]);
  $stmt->bindValue(3,$_POST["password"]);
  $stmt->bindValue(4,$_POST["comments"]);

  $stmt->execute();

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


  header("Location:http://localhost/4each_register/mypage.php");
?>
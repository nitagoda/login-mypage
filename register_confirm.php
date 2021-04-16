<?php 
mb_internal_encoding("utf8");

$temp_pic_name = $_FILES['picture']['tmp_name'];

$original_pic_name = $_FILES['picture']['name'];
$path_filename = './image/'.$original_pic_name;

move_uploaded_file($temp_pic_name,'./image/'.$original_pic_name);
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>マイページ</title>
    <link rel="stylesheet" type="text/css" href="register_confirm.css">
  </head>

  <body>
    <header>
      <img src="4eachblog_logo.jpg">
    </header>

    <main>
      <div class="wrapper">
        <div class="top-wrapper">
          <h2>会員登録 確認</h2>
          <p>こちらの内容で登録してもよろしいでしょうか？</p>
        </div>

        <div class="middle-wrapper">
          <p>氏名：<?php echo $_POST['name'] ?></p>
          <p>メール：<?php echo $_POST['mail'] ?></p>
          <p>パスワード：<?php echo $_POST['password'] ?></p>
          <p>プロフィール写真：<?php echo $original_pic_name ?></p>
          <p>コメント：<?php echo $_POST['comments'] ?></p>
        </div>

        <div class="button-wrapper">
            <a href="register.php">戻って修正</a>
            <form action="register_insert.php" method="post">
              <input type="submit" value="登録する">
              <input type="hidden" value="<?php echo $_POST['name'] ?>" name="name">
              <input type="hidden" value="<?php echo $_POST['mail'] ?>" name="mail">
              <input type="hidden" value="<?php echo $_POST['password'] ?>" name="password">
              <input type="hidden" value="<?php echo $original_pic_name ?>" name="filename">
              <input type="hidden" value="<?php echo $_POST['comments'] ?>" name="comments">
            </form>
        </div>

    </div>
    </main>

    <footer>
      <p>ⓒ 2018 InterNous inc. All rights reserved</p>
    </footer>
  </body>


</html>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>
      <?php
        if ($_SERVER["REQUEST_URI"] === "/register.php"){
          echo '確認画面 | お問合せフォーム';
        } elseif ($_SERVER["REQUEST_URI"] === "/completed.php"){
          echo '完了画面 | お問合せフォーム';
        }else{
          echo 'お問合せフォーム';
        }
      ?>
    </title>
  </head>
  <body>
    <header class="header">
      <div class="inner">
        <div class="header-wrapper">
          <h1 action="topForm.php" method="POST" class="header__ttl">
            <span type="submit" class="header__link">お問い合わせ</span>
          </h1>
      </div>
    </header>
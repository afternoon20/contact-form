<?php
  include('config.php');
  session_start();  
  
  // トップページ
  if($_SERVER["REQUEST_URI"] === "/index.php"){
    // 件名
    $subject = array(
      'ご意見',
      'ご感想',
      'その他'
    );

    if($_SESSION['form-flag'] !=='1'){
      unset($_SESSION['form']);
      unset($_SESSION['form-flag']);
         
    }
  }

  if($_SERVER["REQUEST_URI"] === "/register.php"){
    if($_SESSION['form-flag'] !=='1'){
      header('Location: index.php');
      exit();
    }
  }

  // 完了ページ
  if($_SERVER["REQUEST_URI"] === "/completed.php"){
    if($_SESSION['form-flag'] !=='1'){
      header('Location: index.php');
      exit();
    }
  }
?>
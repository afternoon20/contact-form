<?php
  session_start();
  $flag = $_POST['flag'];

  if($flag !== '1'){
    header('Location: index.php');
  }

  $form =array(
    'subject' => $_POST['subject'],
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'tel' => $_POST['tel'],
    'contents' => $_POST['contents'] 
  );
  $_SESSION['form'] = $form;

  // セッションを保持するフラグ
  $_SESSION['form-flag'] = "1";

  // 確認画面へ遷移
  header('Location: register.php');
?>
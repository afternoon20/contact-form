<?php
  session_start();
  require_once('validation.php');

  // サニタイズ
  $form = array();
  if( !empty($_POST) ) {
	  foreach( $_POST as $key => $value ) {
      $form[$key] = htmlspecialchars( $value, ENT_QUOTES);
    }
  }

  // 電話番号のハイフンを除去
  $form['tel'] = str_replace('-','',$form['tel']);

  // セッションを保持するフラグ
  $_SESSION['form-flag'] = "1";

  $_SESSION['form'] = $form;
  $error =validation($form);

  if(!empty($error)){
    $_SESSION['error'] = $error;
    header('Location: index.php');
    exit();
  }

  $flag = $form['flag'];
  if($flag !== '1'){
    header('Location: index.php');
    exit();
  }
  // 確認画面へ遷移
  header('Location: register.php');
?>
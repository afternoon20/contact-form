<?php 
  // 確認画面以外で読み込む
  if($_SESSION['form-flag'] !== '1'){
    unset($_SESSION['form']);
  }
  
  unset($_SESSION['form-flag']);
  // var_dump($_SESSION['form-flag']);

  // echo 'フラグ：';
  // var_dump(($_SESSION['form-flag']));

  if($_SERVER["REQUEST_URI"] === "/completed.php"){
      $_SESSION = array();
  } 
?>
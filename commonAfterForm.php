<?php 
  // 確認画面以外で読み込む
  if($_SESSION['form-flag'] !== '1'){
    unset($_SESSION['form']);
  }
  
  unset($_SESSION['form-flag']);
  unset($_SESSION['error']);

  if($_SERVER["REQUEST_URI"] === "/completed.php"){
      $_SESSION = array();
  } 
?>
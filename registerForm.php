<?php
  require_once('config.php');
  require_once('validation.php');
  session_start(); 

   // サニタイズ
  $form = array();
  if( !empty($_POST) ) {
	  foreach( $_POST as $key => $value ) {
		  $form[$key] = htmlspecialchars( $value, ENT_QUOTES);
	  }
  }

  // バリデーション
  $error = validation($form);
  if(!empty($error)){
    echo ('不正な操作がありました。もう一度やり直ししてください。');
    exit();
  }

  $next = $form['submit_flag'];

  if($next === '1'){
    // 修正する場合
    $_SESSION['submit_flag'] =$next;
    header('Location: index.php');
    
  } elseif($next === '2'){
    // 送信する場合
    
    //データベース登録
     try{
      $pdo = new PDO(HOST,ID,PASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
      $error = $e -> getCode();
      echo ('不正な操作がありました。もう一度やり直ししてください。');
      exit();
    }

  //   $form =array(
  //   'subject' => $_POST['subject'],
  //   'name' => $_POST['name'],
  //   'email' => $_POST['email'],
  //   'tel' => $_POST['tel'],
  //   'contents' => $_POST['contents'] 
  // );

    $sql = "INSERT INTO `Form`(subject,name,email,tel,contents) VALUES(:subject,:name,:email,:tel,:contents)" ;
    $mysql = $pdo -> prepare($sql);
    $mysql -> bindValue(':subject', $form['subject']);
    $mysql -> bindValue(':name', $form['name']);
    $mysql -> bindValue(':email', $form['email']);
    $mysql -> bindValue(':tel', $form['tel']);
    $mysql -> bindValue(':contents', $form['contents']);

    // var_dump(($mysql));

    try {
      $mysql -> execute();
    } catch(PDOException $e){
      $db_error = $e -> getMessage();
      echo'データベースエラー'.$db_error;
      echo $error;
    };

    //メール送信
    //ユーザーに送信
    // $reply_text ="お問い合わせいただきありがとうございます。\n";
    // $reply_text .="下記の内容で受け付けました。\n\n";
    // $reply_text .="件名：".$form['subject']."\n";
    // $reply_text .="名前：".$form['name']."\n";
    // $reply_text .='メールアドレス：'.$form['email']."\n";
    // $reply_text .='電話：'.$form['tel']."\n";
    // $reply_text .="お問い合わせ内容：\n".$form['contents']."\n";
    
    // if(mb_send_mail($form['email'],REPLY_SUBJECT,$reply_text)){
    //  echo "送信成功";
    // }else{
	  //   echo "送信失敗";
    // }

    //管理者宛に送信
    $reply_text_admin ="お問い合わせフォームから送信がありました。\n";
    $reply_text_admin .="下記の内容を受け付けました。\n\n";
    $reply_text_admin .="件名：".$form['subject']."\n";
    $reply_text_admin .="名前：".$form['name']."\n";
    $reply_text_admin .='メールアドレス：'.$form['email']."\n";
    $reply_text_admin .='電話：'.$form['tel']."\n";
    $reply_text_admin .="お問い合わせ内容：\n".$form['contents']."\n";

    if(mb_send_mail('shimadky@gmail.com',REPLY_SUBJECT_ADMIN,$reply_text_admin)){
     echo "送信成功";
    }else{
	    echo "送信失敗";
    }
    // 完了画面へ遷移
    header('Location: completed.php');
  }
?>
<?php  
  // タイムゾーン設定
  date_default_timezone_set('Asia/Tokyo');

  // DB情報
  define("HOST",'mysql:dbname=データベース名;host=localhost;charset=utf8');
  define("ID",'root');
  define("PASS",'root');
  define("DB_ATTR","PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION");
  
 
  // メッセージ一覧
  define("REPLY_SUBJECT","お問い合わせありがとうございます。");
  define("REPLY_TEXT","お問い合わせを受け付けました。\n");
  define("REPLY_SUBJECT_ADMIN","【管理者用】お問い合わせフォームから送信がありました。");


?>
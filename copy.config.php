<?php 

  // ファイル名を「config.php」に変更する。
  // タイムゾーン設定
  date_default_timezone_set('Asia/Tokyo');

  // DB情報
  define("HOST",'mysql:dbname=データベース名;host=ホスト名またはIPアドレス;charset=utf8');
  define("ID",'ユーザー名');
  define("PASS",'パスワード');
  define("DB_ATTR","PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION");

  // メール情報
  // STMPサーバー
  define("STMP",'STMPサーバー');
  // SMTPユーザー
  define("STMP_USER",'SMTPユーザー');
  // SMTPパスワード
  define("STMP_PASS",'SMTPパスワード');
  // 送信元
  define("MAIL_TO",'送信元');
  //管理メールアドレス
  define("MAIL_ADMIN",'管理メールアドレス');

  // メッセージ一覧
  define("REPLY_SUBJECT","お問い合わせありがとうございます。");
  define("REPLY_TEXT","お問い合わせを受け付けました。\n");
  define("REPLY_SUBJECT_ADMIN","【管理者用】お問い合わせフォームから送信がありました。");


?>
<?php
  class Form{

    // 件名
    public $subject;
    // 名前
    public $name;
    // メールアドレス
    public $email;
    // 電話番号
    public $tel;
    // お問い合わせ内容
    public $contents;

        public function __construct()
        {
            
        }

        public function Hello()
        {
            echo $this->name."\n";
        }

    }

?>
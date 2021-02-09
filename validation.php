 <?php
   function validation($form) {
    $error = array();
    
    // 件名のバリデーション
	  if(empty($form['subject'])) {
      $error['subject_requried'] = "「件名」は必須項目です。";
    }
    if(!empty($form['subject']) && $form["subject"]!=="ご意見" && $form["subject"]!=="ご感想" && $form["subject"]!=="その他"){
      $error['subject_selected'] = "「件名」は選択肢から選択してください。";
    }

    // 名前のバリデーション
	  if(empty($form['name'])) {
      $error['name_required'] = "「名前」は必須項目です。";
    }
    if(mb_strlen($form["name"]) > 51){
      $error['name_def'] = "「名前」は50文字以内で入力ください。";
    }

    // メールアドレスのバリデーション
	  if(empty($form['email'])) {
      $error['email_required'] = "「メールアドレス」は必須項目です。";
    }
    if(!empty($form['email']) && !filter_var($form['email'], FILTER_VALIDATE_EMAIL)){
      $error['email_def'] = "「メールアドレス」を正しく入力してください。";
    }

    // 電話番号のバリデーション
	  if(empty($form['tel'])) {
      $error['tel_required'] = "「電話番号」は必須項目です。";
    }
    if(!empty($form['tel']) && !preg_match("/^0\d{9,10}$/", str_replace("-", "", $form['tel']))){
      $error['tel_def'] = "「電話番号」を正しく入力してください。(半角数字ハイフンのみ)";
    }

    // お問い合わせ内容のバリデーション
	  if(empty($form['contents'])) {
      $error['contents_required'] = "「お問い合わせ内容」は必須項目です。";
    }
    if(mb_strlen($form["name"]) > 256){
      $error['contents_def'] = "「お問い合わせ」は255文字以内で入力ください。";
    }
    return $error;
  }
?>
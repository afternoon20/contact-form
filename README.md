# お問い合わせフォーム

## 開発環境

- macOS 10.13.6(ホスト OS)
- VirtualBox 6.1.18
- CentOS 7.9.2009(ゲスト OS)
- Apache 2.4.6
- MySQL 8.0.23
- PHP 7.4.15

## 実装に費やした時間

- フロントエンド 2 時間
  - HTML5
  - CSS3(Sass)
  - Bootstrap4
  - Javascript
- バックエンド 4 時間
  - PHP
- 環境構築 14 時間
  - CentOS
  - MySQL
  - Apache
  - Gmail

## 実装中に問題となったところ・工夫したところ

- メール送信にGmailのSMTPサーバーを使用し、config.phpに必要な情報を入力するだけで送信できるようにした。
- 電話番号はハイフンありでも入力できるようにし、データベース格納時にはハイフンなしの最大桁数(12桁)で登録できるように実装。
- データベースやメールサーバーの設定を config.php で一元管理することで、異なる環境や端末での検証も効率的に行うことができるようにした。
- 二重送信を防ぐため、送信完了ページでブラウザバックを行うとフォームページに遷移するように実装。
- SQLインジェクション対策として、SQL文の生成時にはプレースホルダを用いて実装。
- Postfixを使用してメール送信ができなかったため、PHPのライブラリを使用することでメールを送信することができた。
- フォームの値を保持しているかどうかのフラグを用意し、保持していない場合はトップ画面に強制遷移するようにした。
- 確認ページ遷移時、サーバーサイドでバリデーションチェックを実施し、エラーがある場合は値を保持したままフォームページに戻り、エラーメッセージを表示するように実装。
- 仮想化環境(CentOS)を構築するのは初めてだったので、環境構築に多くの工数を割いてしまった。
- バリデーションチェック、サニタイズの実装、SQLインジェクション対策など、セキュリティを意識した実装をすることができた。

## 改善点

- 確認ページでは、一度ページから離脱しても再アクセスでき、フォームの値をそのまま保持しているので、ページ離脱の際にアラートを表示して、セッションを破棄する処理を作るべきだった。
- メール送信時とデータベース登録時にエラーがあると、エラーメッセージを表示する仕様になっているが、入力値を保持したままフォームページに戻り、再入力できるような仕組みにしたい。
- メール送信時とデータベース登録時にエラーが発生した場合、エラーメッセージを表示するだけでなくログファイルを出力しエラーの原因を把握しやすくしたい。
- Linuxやネットワークの理解を深め、設定や動作を正しく認識した上で開発に取り組みたい。

## 動作確認
- ソースコードをルート直下に配置する。
- copy.config.phpのファイル名をconfig.phpに変更。
- データベースとメールの情報を、config.phpに正しく入力する。
- テーブルはフォルダ内のsqlファイルをインポートしたものを使用。
- GoogleのSMTP経由でメールを送信し、メールが正しく送信されている。
- 送信完了後、入力値がデータベースに登録されている。
- 管理者とユーザーへ正常にメール送信されている。

### 検証ブラウザ

- Firefox 78.7.0esr
- Google Chrome 88.0.4324.150

### フォームページ

- すべて正常値の場合のみ確認ページに遷移する。

#### 入力チェック

- 件名(必須 セレクトボックス:ご意見 | ご感想 | その他)

  - 正しい選択肢のみ表示。
  - 選択肢以外を選ぶとエラーメッセージ表示。
  - 未選択の場合エラーメッセージ表示。
  - プルダウン値から選択すると正常に遷移。

- 名前(50文字以内 必須)

  - 未入力の場合はエラーメッセージ表示。
  - 50文字以上は入力できない。(maxlength="50")
  - 半角英数字50文字以内の入力で正常に遷移。
  - 半角英数字50文字以上入力した場合はエラーメッセージ表示。
  - 閾値の入力(48-50文字:OK, 51-52文字:NG)

- メールアドレス(必須 半角英数字と@のみ 255文字以内)

  - RFC822に沿った形式(ユーザー名@ドメイン)かつ半角英数字255文字で正常に遷移。
  - 全角入力でエラーメッセージ表示。
  - RFC822に沿わない形式の場合はエラーメッセージ表示。
  - 未入力の場合エラーメッセージ表示。
  - 255文字以上は入力できない。(maxlength="255")

- 電話番号(必須 半角数字12桁以内 先頭は0)

  - 先頭0以外でエラーメッセージ表示。
  - 先頭0、半角数字12桁で正常に遷移。
  - 半角/全角文字でエラーメッセージ表示。
  - 閾値の入力(11-12桁:OK, 13-14桁:NG)
  - ハイフンあり半角数字12桁で正常に遷移。
  - ハイフンなし半角数字12桁で正常に遷移。

- お問い合わせ内容(必須 255文字以内)

  - 未入力の場合はエラーメッセージ表示。
  - 255文字以上は入力できない。(maxlength="255")
  - 半角英数字255文字以内の入力で正常に遷移。
  - 半角英数字255文字以上入力した場合はエラーメッセージ表示。
  - 閾値の入力(254-255文字:OK, 256-257文字:NG)

#### 確認ページ

- 入力値が正常に表示されている。
- 修正ボタンを押すと、入力値を保持したままフォームページ戻る。
- 送信ボタンを押すと、送信完了ページに遷移。
- お問い合わせ内容の入力に改行がある場合、改行されて表示されている。

#### 送信完了ページ

- config.phpに適切な設定をしていないと、処理は行われずエラーメッセージが表示される。
- 送信した内容が表示されている。
- 送信後に戻るボタン/更新ボタンを押下すると、トップページに遷移する。
- お問い合わせ内容の入力に改行がある場合、改行されて表示されている。

## 参考資料

- [LAMP 環境構築マニュアル ① 　概要編](https://pointsandlines.jp/server-infra/lamp-overview)
- [Windows10 に VirtualBox で centos7 環境を構築する](https://qiita.com/apricotcomic/items/035dc1c0c7ad08054495)
- [CentOS7 IP アドレスを固定する](https://qiita.com/miriwo/items/5791f552055fda573cf3)
- [CentOS7 に最新版の Git をインストールする方法](https://qiita.com/tomy0610/items/66e292f80aa1adc1161d)
- [【2021 年版】Postfix から Gmail 経由でメールを送信する方法](https://codeforfun.jp/how-to-send-email-with-postfix-and-gmail/)
- [お問い合わせフォームを作る](https://gray-code.com/php/make-the-form-introduction/)
- [PHPMailer/PHPMailer: The classic email sending](https://github.com/PHPMailer/PHPMailer)
- [PHPMailer でメールを STMP 送信する](https://qiita.com/e__ri/items/857b12e73080019e00b5)
- [SQL インジェクションとその対策(PHP + PDO)](https://qiita.com/kurodenwa/items/8807e79515c0e2b4dad9)
- [CentOS の Postfix で Gmail 経由でメールを出す+PHP で送信できない場合。](https://www.ituki-yu2.net/entry/20140805/1407247229)

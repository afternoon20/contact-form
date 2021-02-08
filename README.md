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

- メール送信に Gmail の SMTP サーバーを使用し、config.php に必要な情報を入力するだけで送信できるようにした。
- データベースやメールサーバーの設定を config.php で一元管理することで、別環境や別端末での検証も効率的に行うことができるようにした。
- Postfix を使用してメール送信ができなかったため、PHP のライブラリ「PHPMailer」を使うことでメールを送信することができた。
- フォームの値を保持しているかどうかのフラグを用意し、保持していない場合はトップ画面に強制遷移するようにした。
- バリデーションをバックエンド側で行い、エラーがある場合は値を保持したままフォームページに戻り、エラーメッセージを表示するように実装した。
- バリデーションチェック、サニタイズの実装、SQL インジェクション対策など、セキュリティを意識した実装をすることができた。
- データベース操作する際、
- 仮想化環境(CentOS)を構築するのは初めてだったので、環境構築に多くの工数を割いてしまった。

## 改善点

## 動作確認

- Google の SMTP 経由でメールを送信し、メールが正しく送信しているかの確認
- 入力チェック(未入力、閾値、文字数オーバー、正しいメールアドレス、電話番号の表記)
- テーブルはフォルダ内の sql ファイルをインポートしたものを使用。
- 入力した値が正常にデータベースに格納されているかの確認。
- 各種ブラウザでの動作確認(firefox,Chrome,Opeea,IE)
- 正しい値を入力し、正常に画面遷移するか。
- 送信後に戻るボタン/更新ボタンを押下すると、確認ページに戻らないかの確認。(トップページに遷移する。)

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

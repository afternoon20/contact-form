<?php include('commonBeforeForm.php'); ?>
<?php include('header.php'); ?>
    <main id="main" class="main">
      <div class="form">
        <div class="inner">
          <p>入力内容を確認し、「送信する」ボタンを押してください。</p>
          <form class="contact-form needs-validation bg-light shadow" action="registerForm.php" method="post">
            <!-- 件名 -->
            <div class="contact-form__item contact-form__item--bb">
              <h3 class="contact-form__ttl">件名</h3>
              <div class="row">
                <div class="col-12">
                  <p class="contact-form__txt"><?php echo $_SESSION['form']['subject']; ?></p>
                </div>
              </div>
            </div>
            <!-- 名前 -->
            <div class="contact-form__item contact-form__item--bb">
              <h3 class="contact-form__ttl">名前</h3>
              <div class="row">
                <div class="col-12">
                  <p class="contact-form__txt"><?php echo $_SESSION['form']['name']; ?></p>
                </div>
              </div>
            </div>
            <!-- メールアドレス -->
            <div class="contact-form__item contact-form__item--bb">
              <h3 class="contact-form__ttl">メールアドレス</h3>
              <div class="row">
                <div class="col-12">
                  <p class="contact-form__txt"><?php echo $_SESSION['form']['email']; ?></p>
                </div>
              </div>
            </div>
            <!-- 電話番号 -->
            <div class="contact-form__item contact-form__item--bb">
              <h3 class="contact-form__ttl">電話番号</h3>
              <div class="row">
                <div class="col-12">
                  <p class="contact-form__txt"><?php echo $_SESSION['form']['tel']; ?></p>
                </div>
              </div>
            </div>
            <!-- お問い合わせ内容 -->
            <div class="contact-form__item contact-form__item--bb">
              <h3 class="contact-form__ttl">お問い合わせ内容</h3>
              <div class="row">
                <div class="col-12">
                  <p class="contact-form__txt"><?php echo nl2br($_SESSION['form']['contents']); ?> </p>
                </div>
              </div>
            </div>
            <input type="hidden" name="subject" value="<?php echo $_SESSION['form']['subject']; ?>" />
            <input type="hidden" name="name" value="<?php echo $_SESSION['form']['name']; ?>" />
            <input type="hidden" name="email" value="<?php echo $_SESSION['form']['email']; ?>" />
            <input type="hidden" name="tel" value="<?php echo $_SESSION['form']['tel']; ?>" />
            <input type="hidden" name="contents" value="<?php echo $_SESSION['form']['contents']; ?>" />
            <!-- ボタン一覧 -->
            <div class="row mt-5">
              <div class="col-12 col-lg-6">
                <button id="back" class="mt-3 btn btn-secondary btn-lg btn-block" type="submit" name="submit_flag" value="1">修正する</button>
              </div>
              <div class="ol-12 col-lg-6">
                <button id="send" class="mt-3 btn btn-info btn-lg btn-block" type="submit" name="submit_flag" value="2">送信する</button>
                <button id="sending" class="mt-3 btn btn-primary btn-lg btn-block" style="cursor: wait;" type="submit" name="submit_flag" value="2" disabled >送信中...</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
<?php include('footer.php'); ?>
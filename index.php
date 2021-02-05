<?php include('commonBeforeForm.php'); ?>
<?php include('header.php'); ?>
    <main id="main" class="main">
      <div class="form">
        <div class="inner">
          <p>下記フォームをご記入の上、「確認する」ボタンを押してください。</p>
          <form class="contact-form needs-validation bg-light shadow" action="comfirmForm.php" method="post" novalidate>
            <!-- 件名 -->
            <div class="contact-form__item">
              <h3 class="contact-form__ttl">件名<span class="danger text-danger">【必須】</span></h3>
              <div class="row">
                <div class="col-12 col-lg-4">
                  <select class="custom-select contact-form__select" name="subject" required>
                    <option value="">選択してください</option>
                    <?php
                      foreach($subject as $value){
                        if ( $value === $_SESSION['form']['subject'] ) {
                          echo '<option value="' . $value . '" selected>' . $value . '</option>';
                        } else {
                          echo '<option value="' . $value . '">' . $value . '</option>';
                        }
                      }
                    ?>
                  </select>
                  <div class="invalid-feedback">必須項目です。</div>
                </div>
              </div>
            </div>
            <!-- 名前 -->
            <div class="contact-form__item">
              <h3 class="contact-form__ttl">名前<span class="danger text-danger">【必須】</span></h3>
              <div class="row">
                <div class="col-12">
                <?php if( !empty($_SESSION['form']['name'])): ?>
                  <input type="text" class="form-control" name="name" value="<?php echo $_SESSION['form']['name'] ?>" required/>
                <?php else: ?>
                  <input type="text" class="form-control" name="name" required />
                <?php endif; ?>
                  <div class="invalid-feedback">必須項目です。</div>
                </div>
              </div>
            </div>
            <!-- メールアドレス -->
            <div class="contact-form__item">
              <h3 class="contact-form__ttl">メールアドレス<span class="danger text-danger">【必須】</span></h3>
              <div class="row">
                <div class="col-12">
                <?php if( !empty($_SESSION['form']['email'])): ?>
                  <input type="text" class="form-control" name="email" value="<?php echo $_SESSION['form']['email']?>" required/>
                <?php else: ?>
                  <input type="email" class="form-control" name="email" required />
                <?php endif; ?>
                  <div class="invalid-feedback">必須項目です。</div>
                </div>
              </div>
            </div>
            <!-- 電話番号 -->
            <div class="contact-form__item">
              <h3 class="contact-form__ttl">電話番号<span class="danger text-danger">【必須】</span></h3>
              <div class="row">
                <div class="col-12">
                 <?php if( !empty($_SESSION['form']['tel'])): ?>
                  <input type="tel" class="form-control" name="tel" value="<?php echo $_SESSION['form']['tel']?>" required/>
                <?php else: ?>
                  <input type="tel" class="form-control" name="tel" required />
                <?php endif; ?>
                  <div class="invalid-feedback">必須項目です。</div>
                </div>
              </div>
            </div>
            <!-- お問い合わせ内容 -->
            <div class="contact-form__item">
              <h3 class="contact-form__ttl">お問い合わせ内容<span class="danger text-danger">【必須】</span></h3>
              <div class="form-group">
                <?php if( !empty($_SESSION['form']['email'])): ?>
                  <textarea class="form-control contact-form__textarea" name="contents" rows="8" required><?php echo $_SESSION['form']['contents']?></textarea>
                <?php else: ?>
                  <textarea class="form-control contact-form__textarea" name="contents" rows="8" required></textarea>
                <?php endif; ?>
                
                <div class="invalid-feedback">必須項目です。</div>
              </div>
            </div>
            <input type="hidden" name="flag" value="1" />
            <button id="send" class="mt-5 btn btn-info btn-lg btn-block" type="submit">確認する</button>
          </form>
        </div>
      </div>
    </main>
<?php include('footer.php'); ?>
<?php include('commonAfterForm.php'); ?>

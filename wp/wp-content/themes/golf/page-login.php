<?php
/*
  Template Name: Login page
*/
get_header(); ?>

<div class="page_wrapper">

  <div class="section_default section_member">
    <div class="row">
      <div class="columns small-12 medium-10 medium-offset-1 large-8 large-offset-2">
        <div class="row">
          <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
            <?php // the_content(); ?>
          <?php endwhile; } ?>
        </div>

        <div class="row">
          <div class="columns">
            <form id="swpm-login-form" name="swpm-login-form" method="post" action="">
              <div class="swpm-login-form-inner">
                <div class="row">
                  <div class="columns small-12 medium-6">
                    <div class="swpm-username-label">
                      <label for="swpm_user_name" class="swpm-label">ユーザー名</label>
                    </div>
                    <div class="swpm-username-input">
                      <input type="text" class="swpm-text-field swpm-username-field" id="swpm_user_name" value="" size="25" name="swpm_user_name">
                    </div>
                  </div>

                  <div class="columns small-12 medium-6">
                    <div class="swpm-password-label">
                      <label for="swpm_password" class="swpm-label">パスワード</label>
                    </div>
                    <div class="swpm-password-input">
                      <input type="password" class="swpm-text-field swpm-password-field" id="swpm_password" value="" size="25" name="swpm_password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="swpm-remember-me columns">
                    <span class="swpm-remember-checkbox"><input type="checkbox" name="rememberme" value="checked='checked'"></span>
                    <span class="swpm-rember-label">ログイン状態を保存する</span>
                  </div>
                </div>

                <div class="row align-right">
                  <div class="swpm-login-submit columns shrink">
                    <input type="submit" class="button button_form swpm-login-form-submit" name="swpm-login" value="Login">
                  </div>
                </div>


                <div class="row">
                  <div class="swpm-forgot-pass-link columns shrink">
                    <a id="forgot_pass" class="swpm-login-form-pw-reset-link" href="http://localhost:8888/HAPPYS/golf/wp/sign-in/password-reset/">パスワードをお忘れですか？</a>
                  </div>
                  <div class="swpm-join-us-link columns shrink">
                    <a id="register" class="swpm-login-form-register-link" href="http://localhost:8888/HAPPYS/golf/wp/sign-up">新規登録</a>
                  </div>
                </div>


                <div class="swpm-login-action-msg">
                  <span class="swpm-login-widget-action-msg"></span>
                </div>
              </div>
            </form>
          </div>
        </div>


        </div>
      </div>
    </div>
  </div>

</div>
<?php get_footer();

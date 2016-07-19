<?php
/*
  Template Name: Member profile
*/
get_header(); ?>
<div class="page_wrapper section_member">

  <div class="row align-center">
    <div class="columns small-12 medium-10 medium-offset-1">
      <div class="row">
        <?php if ( is_user_logged_in() ) { ?>
            <a class="button button__user" href="<?php echo home_url();?>?swpm-logout=true">Log out</a>
            <a class="button button__user" href="<?php home_url(); ?>?swpm_delete_account=1">Delete your account</a>

        <?php } ?>
      </div>
    </div>
  </div>

</div>
<?php get_footer();

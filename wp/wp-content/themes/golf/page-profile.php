<?php
/*
  Template Name: Member profile
*/
get_header();
$current_user = wp_get_current_user(); ?>
<div class="page_wrapper section_member">

  <div class="row">
    <div class="columns small-12 medium-10 medium-offset-1 large-8 medium-offset-2">
      <p>
        Please contact us if you have any question or request. We would be happy to help!
      </p>

      <input id="user_email" type="hidden" name="your-email" value="<?php echo $current_user->user_email; ?>">
      <input id="user_name" type="hidden" name="your-name" value="<?php echo $current_user->user_nicename; ?>">
      <?php echo do_shortcode('[contact-form-7 id="10" title="Contact form 1"]'); ?>
    </div>
  </div>

<?php get_footer();

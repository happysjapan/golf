<?php
/*
  Template Name: Member page
*/
get_header(); ?>

<div class="page_wrapper section_member">

  <div class="row">
    <div class="columns small-12 medium-10 medium-offset-1">
      <div class="row">
        <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; } ?>
      </div>
    </div>
  </div>

</div>
<?php get_footer();

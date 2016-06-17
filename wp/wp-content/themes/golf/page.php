<?php
get_header(); ?>

<div class="page_wrapper">

  <div class="section_member">
    <div class="row">
      <div class="columns">
        <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; } ?>
      </div>
    </div>
  </div>

</div>
<?php get_footer();

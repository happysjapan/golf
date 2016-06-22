<?php
get_header();
?>

<div class="page_wrapper">
  <div class="row">
    <div class="columns small-12 medium-8 medium-offset-2">

      <section class="section_default section_gallery">
        <h2 class="section_default--title"><?php the_title(); ?></h2>
      </section>

      <div class="section_default section_gallery">
        <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; } ?>
      </div>

      <div class="section_default section_schedule section_navigation">
        <div class="post_nav row">
          <div class="columns small-6 post_nav--prev">
            <?php previous_post_link( '%link', '<< %title' ); ?>
          </div>
          <div class="columns small-6 post_nav--next">
            <?php next_post_link( '%link', '%title >>' ); ?>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
<?php get_footer();

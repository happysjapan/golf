<?php
get_header(); ?>

<div class="page_wrapper news">
  <div class="section_default section_news">


    <section id="news" class="section_news section_in_top" data-magellan-destination="news">
      <div class="row">
        <div class="large-12 columns">

          <ul class="news row">
            <?php
            $i = 0;

              if ( have_posts() ) {
              	while ( have_posts() ) {
              		the_post(); ?>
                    <?php get_template_part( 'includes/news', 'panel' ); ?>
                <?php } // end while
              } // end if ?>
          </ul>

        </div>
      </div>
    </section>
  </div>
</div>
<?php get_footer();

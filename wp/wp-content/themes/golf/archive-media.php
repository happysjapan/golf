<?php
get_header(); ?>

<div class="page_wrapper no_margin">
  <div class="section_default section_media">
    <section id="media" class="section_media section_in_top" data-magellan-destination="media">
      <div class="row align-top">

        <div class="columns small-12">
          <h2 class="section_default--archive_title row align-bottom">
            <div class="columns shrink">
              Media
            </div>
            <strong class="columns shrink">Mikumu Horikawa 公式サイト</strong>
          </h2>
        </div>
        <div class="section_default--main small-12 medium-9 columns">
          </h2>

          <ul class="media row">
            <?php
            $i = 0;

              if ( have_posts() ) {
              	while ( have_posts() ) {
              		the_post(); ?>
                    <?php get_template_part( 'includes/media', 'panel' ); ?>
                <?php } // end while
              } // end if ?>
          </ul>

        </div>

        <aside class="aside small-12 medium-3 columns">
          <?php
          $query = "
          SELECT DISTINCT YEAR(post_date)
          FROM $wpdb->posts
          WHERE post_type = 'post' AND post_status = 'publish'
          ORDER BY post_date DESC
          ";
          $years = $wpdb->get_col($query);
          ?>
          <h3 class="aside--title">Archives</h3>
          <ul class="aside--list">
          <?php foreach($years as $year) : ?>
            <li class="aside--list_item"><a href="<?php echo get_post_type_archive_link( 'post' ); ?>?y=<?php echo $year; ?>" class="aside--link"><?php echo $year; ?></a></li>
          <?php endforeach; ?>
          </ul>
        </aside>

      </div>
    </section>
  </div>
</div>
<?php get_footer();

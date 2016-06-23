<?php
get_header();

if( isset($_GET['y']) && $_GET['y'] != '' ) {
  $displayed_year = htmlspecialchars($_GET['y']).'年';
  function filter_where($where = '') {
    $year = htmlspecialchars($_GET['y']);
    $year = str_replace('/', '', $year);
    $year_start = $year.'0101';
    $year_end = $year.'1231';
    $where .= " AND meta_value >= '$year_start' AND meta_value <= '$year_end'";
    return $where;
  }
}
else {
  $displayed_year = date("Y").'年';
  function filter_where($where = '') {
    $year = date("Y");
    $year_start = $year.'0101';
    $where .= " AND meta_value >= '$year_start'";
    return $where;
  }
}

add_filter('posts_where', 'filter_where');
$custom_args = array(
  'posts_per_page' => -1,
  'post_type' => 'tournament',
  'post_status' => 'publish',
  'order' => 'DESC',
  'meta_key' => 'tournament_start_date',
  'orderby' => 'meta_value',
);
$wp_query = new WP_Query($custom_args);
?>

<div class="page_wrapper no_margin">
  <div class="section_default section_tournament">
    <section class="section_default">
      <div class="row align-top">
        <h2 class="section_default--archive_title columns small-12">Tournaments<strong><?php echo $displayed_year; ?></strong></h2>
        <div class="section_default--main small-12 medium-9 columns">
          <ul class="tournament row">
            <?php
            $i = 0;

              if ( $wp_query->have_posts() ) {
              	while ( $wp_query->have_posts() ) {
              		the_post(); ?>
                    <?php get_template_part( 'includes/tournament', 'panel' ); ?>
                <?php } // end while
                wp_reset_postdata();
              } // end if ?>
          </ul>
        </div>

        <aside class="aside small-12 medium-3 columns">
          <?php
          $query = "
          SELECT DISTINCT YEAR(post_date)
          FROM $wpdb->posts
          WHERE post_type = 'tournament' AND post_status = 'publish'
          ORDER BY post_date DESC
          ";
          $years = $wpdb->get_col($query);
          ?>
          <h3 class="aside--title">Archives</h3>
          <ul class="aside--list">
          <?php foreach($years as $year) : ?>
            <li class="aside--list_item"><a href="<?php echo get_post_type_archive_link( 'tournament' ); ?>?y=<?php echo $year; ?>" class="aside--link"><?php echo $year; ?></a></li>
          <?php endforeach; ?>
          </ul>
        </aside>
      </div>
    </section>
  </div>
</div>
<?php get_footer();

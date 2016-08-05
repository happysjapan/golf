<?php
get_header();

if( isset($_GET['y']) && $_GET['y'] != '' ) {
  $displayed_year = htmlspecialchars($_GET['y']).'年';
  function filter_where($where = '') {
    $year = htmlspecialchars($_GET['y']);
    $year_start = $year.'0101';
    $year_end = $year.'1231';
    $where .= " AND post_date >= '$year_start' AND post_date <= '$year_end'";
    return $where;
  }
}
else {
  $displayed_year = date("Y").'年';
  function filter_where($where = '') {
    $year = date("Y");
    $year_start = $year.'0101';
    $where .= " AND post_date >= '$year_start'";
    return $where;
  }
}
add_filter('posts_where', 'filter_where');

$custom_args = array(
  'posts_per_page' => -1,
  'post_type' => 'post',
  'post_status' => 'publish',
  'order' => 'DESC',
);
$wp_query = new WP_Query($custom_args);
?>

<div class="page_wrapper no_margin">
  <div class="section_default section_blog">
    <section class="section_default">
      <div class="row align-top">
        <div class="columns small-12">
          <h2 class="section_default--archive_title row align-bottom">
            <div class="columns shrink">
              Voice
            </div>
            <strong class="columns shrink"><?php echo $displayed_year; ?></strong>
          </h2>
        </div>
        <div class="section_default--main small-12 medium-9 columns">
          <ul class="blog row">
            <?php
            $i = 0;

              if ( $wp_query->have_posts() ) {
              	while ( $wp_query->have_posts() ) {
              		the_post(); ?>
                    <?php get_template_part( 'includes/voice', 'panel' ); ?>
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
          WHERE post_type = 'post' AND post_status = 'publish'
          ORDER BY post_date DESC
          ";
          $years = $wpdb->get_col($query);
          ?>


          <h3 class="aside--title">Archives</h3>
          <ul class="aside--list">
          <?php foreach($years as $year) : ?>
            <li class="aside--list_item"><a href="<?php echo get_category_link( get_category_by_slug('blog')->term_id ); ?>?y=<?php echo $year; ?>" class="aside--link"><?php echo $year; ?></a></li>
          <?php endforeach; ?>
          </ul>
        </aside>
      </div>
    </section>
  </div>
</div>
<?php get_footer();

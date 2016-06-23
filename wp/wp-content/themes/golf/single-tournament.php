<?php
get_header();
global $post;

if( isset($_GET['y']) && $_GET['y'] != '' ) {
  $displayed_year = htmlspecialchars($_GET['y']).'年';
}
else {
  $displayed_year = date("Y").'年';
}

$tournament_description = get_field('tournament_description');
$tournament_place = get_field('tournament_place');
$tournament_start_date = get_field('tournament_start_date');
$tournament_end_date = get_field('tournament_end_date');
$tournament_start_date = happys_get_custom_date($tournament_start_date);
$tournament_end_date = happys_get_custom_date($tournament_end_date);

$tournament_has_result = get_field('tournament_has_result');
$tournament_thumbnail = get_field('tournament_thumbnail')["sizes"]["thumbnail"];
?>

<div class="page_wrapper">
  <div class="row align-top">
    <div class="columns small-12 medium-10 medium-offset-1">

      <header class="section_article--header row">
        <h2 class="section_article--title columns small-12"><?php the_title(); ?></h2>

        <time class="section_article--date columns shrink">
          <?php echo $displayed_year; ?>
          <?php echo $tournament_start_date.'～'.$tournament_end_date; ?>
        </time>
        <div class="article_panel--text columns"><?php echo $tournament_place; ?></div>
      </header>

      <section class="section_article section_gallery">
        <h3 class="section_article--description"><?php echo $tournament_description ?></h3>

        <div class="section_article--content row">
          <div class="columns">
            <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; } ?>
          </div>
        </div>
      </section>

      <?php if( have_rows('tournament_slider') ){ ?>
        <div class="section_media">
          <div class="section_slider section_gallery">
            <div class="tournament_orbit orbit" role="region" aria-label="Favorite Cat Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
              <button class="no_anim orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
              <button class="no_anim orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

              <ul class="orbit-container">
                <?php while ( have_rows('tournament_slider') ) : the_row(); ?>
                  <li class="orbit-slide">
                    <img class="orbit-image" src="<?php echo get_sub_field('tournament_slider_image')['url']; ?>" alt="Space">
                  </li>
                <?php endwhile; ?>
              </ul>

              <nav class="orbit-bullets">
                <?php $i=0; while ( have_rows('tournament_slider') ) : the_row(); ?>
                  <button data-slide="<?php echo $i; $i++; ?>"><span class="show-for-sr"></span></button>
                <?php endwhile; ?>
              </nav>
            </div>
          </div>
        </div>
      <?php	} ?>



    </div>
  </div>

</div>
<?php get_footer();

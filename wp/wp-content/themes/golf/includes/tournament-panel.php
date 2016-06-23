<?php
if( isset($_GET['y']) && $_GET['y'] != '' ) {
  $displayed_year = htmlspecialchars($_GET['y']).'年';
}
else {
  $displayed_year = date("Y").'年';
}

  $tournament_description = get_field('tournament_description', get_the_ID());
  $tournament_place = get_field('tournament_place', get_the_ID());
  $tournament_start_date = get_field('tournament_start_date', get_the_ID());
  $tournament_end_date = get_field('tournament_end_date', get_the_ID());
  $tournament_start_date = happys_get_custom_date($tournament_start_date);
  $tournament_end_date = happys_get_custom_date($tournament_end_date);

  $tournament_has_result = get_field('tournament_has_result', get_the_ID());
  $tournament_thumbnail = get_field('tournament_thumbnail', get_the_ID())["sizes"]["thumbnail"];

  // echo "<pre>";
  // var_dump($tournament_thumbnail);

?>
<li class="small-12 columns article_panel tournament_panel">
  <?php if( $tournament_has_result ){ ?>

    <a href="<?php the_permalink(); ?>" title="" class="article_panel--link_box">
      <div class="article_panel--link_box--inner" data-equalizer-watch>
        <div class="article_panel--info row align-middle">
          <div class="article_panel--thumbnail--holder columns shrink">
            <img class="article_panel--thumbnail" src="<?php echo $tournament_thumbnail; ?>" alt="<?php the_title(); ?>" />
          </div>
          <div class="columns">
            <div class="article_panel--details row">
              <h3 class="article_panel--title"><?php the_title(); ?></h3>
              <div class="row align-middle">
                <time class="separator article_panel--date columns shrink">
                  <?php echo $displayed_year; ?>
                  <?php echo $tournament_start_date.'～'.$tournament_end_date; ?>
                </time>
                <div class="article_panel--text columns"><?php echo $tournament_place; ?></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </a>

  <?php } else{ ?>
    <div class="article_panel--box">
      <div class="article_panel--box--inner" data-equalizer-watch>
        <div class="article_panel--info row align-middle">
          <div class="columns">
            <h3 class="article_panel--title"><?php the_title(); ?></h3>
            <div class="row align-middle">
              <div class="separator article_panel--date columns shrink">
                <?php echo $displayed_year; ?>
                <?php echo $tournament_start_date.'～'.$tournament_end_date; ?>
              </div>
              <div class="article_panel--text columns"><?php echo $tournament_place; ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
</li>

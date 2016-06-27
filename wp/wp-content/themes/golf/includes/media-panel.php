<?php
  if( isset($_GET['y']) && $_GET['y'] != '' ) {
    $displayed_year = htmlspecialchars($_GET['y']).'年';
  }
  else {
    $displayed_year = date("Y").'年';
  }

  $media_description = get_field('media_description', get_the_ID());
  $media_thumbnail = get_field('media_thumbnail', get_the_ID())["sizes"]["thumbnail"];
?>
<li class="small-12 columns article_panel media_panel">
  <a href="<?php the_permalink(); ?>" title="" class="article_panel--link_box">
    <div class="article_panel--link_box--inner" data-equalizer-watch>
      <div class="article_panel--info row align-middle">
        <div class="article_panel--thumbnail--holder columns shrink">
          <img class="article_panel--thumbnail" src="<?php echo $media_thumbnail; ?>" alt="<?php the_title(); ?>" />
        </div>
        <div class="columns">
          <div class="article_panel--details row">
            <div class="columns small-12">
              <time class="article_panel--date">
                <?php echo $displayed_year; ?>
              </time>
              <h3 class="article_panel--title"><?php the_title(); ?></h3>
              <p class="article_panel--place"><?php echo $media_place; ?></p>
              <p class="article_panel--info"><?php echo $media_description; ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </a>
</li>

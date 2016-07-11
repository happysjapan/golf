<?php
  if( isset($_GET['y']) && $_GET['y'] != '' ) {
    $displayed_year = htmlspecialchars($_GET['y']).'年';
  }
  else {
    $displayed_year = date("Y").'年';
  }

  $blog_description = get_field('blog_description', get_the_ID());
  $blog_thumbnail = get_field('blog_thumbnail', get_the_ID())["sizes"]["thumbnail"];
?>
<li class="small-12 columns article_panel blog_panel">
  <a href="<?php the_permalink(); ?>" title="" class="article_panel--link_box">
    <div class="article_panel--link_box--inner">
      <div class="article_panel--info row align-middle">
        <div class="article_panel--thumbnail--holder columns shrink">
          <img class="article_panel--thumbnail" src="<?php echo $blog_thumbnail; ?>" alt="<?php the_title(); ?>" />
        </div>
        <div class="columns">
          <div class="article_panel--details row">
            <div class="columns small-12">
              <time class="article_panel--date">
                <?php echo $displayed_year; ?>
              </time>
              <h3 class="article_panel--title"><?php the_title(); ?></h3>
              <p class="article_panel--place"><?php echo $blog_place; ?></p>
              <p class="article_panel--info"><?php echo $blog_description; ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </a>
</li>

<?php
  $news_description = get_field('news_description', get_the_ID());
?>
<li class="small-12 medium-4 columns news_panel">
  <a href="<?php the_permalink(); ?>" title="" class="news_panel--link_box">
    <div class="news_panel--link_box--inner" data-equalizer-watch>
      <p class="news_panel--date"><?php echo get_the_date('Y-m-d', get_the_ID()); ?></p>
      <p class="news_panel--title"><?php the_title(); ?></p>
      <p class="news_panel--text"><?php echo $news_description; ?></p>
    </div>
  </a>
</li>

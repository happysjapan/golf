<?php
  $news_description = get_field('news_description', get_the_ID());
?>
<li class="small-12 medium-6 large-4 columns article_panel">
  <a href="<?php the_permalink(); ?>" title="" class="article_panel--link_box">
    <div class="article_panel--link_box--inner" data-equalizer-watch>
      <p class="article_panel--date"><?php echo get_the_date('Y-m-d', get_the_ID()); ?></p>
      <p class="article_panel--title"><?php the_title(); ?></p>
      <p class="article_panel--text"><?php echo $news_description; ?></p>
    </div>
  </a>
</li>

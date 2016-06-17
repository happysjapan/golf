<?php
get_header(); ?>

<div class="page_wrapper">

  <?php if( have_rows('gallery_slider') ){ ?>
    <div class="section_slider section_gallery row">
      <div class="columns small-12 medium-8 medium-offset-2">
        <div class="gallery_orbit orbit" role="region" aria-label="Favorite Cat Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
          <button class="no_anim orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
          <button class="no_anim orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

          <ul class="orbit-container">
            <?php
            while ( have_rows('gallery_slider') ) : the_row(); ?>
              <li class="orbit-slide">
                <img class="orbit-image" src="<?php echo get_sub_field('gallery_slider_image')['url']; ?>" alt="Space">
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  <?php	} ?>

  <div class="section_default section_gallery row">
    <div class="columns small-12 medium-8 medium-offset-2">
      <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; } ?>
    </div>
  </div>

</div>
<?php get_footer();

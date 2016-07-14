<?php if( have_rows('front_slider') ){ ?>

  <div id="front_orbit" class="front_orbit orbit" role="region" aria-label="Front slider | Mikumu Horikawa 公式サイト" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
    <ul class="orbit-container">
      <?php while ( have_rows('front_slider') ) : the_row(); ?>
        <li class="orbit-slide">
          <i class="front_orbit--image orbit-image" data-src-mobile="<?php echo get_sub_field('front_slider_image_mobile')['url']; ?>" data-src="<?php echo get_sub_field('front_slider_image')['url']; ?>"></i>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>

<?php	} ?>

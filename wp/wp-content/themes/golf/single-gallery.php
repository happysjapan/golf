<?php
get_header();
global $post;
$access_ctrl = SwpmAccessControl::get_instance();
?>

<div class="page_wrapper">
  <div class="row">
    <div class="columns small-12 medium-8 medium-offset-2">

      <section class="section_default section_gallery">
        <h2 class="section_default--title"><?php the_title(); ?></h2>
      </section>

      <?php if( have_rows('gallery_slider') && $access_ctrl->can_i_read_post($post) ){ ?>
        <div class="section_slider section_gallery">
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

            <nav class="orbit-bullets">
              <?php $i=0; while ( have_rows('gallery_slider') ) : the_row(); ?>
                <button data-slide="<?php echo $i; $i++; ?>"><span class="show-for-sr"></span></button>
              <?php endwhile; ?>
            </nav>
          </div>
        </div>
      <?php	} ?>

      <div class="section_default section_gallery">
        <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; } ?>
      </div>

      <div class="section_default section_gallery section_navigation">
        <div class="post_nav row">
          <div class="columns small-6 post_nav--prev">
            <?php previous_post_link( '%link', '<< %title' ); ?>
          </div>
          <div class="columns small-6 post_nav--next">
            <?php next_post_link( '%link', '%title >>' ); ?>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
<?php get_footer();

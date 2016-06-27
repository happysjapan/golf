<?php
get_header();
global $post;
$access_ctrl = SwpmAccessControl::get_instance();
$gallery_video_media = get_field("gallery_video_media");
$gallery_description = get_field("gallery_description");
?>

<div class="page_wrapper">
  <div class="row">
    <div class="columns small-12 medium-10 medium-offset-1 large-8 large-offset-2">

      <header class="section_article--header">
        <h2 class="section_article--title"><?php the_title(); ?></h2>
        <time class="section_article--date"><?php echo get_the_date('Y-m-d'); ?></time>
      </header>

      <?php if( have_rows('gallery_slider') && $access_ctrl->can_i_read_post($post) ){ ?>
        <div class="section_media">
          <div class="section_slider section_gallery">
            <div class="gallery_orbit orbit" role="region" aria-label="Favorite Cat Pictures" data-orbit data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
              <button class="no_anim orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;</button>
              <button class="no_anim orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>

              <ul class="orbit-container">
                <?php while ( have_rows('gallery_slider') ) : the_row(); ?>
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
        </div>
      <?php	} ?>

      <?php if( $gallery_video_media ){
        $video_link = get_field("gallery_video_link");
        $video_link_code = str_replace("https://youtu.be/", "", $video_link);
        ?>
        <div class="section_media">
          <iframe class="video_player" src="https://www.youtube.com/embed/<?php echo $video_link_code; ?>?showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>
      <?php } ?>


      <section class="section_article section_gallery">
        <h3 class="section_article--description"><?php echo $gallery_description ?></h3>

        <div class="section_edition section_article--content row">
          <div class="columns">
            <?php if ( have_posts() ) { while ( have_posts() ) : the_post(); ?>
              <?php the_content(); ?>
            <?php endwhile; } ?>
          </div>
        </div>

        <div class="post_nav row">
          <div class="columns small-6 post_nav--prev">
            <?php previous_post_link( '%link', '<< %title' ); ?>
          </div>
          <div class="columns small-6 post_nav--next">
            <?php next_post_link( '%link', '%title >>' ); ?>
          </div>
        </div>
      </section>

    </div>
  </div>

</div>
<?php get_footer();

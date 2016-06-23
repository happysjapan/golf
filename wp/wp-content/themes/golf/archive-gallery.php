<?php
get_header(); ?>

<div class="page_wrapper">
  <div class="section_gallery section_default">
    <div class="row">
      <div class="columns large-12">

        <h2 class="section_default--archive_title row align-bottom">
          <div class="columns shrink">
            Gallery
          </div>
          <strong class="columns shrink">Mikumu Horikawa 公式サイト</strong>
        </h2>

        <ul id="listing" class="gallery grid" data-masonry='{ "itemSelector": ".grid-item" }'>

          <?php
          $custom_args = array(
            'post_type' => 'gallery',
            'orderby' => 'date',
            'order'			     => 'DESC',
            'posts_per_page' => -1
          );
          $post_array = get_posts( $custom_args );

          $lenght = count($post_array);
          $k = 0;
          $i = 0;


            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post(); ?>

                <?php
                  $clip_image = get_field("gallery_clip_image", get_the_id());
                  $grid_width = get_field("gallery_grid_width", get_the_id());
                  $grid_height = get_field("gallery_grid_height", get_the_id());
                  $description = get_field("gallery_description", get_the_id());
                  $gallery_video_media = get_field("gallery_video_media", get_the_id());

                  $access_ctrl = SwpmAccessControl::get_instance();
                ?>

                <li class="gallery--item grid-item grid-item--width-<?php echo $grid_width; ?> grid-item--height-<?php echo $grid_height; ?>">

                  <?php if ($access_ctrl->can_i_read_post($post)){ ?>
                    <?php if( $i < 10 ){ ?>
                      <a href="<?php the_permalink(); ?>" class="gallery--item--link" style="background-image:url('<?php echo $clip_image['url']; ?>');">
                    <?php } else { ?>
                      <a href="#" class="lazy gallery--item--link" data-src="<?php echo $clip_image['url']; ?>">
                    <?php } ?>

                    <?php if( $gallery_video_media ){ ?>
                      <span class="gallery--video_overlay"></span>
                    <?php } ?>

                    <div class="gallery--item--info">
                      <div class="gallery--item--info--inner">
                        <h3 class="gallery--item--title"><?php the_title(); ?></h3>
                        <p class="gallery--item--description">
                          <?php echo $description; ?>
                        </p>
                      </div>
                    </div>
                  </a>
                  <?php } else { ?>
                    <div class="gallery--item--link member_only"></div>
                  <?php } ?>
              </li>
              <?php $i++; $k++; } // end while
            } // end if ?>

        </ul>

      </div>
    </div>
  </div>

</div>
<?php get_footer();

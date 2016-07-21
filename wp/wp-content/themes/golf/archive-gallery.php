<?php get_header(); ?>

<?php
$user_is_log = is_user_logged_in();
$categories = get_terms( array(
  'taxonomy' => 'gallery-cat',
  'hide_empty' => false,
) );
?>

<div class="page_wrapper">
  <div class="section_gallery section_default">
    <div class="row">
      <div class="columns large-12">
        <div class="row align-middle">
          <div class="columns section_default--archive_title--holder">
            <h2 class="section_default--archive_title row align-bottom">
              <div class="columns shrink">
                Gallery
              </div>
              <strong class="columns shrink">Mikumu Horikawa 公式サイト</strong>
            </h2>
          </div>

          <div class="gallery--categories columns shrink">
            <div class="button-group">
              <a class="button active" href="<?php echo get_post_type_archive_link( 'gallery' ); ?>">All</a>
              <?php foreach ($categories as $category) { ?>
                <a class="button" href="<?php echo get_term_link($category->term_id); ?>"><?php echo $category->name; ?></a>
              <?php } ?>
            </div>
          </div>
        </div>

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

                  if( $grid_width == 2 ){
                    $clip_image = $clip_image['sizes']['large'];
                  } else {
                    $clip_image = $clip_image['sizes']['medium'];
                  }

                  // $access_ctrl = SwpmAccessControl::get_instance();
                ?>

                <li class="gallery--item grid-item grid-item--width-<?php echo $grid_width; ?> grid-item--height-<?php echo $grid_height; ?>">

                  <?php if ( !get_field("_wpmem_block", get_the_id()) || $user_is_log ){ ?>
                    <?php if( $i < 10 ){ ?>
                      <a href="<?php the_permalink(); ?>" class="gallery--item--link" style="background-image:url('<?php echo $clip_image; ?>');">
                    <?php } else { ?>
                      <a href="#" class="lazy gallery--item--link" data-src="<?php echo $clip_image; ?>">
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

                        <?php $post_cat = wp_get_post_terms( get_the_id() , 'gallery-cat');
                        foreach ($post_cat as $tag) { ?>
                            <span class="gallery--item--tag">
                              <i class="fa fa-tag" aria-hidden="true"></i><?php echo $tag->name; ?>
                            </span>
                        <?php } ?>
                      </div>
                    </div>
                  </a>
                  <?php } else { ?>
                    <a href="<?php echo get_permalink(get_page_by_path('sign-up')); ?>" class="gallery--item--link member_only"></a>
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

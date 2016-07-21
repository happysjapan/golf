<?php
get_header();
global $post;
$user_is_log = is_user_logged_in();
$gallery_video_media = get_field("gallery_video_media");
$gallery_description = get_field("gallery_description");

// $queried_object = get_queried_object();
$post_cat = wp_get_post_terms( get_the_id() , 'gallery-cat');
$categories = get_terms( array(
  'taxonomy' => 'gallery-cat',
  'hide_empty' => false,
) );
?>

<div class="page_wrapper">
  <div class="row">
    <div class="columns small-12 medium-10 medium-offset-1 large-8 large-offset-2">

      <?php if( !get_field("_wpmem_block", get_the_id()) || $user_is_log ){ ?>

        <header class="section_article--header">
          <h2 class="section_article--title row align-bottom">
            <div class="columns">
              <?php the_title(); ?>
            </div>
            <div class="section_article--buttons columns shrink">
              <div class="button-group">
                <?php $post_cat = wp_get_post_terms( get_the_id() , 'gallery-cat');
                foreach ($post_cat as $tag) { ?>
                  <a class="button" href="<?php echo get_term_link($tag->term_id); ?>"><?php echo $tag->name; ?></a>
                <?php } ?>
              </div>
            </div>
          </h2>
          <time class="section_article--date"><?php echo get_the_date('Y-m-d'); ?></time>
        </header>

        <?php if( have_rows('gallery_slider') ){ ?>
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

      <?php	} else { ?>

        <div class="section_media">
          <p>
            このコンテンツは会員の方専用です。<br>
            ご登録済みの方はログインを<br />
            まだの方は会員登録をお願いします。.
          </p>
          <div class="button-group">
            <a class="button" href="<?php echo get_permalink(get_page_by_path('sign-up')); ?>">新規無料会員登録</a>
            <a class="button" href="<?php echo get_permalink(get_page_by_path('sign-in')); ?>">ログイン</a>
          </div>
        </div>

      <?php	} ?>

    </div>
  </div>

</div>
<?php get_footer();

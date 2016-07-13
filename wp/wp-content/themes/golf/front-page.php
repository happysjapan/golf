<?php
/*
  Template Name: Front page
*/
get_template_part( 'includes/template', 'front-header' );
global $post;
?>

<div class="cd-parallax">


<!-- Main Section -->
<section class="section_main">
  <div class="section_main--inner row">
    <div class="large-12 columns section_main--inner--columns">

      <?php get_template_part( 'includes/front', 'slider' ); ?>

      <div class="parts_holder">
        <div class="parts_holder--inner row">
          <div class="sign_holder small-6 columns">
            <img src="<?php echo get_template_directory_uri(); ?>/images/top/sign.png" alt="Mikumu Horikawa サイン" width="360"  class="sign_holder--image"/>
          </div>
          <div class="small-6 columns text-right align-self-bottom">
            <a href="" class="banner_charity button" title="チャリティー活動">
              <img src="<?php echo get_template_directory_uri(); ?>/images/top/charity_ribbon.png" alt="チャリティー活動" width="41" height="50" class="banner_charity--image" />
              <div class="banner_charity--texts">
                <p class="text_en">CHARITY</p>
                <p class="text_ja">チャリティー活動</p>
              </div>
            </a>
        </div>
        </div>
      </div>

      <ul class="inpage_menu">
        <li><a href="#news" title="NEWS"><p>NEWS<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
        <li><a href="#about" title="ABOUT"><p>ABOUT<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
        <li><a href="#sponsor" title="SPONSOR"><p>SPONSOR<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
        <li><a href="#instagram" title="instagram"><p>INSTAGRAM<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
      </ul>
    </div>
  </div>
</section>
<!-- / Main Section -->

<!-- NEWS Section -->
<section id="news" class="section_news section_in_top">
  <div class="row">
    <div class="large-12 columns">
      <?php
      $custom_args = array(
        'post_type' => 'news',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3
      );
      $post_array = get_posts( $custom_args ); ?>
      <h3 class="section_title">NEWS</h3>
      <ul class="row" class="news_wrap" data-equalizer>
        <?php foreach ($post_array as $post) {
          setup_postdata( $post );
          get_template_part( 'includes/news', 'panel' );
        } wp_reset_postdata(); ?>
      </ul>

      <a href="<?php echo get_post_type_archive_link( 'news' ); ?>" title="View All" class="button"><p>View All</p><i class="fa fa-angle-right" aria-hidden="true"></i></a>

    </div>
  </div>
</section>
<!-- / NEWS Section -->


<!-- ABOUT Section -->
<section id="about" class="section_about section_in_top">
  <div class="cd-background-wrapper">
    <figure class="cd-floating-background">
  		<img class="parallax--image" src="<?php echo get_template_directory_uri(); ?>/images/ball_white.png" alt="ball white">
      <img class="parallax--image" src="<?php echo get_template_directory_uri(); ?>/images/ball_white.png" alt="ball white 2">
  	</figure>
  </div>


  <div class="row">
    <div class="large-12 columns">
      <h3 class="section_title">ABOUT</h3>

      <ul class="parallax_trigger about_list tabs row align-center" data-tabs id="about-tabs">
        <li class="about_list--tab is-active tabs-title columns small-4" role="presentation">
          <a href="#panel1" aria-selected="true" class="about_list--tab--link no_anim">
            <div class="inner">
              <img src="<?php echo get_template_directory_uri(); ?>/images/top/about_profile.jpg" alt="堀川未来夢 プロフィール" class="about_list--tab--image" />
              <h4 class="about_list--tab--title">PROFILE</h4>
            </div>
          </a>
        </li>
        <li class="about_list--tab tabs-title columns small-4" role="presentation">
          <a href="#panel2" class="about_list--tab--link no_anim">
            <div class="inner">
              <img src="<?php echo get_template_directory_uri(); ?>/images/top/about_message.jpg" alt="堀川未来夢 メッセージ" class="about_list--tab--image" />
              <h4 class="about_list--tab--title">MESSAGE</h4>
            </div>
          </a>
        </li>
        <li class="about_list--tab tabs-title columns small-4" role="presentation">
          <a href="#panel3" class="about_list--tab--link no_anim">
            <div class="inner">
              <img src="<?php echo get_template_directory_uri(); ?>/images/top/about_bag.jpg" alt="堀川未来夢 バッグの中" class="about_list--tab--image" />
              <h4 class="about_list--tab--title">IN THE BAG</h4>
            </div>
          </a>
        </li>
      </ul>

      <div class="tabs-content about_content" data-tabs-content="about-tabs">
        <div class="tabs-panel is-active about_content--panel" id="panel1">
            <h4 class="about_content--panel--title">PROFILE</h4>
            <div class="about_content--panel--description">
              <h5 class="name_holder"><p class="name">堀川未来夢</p><p class="name_en">Mikumu Horikawa</p></h5>
              <div class="row">
                <dl class="small-12 medium-3 columns profile_items profile_items_list">
                  <?php
                  $birthday = strtotime(get_field('profile_birthday'));
                  ?>
                  <dt>生年月日</dt><dd><?php echo date('Y.m.d', $birthday); ?></dd>
                  <dt>出身地</dt><dd><?php echo get_field('profile_birthplace'); ?></dd>
                  <dt>血液型</dt><dd><?php echo get_field('profile_bloodtype'); ?></dd>
                  <dt>身長</dt><dd><?php echo get_field('profile_height'); ?></dd>
                  <dt>体重</dt><dd><?php echo get_field('profile_weight'); ?></dd>
                  <dt>経歴</dt><dd><?php echo get_field('profile_school'); ?></dd>
                </dl>
                <dl class="small-12 medium-9 columns profile_items profile_items_biography">
                  <dt>Biography</dt><dd><?php echo get_field('profile_trigger'); ?></dd>
                  <?php if (get_field('profile_result_student')) { ?>
                    <dt>中学時代、高校、大学時代の成績</dt><dd><?php echo get_field('profile_result_student'); ?></dd>
                  <?php } ?>
                  <?php if (get_field('profile_result_debut')) { ?>
                    <dt>プロデビュー年およびルーキーイヤーの成績</dt><dd><?php echo get_field('profile_result_debut'); ?></dd>
                  <?php } ?>
                  <?php if (get_field('profile_result_thisyear')) { ?>
                    <dt>今年の成績（シーズンスタート）</dt><dd><?php echo get_field('profile_result_thisyear'); ?></dd>
                  <?php } ?>
                </dl>
                <!-- <dl class="small-12 medium-8 columns profile_items profile_items_biography">
                  <dt>バイオグラフィー</dt>
                  <dd>既にゴルフを始めていた中学時代はテニス部に入った。力をつけたのは大学進学後。筋力トレーニングに力を入れ、体重は64kgから78kgまで増加した。176cmと背丈は標準だが、がっしりとした体格をしている。ルーキーイヤーとなった2015年のツアー外競技「ネスレ日本マッチプレー選手権 レクサス杯」の１回戦で石川遼を破り、一躍注目を浴びる存在に。「石川遼くん」と他人行儀に呼んでいるが、学年は１つしか違わない。シーズン終盤の「ブリヂストンオープン」で２位になるなど初シードを獲得した。アマチュア時代の2012、13年に国体で２連覇を達成している。</dd>
                </dl> -->
              </div>
            </div>
        </div>
        <div class="tabs-panel about_content--panel" id="panel2">
          <h4 class="about_content--panel--title">MESSAGE</h4>
          <div class="about_content--panel--description">
            <p><?php echo get_field('message'); ?></p>
          </div>
        </div>
        <div class="tabs-panel about_content--panel in_the_bag" id="panel3">
          <h4 class="about_content--panel--title">IN THE BAG</h4>
          <div class="about_content--panel--description">
              <div class="row">
                <dl class="small-12 columns profile_items profile_items_list">
                  <dt>番手</dt><dd><?php echo get_field('bag_number'); ?></dd>
                  <dt>モデル</dt><dd><?php echo get_field('bag_model'); ?></dd>
                  <dt>シャフト</dt><dd><?php echo get_field('bag_shaft'); ?></dd>
                  <dt>ロフト</dt><dd><?php echo get_field('bag_loft'); ?></dd>
                  <dt>長さ</dt><dd><?php echo get_field('bag_length'); ?></dd>
                  <dt>フレックス</dt><dd><?php echo get_field('bag_flex'); ?></dd>
                </dl>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / ABOUT Section -->

<!-- SPONSOR Section -->
<section id="sponsor" class="section_sponsor section_in_top">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="section_title">SPONSOR</h3>

      <ul class="sponsor_list">
        <!--  <li class="sponsor">
          <a href="" title="" class="sponsor--link">
            <img src="" width="160" height="80" alt="" class="sponsor--image" />
          </a>
        </li>
        <li class="sponsor">
          <a href="" title="" class="sponsor--link">
            <img src="" width="160" height="80" alt="" class="sponsor--image" />
          </a>
        </li>
        <li class="sponsor">
          <a href="" title="" class="sponsor--link">
            <img src="" width="160" height="80" alt="" class="sponsor--image" />
          </a>
        </li> -->

        <?php while(have_rows('sponsor')): the_row(); ?>
          <li class="sponsor_list--item">
            <a href="<?php the_sub_field('sponsor_url'); ?>" target="blank"><img src="<?php the_sub_field('sponsor_image'); ?>" alt="<?php the_sub_field('sponsor_name'); ?>" width="160" class="sponsor_list--image"/></a>
          </li>
        <?php endwhile; ?>

      </ul>
    </div>
  </div>
</section>
<!-- /SPONSOR Section -->

<!-- INSTAGRAM Section -->
<section id="instagram" class="section_instagram section_in_top">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="section_title">INSTAGRAM</h3>
      <?php echo do_shortcode('[instagram-feed]'); ?>
    </div>
  </div>
</section>
<!-- INSTAGRAM Section -->

<!-- SNS Section -->
<section id="sns" class="section_sns section_in_top">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="section_title">SNS</h3>
    </div>
  </div>
</section>
<!-- SNS Section -->
</div>


<?php get_footer();

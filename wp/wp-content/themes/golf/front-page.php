<?php
/*
  Template Name: Front page
*/
get_template_part( 'includes/template', 'front-header' );
global $post;
?>

<!-- Main Section -->
<section class="section_main">
  <div class="row">
    <div class="large-12 columns section_main--inner">

      <?php get_template_part( 'includes/front', 'slider' ); ?>

      <a href="" class="banner_charity button" title="チャリティー活動">
        <img src="<?php echo get_template_directory_uri(); ?>/images/top/charity_ribbon.png" alt="チャリティー活動" width="41" height="50" class="banner_charity--image" />
        <div class="banner_charity--texts">
          <p class="text_en">CHARITY</p>
          <p class="text_ja">チャリティー活動</p>
        </div>
      </a>

      <ul class="inpage_menu" data-magellan-expedition="fixed">
        <li data-magellan-arrival="news"><a href="#news" title="NEWS"><p>NEWS<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
        <li data-magellan-arrival="about"><a href="#about" title="ABOUT"><p>ABOUT<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
        <li><a href="#sponsors" title="SPONSORS"><p>SPONSORS<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
        <li><a href="#sns" title="SNS"><p>SNS<i class="fa fa-angle-down" aria-hidden="true"></i></p></a></li>
      </ul>
    </div>
  </div>
</section>
<!-- / Main Section -->

<!-- NEWS Section -->
<a name="news"></a>
<section id="news" class="section_news section_in_top" data-magellan-destination="news">
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
<a name="about" href="#about"></a>
<section id="about" class="section_about section_in_top" data-magellan-destination="about">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="section_title">ABOUT</h3>

      <ul class="about_list tabs row align-center" data-tabs id="about-tabs">
        <li class="about_list--tab is-active tabs-title columns shrink small-4" role="presentation">
          <a href="#panel1" aria-selected="true" class="about_list--tab--link no_anim">
            <img src="<?php echo get_template_directory_uri(); ?>/images/top/about_profile.png" alt="堀川未来夢 プロフィール" class="about_list--tab--image" />
            <h4 class="about_list--tab--title">PROFILE</h4>
          </a>
        </li>
        <li class="about_list--tab tabs-title columns shrink small-4" role="presentation">
          <a href="#panel2" class="about_list--tab--link no_anim">
            <img src="<?php echo get_template_directory_uri(); ?>/images/top/about_message.png" alt="堀川未来夢 メッセージ" class="about_list--tab--image" />
            <h4 class="about_list--tab--title">MESSAGE</h4>
          </a>
        </li>
        <li class="about_list--tab tabs-title columns shrink small-4" role="presentation">
          <a href="#panel3" class="about_list--tab--link no_anim">
            <img src="<?php echo get_template_directory_uri(); ?>/images/top/about_bag.png" alt="堀川未来夢 バッグの中" class="about_list--tab--image" />
            <h4 class="about_list--tab--title">IN THE BAG</h4>
          </a>
        </li>
      </ul>

      <div class="tabs-content about_content" data-tabs-content="about-tabs">
        <div class="tabs-panel is-active about_content--panel" id="panel1">
            <h4 classs="about_content--panel--text">PROFILE</h4>
            <div class="about_content--panel--description">
              <h5 class="name_holder"><p class="name">堀川未来夢</p><p class="name_en">Mikumu Horikawa</p></h5>
              <div class="row">
                <dl class="small-12 medium-4 columns profile_items profile_items_list">
                  <dt>生年月日</dt><dd><?php echo get_field('profile_birthday'); ?></dd>
                  <dt>出身地</dt><dd><?php echo get_field('profile_birthplace'); ?>神奈川県</dd>
                  <dt>血液型</dt><dd>A型</dd>
                  <dt>身長</dt><dd>176.0cm</dd>
                  <dt>体重</dt><dd>78.0kg</dd>
                  <dt>経歴</dt><dd>テキストテキストテキストテキストテキストテキストテキストテキスト</dd>
                </dl>
                <dl class="small-12 medium-8 columns profile_items profile_items_biography">
                  <dt>バイオグラフィー</dt>
                  <dd>既にゴルフを始めていた中学時代はテニス部に入った。力をつけたのは大学進学後。筋力トレーニングに力を入れ、体重は64kgから78kgまで増加した。176cmと背丈は標準だが、がっしりとした体格をしている。ルーキーイヤーとなった2015年のツアー外競技「ネスレ日本マッチプレー選手権 レクサス杯」の１回戦で石川遼を破り、一躍注目を浴びる存在に。「石川遼くん」と他人行儀に呼んでいるが、学年は１つしか違わない。シーズン終盤の「ブリヂストンオープン」で２位になるなど初シードを獲得した。アマチュア時代の2012、13年に国体で２連覇を達成している。</dd>
                </dl>
              </div>
            </div>
        </div>
        <div class="tabs-panel about_content--panel" id="panel2">
          <h4 classs="about_content--panel--text">MESSAGE</h4>
          <div class="about_content--panel--description">
            <p>いつも応援してくださっているファンの皆様、サイトを訪れてくださった皆様、ありがとうございます。ファンの皆様に僕のことをもっと知っていただき、僕達若手が男子プロゴルファー界を盛り上げていければと思い、今回このサイトを設立しました。<br />
            &nbsp;&nbsp;「堀川未来夢」という選手の持ち味は、まず「アプローチパター」。あまり飛距離を飛ばすタイプでもないですし、アクションの大きなゴルフではありませんが、小技を駆使して苦しい局面でもなんとか堅実にパーを積み重ねていく。そして、チャンスが来た時にバーディーを決める。それが僕のプレースタイルです。なので、難コースになればなるほど、特に僕の長所が見ていただけると思います。<br />
            &nbsp;&nbsp;ゴルフは選手生命の非常に長いスポーツです。僕の最終目標はマスターズで優勝することですが、その為に、まずは「1勝する」ということと、「シードを取る」こと。それを最も頭において日々努力しています。<br />
            &nbsp;プロゴルファーは、ゴルフのスコアはもちろんですが、何よりファンの皆様の支えが1番大切だと思っています。ですので、僕はファンサービスを常に心がけるようにしています。これからも、試合会場はもちろん、このサイト内においても、僕の試合成績やプライベートな部分の動画なども公開していき、より一層ファンの方々と近い距離感で接することができればと思っています。</p>
          </div>
        </div>
        <div class="tabs-panel about_content--panel" id="panel3">
          <h4 classs="about_content--panel--text">IN THE BAG</h4>
          <div class="about_content--panel--description">
              <div class="row">
                <dl class="small-12 columns profile_items profile_items_list">
                  <dt>番手</dt><dd>aaaa</dd>
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
<a name="sponsor" href="#sponsor"></a>
<section id="sponsor" class="section_sponsor section_in_top">
  <div class="row">
    <div class="large-12 columns">
      <h3 class="section_title">SPONSOR</h3>

      <ul class="sponsor-list">
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
          <li>
            <a href="<?php the_sub_field('sponsor_url'); ?>" target="blank"><img src="<?php the_sub_field('sponsor_image'); ?>" alt="<?php the_sub_field('sponsor_name'); ?>" width="160" class="sponsor--image"/></a>
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
      [instagram-feed]
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



<?php get_footer();

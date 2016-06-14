<footer class="footer">
  <div class="footer--section">
    <div class="button__top--holder row">
      <a id="js_top" class="button__top button" title="Top page">
        <svg class="icon icon-arrow_up"><use xlink:href="#icon-arrow_up"></use></svg>
      </a>
    </div>
  </div>


  <div class="footer--section footer--sitemap">
    <div class="row">
      <div class="small-12 medium-6 columns">
        <div class="row">
          <nav id="sitemap_left" class="sitemap column">
            <?php
            $args = array(
             'theme_location' => 'sitemap-left',
             'container' => false,
             'items_wrap' => '<ul class="sitemap--menu dropdown menu" data-dropdown-menu>%3$s</ul>',
             'walker' => new footer_walker()
            );
            wp_nav_menu( $args ) ;
            ?>
          </nav>
        </div>
      </div>

      <div class="small-12 medium-6 columns">
        <div class="row">
          <nav id="sitemap_right" class="sitemap column">
            <?php
            $args = array(
             'theme_location' => 'sitemap-right',
             'container' => false,
             'items_wrap' => '<ul class="sitemap--menu dropdown menu" data-dropdown-menu>%3$s</ul>',
             'walker' => new footer_walker()
            );
            wp_nav_menu( $args ) ;
            ?>
          </nav>
        </div>
      </div>
    </div>
  </div>


  <div class="footer--section footer--credits">
    <div class="row align-middle">
      <div class="columns small-12 medium-6">
        <div class="footer--credits--right row">
          <a href="<?php echo get_permalink(get_page_by_path('privacypolicy')); ?>" class="footer--credits--link" title="プライバシーポリシー">プライバシーポリシー</a>
           |
          <a href="<?php echo get_permalink(get_page_by_path('sitepolicy')); ?>" class="footer--credits--link" title="サイトポリシー">サイトポリシー</a>
        </div>
      </div>

      <div class="columns small-12 medium-6">
        <div class="row">
          <small class="small-12 medium-12 columns">Copyright © 2016 地域後見推進プロジェクト All Rights Reserved.</small>
        </div>
      </div>
    </div>
  </div>

</footer>
<script src="<?php echo get_template_directory_uri(); ?>/bower_components/foundation-sites/dist/foundation.min.js"></script>


<script src="<?php echo get_template_directory_uri(); ?>/js/min/app.js"></script>
<!--
<script src="http://localhost:8888/chiiki-kouken/src/js/app.js"></script>
-->

<?php wp_footer(); ?>
</body>
</html>

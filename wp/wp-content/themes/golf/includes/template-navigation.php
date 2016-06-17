<nav id="nav" class="nav">
  <?php
  $args = array(
   'theme_location' => 'navigation',
   'container' => false,
   'items_wrap' => '<ul class="nav--menu menu" >%3$s</ul>',
   'walker' => new nav_walker()
  );
  wp_nav_menu( $args, $id ) ;
  ?>

  <div class="sign_menu columns">
    <ul class="dropdown menu sign_menu--menu align-center">
      <li class="sign_menu--item" role="menuitem"><a class="sign_menu--link" href="<?php echo get_permalink(get_page_by_path('sign-up')); ?>">SIGN UP</a></li>
      <li class="sign_menu--item" role="menuitem"><a class="sign_menu--link" href="<?php echo get_permalink(get_page_by_path('sign-in')); ?>">SIGN IN</a></li>
    </ul>
  </div>
</nav>

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
    <?php if ( is_user_logged_in() ) { ?>
      <?php $user = get_currentuserinfo(); ?>
      <h5 class="sign_menu--user"><a class="sign_menu--link" href="<?php echo get_permalink(get_page_by_path('profile')); ?>" title="<?php echo $user->user_nicename; ?>">Hello, <?php echo $user->user_nicename; ?></a></h5>
      <ul class="dropdown menu sign_menu--menu align-left">
        <li class="sign_menu--item" role="menuitem"><a class="sign_menu--link" href="<?php echo wp_logout_url( home_url() ); ?>">Log out</a></li>
      </ul>
    <?php } else { ?>
      <ul class="dropdown menu sign_menu--menu align-center">
        <li class="sign_menu--item" role="menuitem"><a class="sign_menu--link" href="<?php echo get_permalink(get_page_by_path('sign-up')); ?>">SIGN UP</a></li>
        <li class="sign_menu--item" role="menuitem"><a class="sign_menu--link" href="<?php echo get_permalink(get_page_by_path('sign-in')); ?>">SIGN IN</a></li>
      </ul>
    <?php } ?>
  </div>
</nav>

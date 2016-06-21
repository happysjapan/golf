<?php
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   	wp_deregister_script('jquery');
  	wp_deregister_script( 'wp-embed' );
    wp_enqueue_script( 'jquery', get_template_directory_uri().'/bower_components/jquery/dist/jquery.min.js');
}
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );



// show admin bar only for admins
if (!current_user_can('manage_options')) {
	add_filter('show_admin_bar', '__return_false');
}
// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}



 /*-------------------------------------------*/
 /*	Menu
 /*-------------------------------------------*/
function register_my_menu() {
  register_nav_menu('navigation',__( 'Navigation' ));
	register_nav_menu('sitemap-left',__( 'Footer sitemap left' ));
	register_nav_menu('sitemap-right',__( 'Footer sitemap right' ));
}
add_action( 'init', 'register_my_menu' );


/*-------------------------------------------*/
/*	golf_theme_setup
/*-------------------------------------------*/
function golf_theme_setup() {
	add_theme_support( 'widgets' );
}
add_action( 'after_setup_theme', 'golf_theme_setup' );

if ( function_exists('register_sidebar') ) {
	$default = array(
	'name'          => __( 'Default sidebar', 'golf' ),
	'id' => 'aside-widget-area',
	'before_widget' => '<div class="aside--widget widget %2$s clearfix" id="%1$s">',
	'after_widget' => '</div>',
	'description'   => 'Default sidebar widgets');

  $asideMenu = array(
	'name'          => __( 'Aside menu', 'golf' ),
	'id' => 'aside-menu-area',
	'before_widget' => '<section class="aside--section aside_menu">',
	'after_widget' => '</section>',
	'description'   => 'Display page menu');

	register_sidebar( $default );
	register_sidebar( $asideMenu );
}



/*-------------------------------------------*/
/*	Custom post type _ add gallery
/*-------------------------------------------*/

add_post_type_support( 'gallery', 'front-end-editor' );

add_action( 'init', 'golf_gallery_create_post_type', 0 );
function golf_gallery_create_post_type() {
 $galleryLabelName = 'Gallery';
 register_post_type( 'gallery', /* post-type */
 array(
   'labels' => array(
   'name' => $galleryLabelName,
   'singular_name' => $galleryLabelName
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
 // Add information category
 register_taxonomy(
   'gallery-cat',
   'gallery',
   array(
     'hierarchical' => true,
     'update_count_callback' => '_update_post_term_count',
     'label' => $galleryLabelName._x(' category','admin menu'),
     'singular_label' => $galleryLabelName._x(' category','admin menu'),
     'public' => true,
     'show_ui' => true,
   )
 );
}

/*-------------------------------------------*/
/*	Custom post type _ add news
/*-------------------------------------------*/
add_post_type_support( 'news', 'front-end-editor' );

add_action( 'init', 'golf_news_create_post_type', 0 );
function golf_news_create_post_type() {
 $newsLabelName = 'News';
 register_post_type( 'news', /* post-type */
 array(
   'labels' => array(
   'name' => $newsLabelName,
   'singular_name' => $newsLabelName
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
 // Add information category
 register_taxonomy(
   'news-cat',
   'news',
   array(
     'hierarchical' => true,
     'update_count_callback' => '_update_post_term_count',
     'label' => $newsLabelName._x(' category','admin menu'),
     'singular_label' => $newsLabelName._x(' category','admin menu'),
     'public' => true,
     'show_ui' => true,
   )
 );
}

/*-------------------------------------------*/
/*	Custom post type _ add schedule
/*-------------------------------------------*/
add_post_type_support( 'schedule', 'front-end-editor' );

add_action( 'init', 'golf_schedule_create_post_type', 0 );
function golf_schedule_create_post_type() {
 $scheduleLabelName = 'Schedule';
 register_post_type( 'schedule', /* post-type */
 array(
   'labels' => array(
   'name' => $scheduleLabelName,
   'singular_name' => $scheduleLabelName
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
 // Add information category
 register_taxonomy(
   'schedule-cat',
   'schedule',
   array(
     'hierarchical' => true,
     'update_count_callback' => '_update_post_term_count',
     'label' => $scheduleLabelName._x(' category','admin menu'),
     'singular_label' => $scheduleLabelName._x(' category','admin menu'),
     'public' => true,
     'show_ui' => true,
   )
 );
}

/*-------------------------------------------*/
/*	Custom post type _ add result_ranking
/*-------------------------------------------*/
add_post_type_support( 'result_ranking', 'front-end-editor' );

add_action( 'init', 'golf_result_ranking_create_post_type', 0 );
function golf_result_ranking_create_post_type() {
 $result_rankingLabelName = 'Result ranking';
 register_post_type( 'result_ranking', /* post-type */
 array(
   'labels' => array(
   'name' => $result_rankingLabelName,
   'singular_name' => $result_rankingLabelName
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
 // Add information category
 register_taxonomy(
   'result_ranking-cat',
   'result_ranking',
   array(
     'hierarchical' => true,
     'update_count_callback' => '_update_post_term_count',
     'label' => $result_rankingLabelName._x(' category','admin menu'),
     'singular_label' => $result_rankingLabelName._x(' category','admin menu'),
     'public' => true,
     'show_ui' => true,
   )
 );
}

/*-------------------------------------------*/
/*	Custom post type _ add media
/*-------------------------------------------*/
add_post_type_support( 'media', 'front-end-editor' );

add_action( 'init', 'golf_media_create_post_type', 0 );
function golf_media_create_post_type() {
 $mediaLabelName = 'Media';
 register_post_type( 'media', /* post-type */
 array(
   'labels' => array(
   'name' => $mediaLabelName,
   'singular_name' => $mediaLabelName
 ),
 'public' => true,
 'menu_position' =>5,
 'has_archive' => true,
 'supports' => array('title','editor','excerpt','thumbnail','author')
 )
 );
 // Add information category
 register_taxonomy(
   'media-cat',
   'media',
   array(
     'hierarchical' => true,
     'update_count_callback' => '_update_post_term_count',
     'label' => $mediaLabelName._x(' category','admin menu'),
     'singular_label' => $mediaLabelName._x(' category','admin menu'),
     'public' => true,
     'show_ui' => true,
   )
 );
}







 /*-------------------------------------------*/
 /*	Get CSS / JS assets
 /*-------------------------------------------*/
 function golf_getCssAssets() {
	 	 $filepath = glob("wp-content/themes/golf/css/app-v*.css");
		 $filename = basename($filepath[count($filepath) - 1]).PHP_EOL;
	 	 echo $filename;

 }

 function golf_getJsAssets() {
		$filepath = glob("wp-content/themes/golf/js/min/app-v*.js");
		$filename = basename($filepath[count($filepath) - 1]).PHP_EOL;
		echo $filename;
 }


 /*
  * Get file size
  */
 function golf_get_file_size($file){
 	$bytes = filesize($file);
 	$s = array('b', 'Kb', 'Mb', 'Gb');
 	$e = floor(log($bytes)/log(1024));
 	return sprintf('%.2f '.$s[$e], ($bytes/pow(1024, floor($e))));
 }




  /*-------------------------------------------*/
  /*	Global navigation add cptions
  /*-------------------------------------------*/
  class nav_walker extends Walker_Nav_Menu {

 	  function start_lvl( &$output, $depth = 0, $args = array() ) {
 	      $output .= "\n<ul class=\"nav--submenu menu\">\n";
 	  }

  	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
  		global $wp_query;
  		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

  		$class_names = $value = '';

  		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

  		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
  		$class_names = ' class="'. esc_attr( $class_names ) . '"';
      // $class_names = in_array("current_page_item",$item->classes) ? ' active' : '';

      if( $depth == 0 ){
        $output .= $indent . '<li class="nav--menu--item '.esc_attr( $class_names ).'" id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
      } else {
        $output .= $indent . '<li class="nav--submenu--item '.esc_attr( $class_names ).'" id="submenu-item-'. $item->ID . '"' . $value . $class_names .'>';
      }


  		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
  		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
  		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
  		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

  		$description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

  		if($depth != 0) {
  			$description = $append = $prepend = "";
  		}

  		$item_output = $args->before;

      if( $depth == 0 ){
        $item_output .= '<a class="nav--menu--link" '. $attributes .'>';

        switch ($item->title) {
            case 'ホーム':
                $item_output .= '<svg class="nav--menu--icon icon-home"><use xlink:href="#icon-home"></use></svg>';
                break;
            case 'プロジェクト紹介':
                $item_output .= '<svg class="nav--menu--icon icon-project"><use xlink:href="#icon-project"></use></svg>';
                break;
            case '成年後見制度とは':
                $item_output .= '<svg class="nav--menu--icon icon-about"><use xlink:href="#icon-about"></use></svg>';
                break;
            case '市民後見人養成講座':
                $item_output .= '<svg class="nav--menu--icon icon-course"><use xlink:href="#icon-course"></use></svg>';
                break;
            case 'トピックス':
                $item_output .= '<svg class="nav--menu--icon icon-topics"><use xlink:href="#icon-topics"></use></svg>';
                break;
        }


      } else {
        $item_output .= '<a class="nav--submenu--link" '. $attributes .'>';
      }


  		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
  		$item_output .= $description.$args->link_after;
  		$item_output .= '</a>';
  		$item_output .= $args->after;

  		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  	}
  }
  /* end of walker navigation
  /*-------------------------------------------*/


  /*-------------------------------------------*/
  /*	Global footer sitemap
  /*-------------------------------------------*/
  class footer_walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        if( $depth == 1 ) {
          $output .= "\n<ul class=\"sitemap--submenu level_3 menu\">\n";
        }
        else {
          $output .= "\n<ul class=\"sitemap--submenu menu\">\n";
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      global $wp_query;
      $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

      $class_names = $value = '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;

      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
      $class_names = ' class="'. esc_attr( $class_names ) . '"';

      if( $depth == 0 ){
        $output .= $indent . '<li class="sitemap--menu--item" id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
      }
      else if( $depth == 1 ) {
        $output .= $indent . '<li class="sitemap--submenu--item clearfix" id="submenu-item-'. $item->ID . '"' . $value . $class_names .'>';
      }
      else {
        $output .= $indent . '<li class="sitemap--thirdmenu--item" id="submenu-item-'. $item->ID . '"' . $value . $class_names .'>';
      }


      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

      $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

      if($depth != 0) {
        $description = $append = $prepend = "";
      }

      $item_output = $args->before;

      if( $depth == 0 ){
        $item_output .= '<a class="sitemap--menu--link" '. $attributes .'>';
        $item_output .= '<svg class="sitemap--menu--icon icon-arrow_right"><use xlink:href="#icon-arrow_right"></use></svg>';
      } else {
        $item_output .= '<a class="sitemap--submenu--link" '. $attributes .'>';
      }


      $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
      $item_output .= $description.$args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;

      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
  }
  /* end of walker footer
  /*-------------------------------------------*/


 /*-------------------------------------------*/
 /*	Extends Walker_page for sidebar
 /* Check if the menu hhas children, if yes add the classes for accordion menu
 /*-------------------------------------------*/
  class Walker_aside_menu extends Walker_page {

  	public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
  		if ( $depth ) {
  			$indent = str_repeat( "\t", $depth );
  		} else {
  			$indent = '';
  		}

      if( $depth == 0 ){
        $css_class = array( 'page_item', 'aside--menu--item page-item-' . $page->ID );
      } else {
        $css_class = array( 'page_item', 'aside--submenu--item page-item-' . $page->ID );
      }


  		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
  			$css_class[] = 'page_item_has_children';
  		}

  		if ( ! empty( $current_page ) ) {
  			$_current_page = get_post( $current_page );
  			if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
  				$css_class[] = 'current_page_ancestor';
  			}
  			if ( $page->ID == $current_page ) {
  				$css_class[] = 'current_page_item';
  			} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
  				$css_class[] = 'current_page_parent';
  			}
  		} elseif ( $page->ID == get_option('page_for_posts') ) {
  			$css_class[] = 'current_page_parent';
  		}

  		$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
      if( $depth == 0 ){
        $css_class = 'aside--title';
      }

  		if ( '' === $page->post_title ) {
  			$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
  		}

  		$args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
  		$args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];

  		/*
  		 * Check if the menu hhas children, if yes add the classes for accordion menu
  		 */
  		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {

  			wp_cache_delete($page->ID, 'posts');
  			$mypost = WP_Post::get_instance($page->ID);
  			$title = $mypost->post_title;
  			$post_link = get_permalink( $page->ID );

  			$output .= $indent . sprintf(
  				'<li class="%s">
  					<a class="button button__medium expanded" href="%s">%s%s%s<svg class="icon_right icon-arrow_right"><use xlink:href="#icon-arrow_right"></use></svg></a>',
  				$css_classes,
  				$post_link,
  				$args['link_before'],
  				apply_filters( 'the_title', $title, $page->ID ),
  				$args['link_after']
  			);
  		}
  		else {
  			$mypost = WP_Post::get_instance($page->ID);
  			$title = $mypost->post_title;
  			$post_link = get_permalink( $page->ID );

        if( $depth > 0 ) {
          $output .= $indent . sprintf(
    				'<li class="%s">
            <a class="button button__medium expanded small" href="%s">%s%s%s</a>',
    				$css_classes,
    				$post_link,
    				$args['link_before'],
    				apply_filters( 'the_title', $title, $page->ID ),
    				$args['link_after']
    			);
        } else {
          $output .= $indent . sprintf(
    				'<li class="%s">
            <a class="button button__medium expanded" href="%s">%s%s%s<svg class="icon_right icon-arrow_right"><use xlink:href="#icon-arrow_right"></use></svg></a>',
    				$css_classes,
    				$post_link,
    				$args['link_before'],
    				apply_filters( 'the_title', $title, $page->ID ),
    				$args['link_after']
    			);
        }

  		}
  	}
  }

  class Walker_aside_menu_title extends Walker_page {

  	public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {

  			wp_cache_delete($page->ID, 'posts');
  			$mypost = WP_Post::get_instance($page->ID);
  			$title = $mypost->post_title;
  			$post_link = get_permalink( $page->ID );

  			$output .= $indent . sprintf(
  				'<h3 class="aside--title">
            <svg class="icon icon-'.$mypost->post_name.'"><use xlink:href="#icon-'.$mypost->post_name.'"></use></svg>
            <a class="aside--title--link" href="%s">%s%s%s</a>
          </h3>',
  				$post_link,
  				$args['link_before'],
  				apply_filters( 'the_title', $title, $page->ID ),
  				$args['link_after']
  			);
  	}
  }
  /* end of walker sidebar
  /*-------------------------------------------*/





/*-------------------------------------------*/
/* custom pagination
/*-------------------------------------------*/
function custom_pagination($max_num_pages = '', $range = 1) {
  $showitems = ($range * 2)+1;
  global $paged;
  if(empty($paged)) $paged = 1;

  if($max_num_pages == '') {
    global $wp_query;
    $max_num_pages = $wp_query->max_num_pages;
    if(!$max_num_pages) {
      $max_num_pages = 1;
    }
  }

  if(1 != $max_num_pages) {
    echo '<div class="paging">'."\n";

    // Prevリンク
    // 現在のページが２ページ目以降の場合
    if ($paged > 1) echo '<a class="prev_link" href="'.get_pagenum_link($paged - 1).'">＜ 前のページへ</a>'."\n";

    // 今のページからレンジを引いて2以上ある場合 && 最大表示アイテム数より最第ページ数が大きい場合
    // （レンジ数のすぐ次の場合は表示する）
    // 1...３４５
    if ( $paged-$range >= 2 && $max_num_pages > $showitems ) echo '<a href="'.get_pagenum_link(1).'">1</a>'."\n";
    // 今のページからレンジを引いて3以上ある場合 && 最大表示アイテム数より最第ページ数が大きい場合
    if ( $paged-$range >= 3 && $max_num_pages > $showitems ) echo '<span class="txt_hellip">&hellip;</span>'."\n";

    // レンジより前に追加する数
    $addPrevCount = $paged+$range-$max_num_pages;
    // レンジより後に追加する数
    $addNextCount = -($paged-1-$range); // 今のページ数を遡ってカウントするために-1
    // アイテムループ
    for ($i=1; $i <= $max_num_pages; $i++) {
      // 表示するアイテム
      if ($paged == $i) {
        $pageItem = '<span class="current">'.$i.'</span>'."\n";
      } else {
        $pageItem = '<a href="'.get_pagenum_link($i).'" class="inactive">'.$i.'</a>'."\n";
      }

      // 今のページからレンジを引いた数～今のページからレンジを足した数まで || 最大ページ数が最大表示アイテム数以下の場合
      if ( ( $paged-$range <= $i && $i<= $paged+$range ) || $max_num_pages <= $showitems ) {
        echo $pageItem;
        // 今のページからレンジを引くと負数になる場合 && 今のページ+レンジ+負数をレンジに加算した数まで
      } else if ( $paged-1-$range < 0 && $paged+$range+$addNextCount >= $i ) {
        echo $pageItem;
        // 今のページからレンジを足すと　最後のページよりも大きくなる場合 && 今のページ+レンジ+負数をレンジに加算した数まで
      } else if ( $paged+$range > $max_num_pages && $paged-$range-$addPrevCount <= $i ) {
        echo $pageItem;
      }
    }

    // 現在のページにレンジを足しても最後のページ数より２以上小さい時 && 最大表示アイテム数より最第ページ数が大きい場合
    if ( $paged+$range <= $max_num_pages-2 && $max_num_pages > $showitems ) echo '<span class="txt_hellip">&hellip;</span>'."\n";
    if ( $paged+$range <= $max_num_pages-1 && $max_num_pages > $showitems ) echo '<a href="'.get_pagenum_link($max_num_pages).'">'.$max_num_pages.'</a>'."\n";
    // Nextリンク
    if ($paged < $max_num_pages) echo '<a class="next_link" href="'.get_pagenum_link($paged + 1).'">次のページへ ＞</a>'."\n";
    echo "</div>\n";
  }
}
/* end of custom pagination
/*-------------------------------------------*/



 /*-------------------------------------------*/
 /* Custom functions
 /*-------------------------------------------*/
 /*
  * Get Japanese days
  */
 function golf_get_ja_day($arg) {
 	switch ($arg) {
     case 'Mon':
         $arg_ja = '月';
         break;
     case 'Tue':
         $arg_ja = '火';
         break;
     case 'Wed':
         $arg_ja = '水';
         break;
 		case 'Thu':
         $arg_ja = '木';
         break;
     case 'Fri':
         $arg_ja = '金';
         break;
     case 'Sat':
         $arg_ja = '土';
         break;
 		case 'Sun':
         $arg_ja = '日';
         break;
 	}
 	return $arg_ja;
 }


/*
 * Get ID by slug
 */
 function get_id_by_slug($page_slug) {
 	$page = get_page_by_path($page_slug);
 	if ($page) {
 		return $page->ID;
 	} else {
 		return null;
 	}
 }
 /* end of custom functions */
 /*-------------------------------------------*/

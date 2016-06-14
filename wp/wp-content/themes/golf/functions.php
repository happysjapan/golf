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






 /*-------------------------------------------*/
 /* custom pagination
 /*-------------------------------------------*/
 function custom_pagination($max_num_pages = '', $range = 1) {
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($max_num_pages == '') {
         global $wp_query;
         // 最後のページ
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



 /*-------------------------------------------*/
 /*	Custom Breadcrumb
 /*-------------------------------------------*/
  function custom_breadcrumbs() {

      // Settings
      $breadcrums_id      = 'breadcrumbs';
      $breadcrums_class   = 'breadcrumbs';
      $home_title         = 'Home';

      // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
      // $custom_taxonomy    = 'product_cat';

      // Get the query & post information
      global $post;

      // Do not display on the Home
      if ( !is_front_page() ) {

          // Build the breadcrums
          echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

          // Home page
          echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '"><svg class="icon icon-home"><use xlink:href="#icon-home"></use></svg></a></li>';

          if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

              echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

          } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

              // If post is a custom post type
              $post_type = get_post_type();

              // If it is a custom post type display name and link
 						 if($post_type == 'post') {
                $post_type_object = get_post_type_object($post_type);

							  $post_type_archive_label = "整骨院・接骨院・整体・鍼灸院";
								$post_type_archive_link = get_category_link(get_category_by_slug('clinic')->term_id);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive_link . '" title="' . $post_type_archive_label . '">' . $post_type_archive_label . '</a></li>';
              }

              $custom_tax_name = get_queried_object()->name;
              echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

          } else if ( is_single() ) {

              // If post is a custom post type
              $post_type = get_post_type();

							if($post_type == 'post') {
								// $post_type_object = get_post_type_object($post_type);
								// $post_type_archive_label = "整骨院・接骨院・整体・鍼灸院";
								// $post_type_archive_link = get_category_link(get_category_by_slug('clinic')->term_id);
								//
								// echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive_link . '" title="' . $post_type_archive_label . '">' . $post_type_archive_label . '</a></li>';
							}
							else {
								$post_type_object = get_post_type_object($post_type);
								$post_type_archive_label = $post_type_object->label;
								$post_type_archive_link = get_post_type_archive_link( $post_type );
								echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive_link . '" title="' . $post_type_archive_label . '">' . $post_type_archive_label . '</a></li>';
							}

              // Get post category info
              $category = get_the_category();

              if(!empty($category)) {

                  // Get last category post is in
                  $last_category = end(array_values($category));

                  // Get parent any categories and create array
                  $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                  $cat_parents = explode(',',$get_cat_parents);

                  // Loop through parent categories and store in variable $cat_display
                  $cat_display = '';
                 //  foreach($cat_parents as $parents) {
 								// 	 $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                 //  }
 								 $cat_display .= '<li class="item-cat">'.$cat_parents[0].'</li>';

              }

              // If it's a custom post type within a custom taxonomy
              $taxonomy_exists = taxonomy_exists($custom_taxonomy);
              if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                  $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                  $cat_id         = $taxonomy_terms[0]->term_id;
                  $cat_nicename   = $taxonomy_terms[0]->slug;
                  $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                  $cat_name       = $taxonomy_terms[0]->name;

              }

              // Check if the post is in a category
              if(!empty($last_category)) {
                  echo $cat_display;
                  echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

              // Else if post is in a custom taxonomy
              } else if(!empty($cat_id)) {

                  echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                  echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

              } else {

                  echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

              }

          } else if ( is_category() ) {

              // Category page
              echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

          } else if ( is_page() ) {

              // Standard page
              if( $post->post_parent ){

                  // If child page, get parents
                  $anc = get_post_ancestors( $post->ID );

                  // Get parents in the right order
                  $anc = array_reverse($anc);

                  // Parent page loop
                  foreach ( $anc as $ancestor ) {
                      $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                  }

                  // Display parent pages
                  echo $parents;

                  // Current page
                  echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

              } else {

                  // Just display current page if not parents
                  echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

              }

          } else if ( is_tag() ) {
              // Tag page
              // Get tag information
              $term_id        = get_query_var('tag_id');
              $taxonomy       = 'post_tag';
              $args           = 'include=' . $term_id;
              $terms          = get_terms( $taxonomy, $args );
              $get_term_id    = $terms[0]->term_id;
              $get_term_slug  = $terms[0]->slug;
              $get_term_name  = $terms[0]->name;

              // Display the tag name
              echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

          } elseif ( is_day() ) {
              // Day archive

              // Year link
              echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

              // Month link
              echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';

              // Day display
              echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

          } else if ( is_month() ) {

              // Month Archive

              // Year link
              echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

              // Month display
              echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

          } else if ( is_year() ) {

              // Display year archive
              echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

          } else if ( is_author() ) {

              // Auhor archive

              // Get the author information
              global $author;
              $userdata = get_userdata( $author );

              // Display author name
              echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

          } else if ( get_query_var('paged') && !is_search() ) {

              // Paginated archives
              echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

          } else if ( is_search() ) {

              // Search results page
              echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="検索結果: ' . get_search_query() . '">検索結果: ' . get_search_query() . '</strong></li>';

          } elseif ( is_404() ) {

              // 404 page
              echo '<li>' . 'Error 404' . '</li>';
          }
          echo '</ul>';
      }
  }

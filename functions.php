<?php
	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'hbd-theme', TEMPLATEPATH . '/languages' );

	// Hooking up our function to theme setup
	add_action( 'init', 'create_posttype' );

	add_action( 'admin_init', 'remove_dashboard_meta' );

	add_action('admin_head', 'my_custom_css');

	add_action( 'init', 'theme_widgets_init' );

	add_action( 'init', 'my_custom_init' );

	add_filter( 'enter_title_here', 'wpb_change_title_text' );
	
	add_filter( 'enter_title_here', 'wpb_change_title_text_lost_pets' );
	
	add_action( 'login_enqueue_scripts', 'my_login_logo' );

	add_action( 'pre_get_posts', 'five_posts_on_homepage' );

	add_theme_support( 'menus' );

	if ( function_exists( 'add_theme_support' ) ) { 
		add_theme_support( 'post-thumbnails' ); 
	}

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable($locale_file) )
	    require_once($locale_file);

	// hides Prairie Outdoorsman posts from home page
	function five_posts_on_homepage( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
	        $query->set( 'cat', -5 );
	    }
	}

	function enqueue_my_scripts_and_styles(){

		wp_register_style('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', array(), '1');
		wp_register_style('custom-style', get_template_directory_uri() . '/styles/style.css', array('bootstrap'), '1');

		wp_deregister_script( 'jquery' );
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), '2.1.3', true);
		wp_register_script('map', 'http://maps.googleapis.com/maps/api/js?sensor=false', array(), '1', true);
		wp_register_script('bootstrap-javascript','//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js',array('jquery'), '1', true);
	    wp_register_script( 'dropit', get_template_directory_uri() . '/js/dropit.js', array('jquery'), '1', true);
	    wp_register_script( 'custom-script', get_template_directory_uri() . '/js/scripts.js', array('jquery','dropit','bootstrap-javascript'), '1', true);

	    // Enqueue my custom script, which depends on jQuery, which means jQuery is automatically loaded as well. 
	    wp_enqueue_script( 'custom-script' );
	    wp_enqueue_script( 'dropit' );
	    wp_enqueue_script('bootstrap-javascript');

	    // Enqueue custom styles
	    wp_enqueue_style('custom-style');
	}

	add_action( 'wp_enqueue_scripts', 'enqueue_my_scripts_and_styles' );

	// Get the page number
	function get_page_number() {
	    if ( get_query_var('paged') ) {
	        print ' | ' . __( 'Page ' , 'hbd-theme') . get_query_var('paged');
	    }
	} // end get_page_number

	// Custom callback to list comments in the hbd-theme style
	function custom_comments($comment, $args, $depth) {
	  $GLOBALS['comment'] = $comment;
	    $GLOBALS['comment_depth'] = $depth;
	  ?>
	    <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	        <div class="comment-author vcard"><?php commenter_link() ?></div>
	        <div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'hbd-theme'),
	                    get_comment_date(),
	                    get_comment_time(),
	                    '#comment-' . get_comment_ID() );
	                    edit_comment_link(__('Edit', 'hbd-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	  <?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'hbd-theme') ?>
	          <div class="comment-content">
	            <?php comment_text() ?>
	        </div>
	        <?php // echo the comment reply link
	            if($args['type'] == 'all' || get_comment_type() == 'comment') :
	                comment_reply_link(array_merge($args, array(
	                    'reply_text' => __('Reply','hbd-theme'),
	                    'login_text' => __('Log in to reply.','hbd-theme'),
	                    'depth' => $depth,
	                    'before' => '<div class="comment-reply-link">',
	                    'after' => '</div>'
	                )));
	            endif;
	        ?>
	<?php } // end custom_comments
	
	// Custom callback to list pings
	function custom_pings($comment, $args, $depth) {
	       $GLOBALS['comment'] = $comment;
	        ?>
	            <li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	                <div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'hbd-theme'),
	                        get_comment_author_link(),
	                        get_comment_date(),
	                        get_comment_time() );
	                        edit_comment_link(__('Edit', 'hbd-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	    <?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'hbd-theme') ?>
	            <div class="comment-content">
	                <?php comment_text() ?>
	            </div>
		<?php 
	} // end custom_pings
	
	// Produces an avatar image with the hCard-compliant photo class
	function commenter_link() {
	    $commenter = get_comment_author_link();
	    if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
	        $commenter = ereg_replace( '(<a[^>]* class=[\'"]?)', '\\1url ' , $commenter );
	    } else {
	        $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );
	    }
	    $avatar_email = get_comment_author_email();
	    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
	    echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
	} // end commenter_link
	
	// For category lists on category archives: Returns other categories except the current one (redundant)
	function cats_meow($glue) {
	    $current_cat = single_cat_title( '', false );
	    $separator = "\n";
	    $cats = explode( $separator, get_the_category_list($separator) );
	    foreach ( $cats as $i => $str ) {
	        if ( strstr( $str, ">$current_cat<" ) ) {
	            unset($cats[$i]);
	            break;
	        }
	    }
	    if ( empty($cats) )
	        return false;

	    return trim(join( $glue, $cats ));
	} // end cats_meow
	
	// For tag lists on tag archives: Returns other tags except the current one (redundant)
	function tag_ur_it($glue) {
	    $current_tag = single_tag_title( '', '',  false );
	    $separator = "\n";
	    $tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	    foreach ( $tags as $i => $str ) {
	        if ( strstr( $str, ">$current_tag<" ) ) {
	            unset($tags[$i]);
	            break;
	        }
	    }
	    if ( empty($tags) )
	        return false;

	    return trim(join( $glue, $tags ));
	} // end tag_ur_it
	
	// Register widgetized areas
	function theme_widgets_init() {
	    // Area 1
	    register_sidebar( array (
	    'name' => 'Primary Widget Area',
	    'id' => 'primary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );

	    // Area 2
	    register_sidebar( array (
	    'name' => 'Secondary Widget Area',
	    'id' => 'secondary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );

	    // Area 2
	    register_sidebar( array (
	    'name' => 'Third Widget Area',
	    'id' => 'third_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );

	     // Area 2
	    register_sidebar( array (
	    'name' => 'Fourth Widget Area',
	    'id' => 'fourth_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );

	} // end theme_widgets_init
	
	$preset_widgets = array (
	    'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
	    'secondary_widget_area'  => array( 'links', 'meta' )
	);
	if ( isset( $_GET['activated'] ) ) {
	    update_option( 'sidebars_widgets', $preset_widgets );
	}
	// update_option( 'sidebars_widgets', NULL );
	
	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index ){
	  global $wp_registered_sidebars;

	  $widgetcolums = wp_get_sidebars_widgets();

	  if ($widgetcolums[$index]) return true;

	    return false;
	} // end is_sidebar_active

	// Customize excerpt length
	function my_excerpt_length($length) {
		return 40; // Or whatever you want the length to be.
	}

	add_filter('excerpt_length', 'my_excerpt_length');
	add_filter('widget_text', 'do_shortcode');

	function remove_dashboard_meta() {
        remove_meta_box( 'tribe_dashboard_widget', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	}

	// Our custom post type function
	function create_posttype() {

		register_post_type( 'announcements',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Weather Announcements' ),
					'singular_name' => __( 'Announcement' ),
					'add_new_item'       => __( 'Add New Weather Announcement', 'your-plugin-textdomain' ),
					'add_new' => __('Add New Announcement'),
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'announcements'),
			)
		);

		register_post_type( 'lost-pets',
		// CPT Options
			array(
				'labels' => array(
					'name' => __( 'Lost Pets' ),
					'singular_name' => __( 'Lost Pet' ),
					'add_new_item'       => __( 'Add Lost Pet', 'your-plugin-textdomain' ),
					'add_new' => __('Add Lost Pet'),
					'edit_item' => __( 'Name of the Pet' ),
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'lost-pets'),
			)
		);		
	}

	function my_custom_init() {
		remove_post_type_support( 'announcements', 'editor' );
		remove_post_type_support( 'lost-pets', 'editor' );
	}

	// hides editor on Weather Announcements Page
	add_action('init', 'remove_editor_init');

	function remove_editor_init() {

	    if (isset($_GET['post'])) {
	        $post_id = $_GET['post'];
	    } else if (isset($_POST['post_ID'])) {
	        $post_id = $_POST['post_ID'];
	    } else {
	        return;
	    }

	    $template_file = get_post_meta($post_id, '_wp_page_template', TRUE);

	    if ($template_file == 'lost-pets.php') {
	        remove_post_type_support('page', 'editor');
	    }
	}

	function change_default_title( $title ){
	     $screen = get_current_screen();
	 
	     if  ( '_your_custom_post_type_' == $screen->lost_pets ) {
	          $title = 'The new title';
	     }
	     return $title;
	}	

	function wpb_change_title_text( $title ){
	     $screen = get_current_screen();

	     if  ( 'announcements' == $screen->post_type ) {

	          $title = 'Enter A Description';
	     }
	     return $title;
	}

	function wpb_change_title_text_lost_pets( $title ){
	     $screen = get_current_screen();

	     if  ( 'lost-pets' == $screen->post_type ) {

	          $title = 'Type of Pet (Dog, Cat, German Shepherd, etc.)';
	     }
	     return $title;
	}

	function my_custom_css() {
	  echo "<style>
	    #post-body-content{
	  		margin-bottom: -18px;
		}
		#acf-date{
			width: 50%!important;
		}
		#acf-pet_description{
			width: 50%;
			margin-right:10%;
		}
		#acf-pet_picture{
			width: 30%;
		}
		#acf-school_list{
			padding-right: 4%;
			width: 45%;
		}
		#acf_166{
			margin-bottom: -10px;
		}
		.input-value{
    		width: 100%;
			float: right;
    	}
    	.stream-input label{
    		line-height: 30px;
    	}
		body.login div#login h1 a{
			background-image: url('http://www.marshallradio.net/wp-content/themes/marshallradio/img/logo.png');
		}
	  </style>";
	}
	
	function my_login_logo() { ?>
	
	    <style type="text/css">
	        body.login div#login h1 a {
	            background-image: url('http://www.marshallradio.net/wp-content/themes/marshallradio/img/logo-login.png')!important;
	            padding-bottom: 30px;
				width: 82%;
				background-size: contain;
	        }
			#loginform #wp-submit{
				background: rgb(63, 63, 63);
				border-color: black;
				-webkit-box-shadow: inset 0 1px 0 rgba(203, 203, 203, 0.5),0 1px 0 rgba(0,0,0,.15);
				box-shadow: inset 0 1px 0 rgba(231, 231, 231, 0.5),0 1px 0 rgba(0,0,0,.15);
			}
			 .login input:focus{
				border-color: rgba(169, 169, 169, 0.6);
				-webkit-box-shadow: 0 0 2px rgba(205, 205, 205, 0.8);
				box-shadow: 0 0 2px rgba(226, 226, 226, 0.8);
			}
	    </style>
	
	<?php }

?>

<!DOCTYPE html>
<html style="margin-top:0!important;"> 
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <title><?php bloginfo('title')?></title>
    
    <!-- favicons -->
    <link rel="icon" href="http://www.marshallradio.net/wp-content/themes/marshallradio/img/favicon.ico" type="/image/x-icon"/> <!--64x64px-->
    <link rel="icon" type="/image/png" href="http://www.marshallradio.net/wp-content/themes/marshallradio/img/favicon.png" sizes="196x196"/> <!--ANDROID DEVICES, 196x196px-->
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://www.marshallradio.net/wp-content/themes/marshallradio/img/apple-touch-icon.png"/> <!--APPLE DEVICES, 152x152px-->

    <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->   
    <?php wp_head()?>

</head>

<body>

<div id="mobile-menu">

  <?php 
    $defaults = array(
      'theme_location'  => '',
      'menu'            => '',
      'container'       => 'div',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'menu',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="nav-links">%3$s</ul>',
      'depth'           => 0,
      'walker'          => ''
      );
    wp_nav_menu($defaults); 
  ?>

</div>

<div class="wrapper">

    <nav>

      <div id="mobile-menu-toggle">
        Menu <i class="fa fa-bars"></i>
      </div>

      <div class="container">

          <div class="nav-logo">
              <a class="nav-brand" href="<?php echo get_home_url(); ?>">
                <img class="logo-img" src="<?php echo get_template_directory_uri();?>/img/logo.png">
              </a>
          </div>

          <?php 
            $defaults = array(
              'theme_location'  => '',
              'menu'            => '',
              'container'       => 'div',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'menu',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul class="nav-links">%3$s</ul>',
              'depth'           => 0,
              'walker'          => ''
              );
            wp_nav_menu($defaults); 
          ?>

      </div>

    </nav>

<?php if (is_home()): // if on the home page, load beefier header. ?>

    <div class="main-message">
        <div class="container main-message-holder">
          <div class="container">
            <span>Home of KKCK, KMHL, KARL, &AMP; KARZ</span>
          </div>
<!--           <h1>WELCOME TO MARSHALL RADIO</h1> -->
        </div>
        <div class="background"></div>
    </div>
    
    <div class="col-md-12 divider home"></div>

    <?php
      $count_posts = wp_count_posts('announcements');
      $numberOfAnnouncements = $count_posts->publish; 
    ?>

    <?php if ($numberOfAnnouncements > 0): ?>

    <div class="weather-bar">
      <div class="container weather-bar-container">
        <span>Weather Announcements</span>
        <a href="<?php get_site_url(); ?>/weather" target="_self"><span class="weather-bar-button">Click for Details</span></a>
      </div>
    </div>

    <?php endif ?>

    <div class="main-block-holder">
      <div class="container">
        <ul class="main-blocks">
            <li>
                <a href="/kmhlradioauction">
                  <i class="fa fa-money"></i>
                  <h2>Radio Auction</h2>
                </a>
                 <span>Check out the latest local deals.</span>
            </li>
            <li>
                <a href="/lostpets">
                  <i class="fa fa-paw"></i>
                  <h2>Lost Pets</h2>
                </a>
                <span>See our the most recent reported lost pets.</span>
            </li>
            <li>
                <a href="/calendar">
                  <i class="fa fa-calendar"></i>
                  <h2>Community Calendar</h2>
                </a>
                <span>Learn more about upcoming events.</span>
            </li>
            <li>
                <a href="http://1400kmhl.com/flea-market">
                  <i class="fa fa-users"></i>
                  <h2>Flea Market</h2>
                </a>
                <span>Head over to our KMHL site for more info.</span>
            </li>
        </ul>
      </div>
      <div class="arrow-block"></div>
    </div>

    <?php echo adrotate_group(2); ?>

<?php else: // if not the home page, load slimmer header ?>

  <?php // Gets current page, and displays appropriate banner image
        $page = $_SERVER['REQUEST_URI'];
          switch ($page) {
          case "/prairieoutdoorsman/":
            $bannerImage = "http://www.marshallradio.net/wp-content/themes/marshallradio/img/banner-field.jpg";
            break;
          case "/localnews/":
            $bannerImage = "http://www.marshallradio.net/wp-content/themes/marshallradio/img/banner-park.jpg";
            break;
          case "/localsports/":
            $bannerImage = "http://www.marshallradio.net/wp-content/themes/marshallradio/img/banner-football.jpg";
            break;
          default:
            $bannerImage = "http://www.marshallradio.net/wp-content/themes/marshallradio/img/banner-field.jpg";
        }
    ?>

    <div class="banner" style="background-image: url('<?php echo $bannerImage; ?>')"></div>

    <div class="col-md-12 divider page">
      <div class="container">

        <?php // Gets current page, and displays appropriate banner image
        $page = $_SERVER['REQUEST_URI'];
          switch ($page) {
          case "/prairieoutdoorsman/":
            $pageTitle = "Prairie Outdoorsman";
            break;
          case "/localnews/":
            $pageTitle = "Local News";
            break;
          case "/localsports/":
            $pageTitle = "Local Sports";
            break;
          case "/calendar/":
            $pageTitle = "Community Calendar";
            break;
          case "/lostpets/":
            $pageTitle = "Lost Pets";
            break;
          case "/kmhlradioauction/":
            $pageTitle = "KMHL Radio Auction";
            break;
          case "/weather/":
            $pageTitle = "Weather Announcements";
            break;
          default:
            $pageTitle = "";
        }
    ?>
          
      <?php
        $category = get_the_category();
        $firstCategory = $category[0]->cat_name;
      ?>

        <h1 class="page-title"><?php //echo $pageTitle; echo $firstCategory; ?></h1>
        <?php //get_search_form(); ?>
      </div>
    </div>

    <?php
        $count_posts = wp_count_posts('announcements');
        $numberOfAnnouncements = $count_posts->publish; 
    ?>
  
  <?php /* if an announcement exists and the user is NOT on the weather announcements page, show the banner */ ?>
  <?php if ($numberOfAnnouncements > 0 && $page != "/weather/"): ?>
  <div class="weather-bar weather-bar-page">
    <div class="weather-bar-container">
    <span>Weather Announcements</span>
    <a href="<?php get_site_url(); ?>/weather" target="_self"><span class="weather-bar-button">Click for Details</span></a>
    </div>
  </div>
  <?php endif ?>

<?php endif; // end if statement for header content ?>
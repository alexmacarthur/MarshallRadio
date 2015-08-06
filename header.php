<?php if (is_home()): 
  /*If on the home page, load the following header code. Or else, load the slimmer "page" header (header-page.php) */
?>

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

  <div class="wrapper">

  <div class="nav-area">


      <nav>
        <div class="container">

          <div class="row navbar-row">
            <div class="nav-logo">
                <a class="nav-brand" href="<?php echo get_home_url(); ?>"></a>
                <img class="logo-img" src="<?php echo get_template_directory_uri();?>/img/logo.png">
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

        </div>
      </nav>

      <div class="main-message">

        <div class="container main-message-holder">
          <h1>WELCOME TO MARSHALL RADIO</h1>
          <span>Home of KKCK, KMHL, KARL, &AMP; KARZ</span>

          <div class="background"></div>

      </div>
  </div>
      
      <div class="col-md-12 divider home">
          <div class="container">

          <?php get_search_form(); ?>

        </div>
      </div>

      <?php
        $count_posts = wp_count_posts('announcements');
        $numberOfAnnouncements = $count_posts->publish; 
      ?>

      <?php if ($numberOfAnnouncements > 0): ?>

        <div class="weather-bar">
          <div class="weather-bar-container">
            <span>Weather Announcements</span>
            <a href="<?php get_site_url(); ?>/weather" target="_self"><span class="weather-bar-button">Click for Details</span></a>
          </div>
        </div>

      <?php endif ?>

      <div class="main-block-holder">
        <ul class="main-blocks">
            <li>
                <a href="/kmhlradioauction"></a>
                <div class="block-icon auction-icon"></div>
                <div class="icon-text">
                  <h2>Radio Auction</h2>
                  <span>Check out the latest local deals.</span>
                </div>
            </li>
            <li>
                <a href="/lostpets"></a>
                <div class="block-icon lost-pets-icon"></div>
                <div class="icon-text">
                  <h2>Lost Pets</h2>
                  <span>See our the most recent reported lost pets.</span>
                </div>    
            </li>
            <li>
                <a href="/calendar"></a>
                <div class="block-icon calendar-icon"></div>
                <div class="icon-text">
                  <h2>Community Calendar</h2>
                  <span>Learn more about upcoming events.</span>
                </div>
            </li>
        </ul>
        <div class="arrow-block"></div>
      </div>
      <br>

      <?php echo adrotate_group(2); ?>

<?php else: ?>

  <?php get_header("page"); 
    /* Loads the slimmer header-page.php */
  ?>

<?php endif ?>



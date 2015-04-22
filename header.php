<?php if (is_home()): 
  /*If on the home page, load the following header code. Or else, load the slimmer "page" header (header-page.php) */
?>

  <!DOCTYPE html>
  <html style="margin-top:0!important;"> 
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title><?php bloginfo('title')?></title>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
      
      <!-- favicons -->
      <link rel="icon" href="http://www.marshallradio.net/wp-content/themes/marshallradio/img/favicon.ico" type="/image/x-icon"/> <!--64x64px-->
      <link rel="icon" type="/image/png" href="http://www.marshallradio.net/wp-content/themes/marshallradio/img/favicon.png" sizes="196x196"/> <!--ANDROID DEVICES, 196x196px-->
      <link rel="apple-touch-icon-precomposed" sizes="152x152" href="http://www.marshallradio.net/wp-content/themes/marshallradio/img/apple-touch-icon.png"/> <!--APPLE DEVICES, 152x152px-->
  
      <!-- map for weather widget -->
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

      <!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->   
      <?php wp_head()?>

  </head>

  <body>

  <div class="wrapper">
<!--       <div class="navbar navbar-default" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              
              <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
              <img class="logo" src="http://www.marshallradio.net/wp-content/themes/marshallradio/img/logo.png">

              </a>
              <div class="button-holder">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  </button>
              </div>
            </div>

            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/localnews/">Local News</a></li>
                <li><a href="http://www.marshallradio.net/localsports/">Local Sports</a></li>
                <li><a href="http://www.marshallradio.net/prairieoutdoorsman/">Praire Outdoorsman</a></li>
                <li class="dropdown" id="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Community</a>
                  <ul class="dropdown-menu" role="menu" id="dropdown-menu">
                      <img src="http://www.marshallradio.net/wp-content/themes/marshallradio/img/point.png">
                    <li><a href="http://www.marshallradio.net/calendar/">Calendar</a></li>
                    <li><a href="http://www.marshallradio.net/kmhlradioauction/">Radio Auction</a></li>
                    <li><a href="http://www.marshallradio.net/lostpets/">Lost Pets</a></li>
                  </ul>
                  <li class="mobile-only"><a href="http://www.marshallradio.net/calendar/">Calendar</a></li>
                  <li class="mobile-only"><a href="http://www.marshallradio.net/kmhlradioauction/">Radio Auction</a></li>
                  <li class="mobile-only"><a href="http://www.marshallradio.net/lostpets/">Lost Pets</a></li>
                </li>
              </ul>
            </div><!--/.nav-collapse -->

          </div><!--/.container-fluid -->
        </div><!--/.navbar --> 

      
        <nav>
          <div class="container">
            <button></button>
            <div class="nav-logo">
                <a class="nav-brand" href="<?php echo get_home_url(); ?>"></a>
                <img class="logo-img" src="http://www.marshallradio.net/wp-content/themes/marshallradio/img/logo.png">
            </div>

            <ul class="nav-links" id="nav-links">
              <li><a href="/localnews/">Local News</a></li> 
              <li><a href="http://www.marshallradio.net/localsports/">Local Sports</a></li>
              <li><a href="http://www.marshallradio.net/prairieoutdoorsman/">Praire Outdoorsman</a></li>         
              <li id="dropdown">
                <a>Community</a>
                <ul id="dropdown-list">
                  <img src="http://www.marshallradio.net/wp-content/themes/marshallradio/img/point.png">
                  <li><a href="http://www.marshallradio.net/calendar/">Calendar</a></li>
                  <li><a href="http://www.marshallradio.net/kmhlradioauction/">Radio Auction</a></li>
                  <li><a href="http://www.marshallradio.net/lostpets/">Lost Pets</a></li>
                </ul>
                <li class="mobile-only"><a href="http://www.marshallradio.net/calendar/">Calendar</a></li>
                <li class="mobile-only"><a href="http://www.marshallradio.net/kmhlradioauction/">Radio Auction</a></li>
                <li class="mobile-only"><a href="http://www.marshallradio.net/lostpets/">Lost Pets</a></li>
              </li> 
            </ul>
          </div>
        </nav>


<!--             <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="/localnews/">Local News</a></li>
                <li><a href="http://www.marshallradio.net/localsports/">Local Sports</a></li>
                <li><a href="http://www.marshallradio.net/prairieoutdoorsman/">Praire Outdoorsman</a></li>
                <li class="dropdown" id="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Community</a>
                  <ul class="dropdown-menu" role="menu" id="dropdown-menu">
                      <img src="http://www.marshallradio.net/wp-content/themes/marshallradio/img/point.png">
                    <li><a href="http://www.marshallradio.net/calendar/">Calendar</a></li>
                    <li><a href="http://www.marshallradio.net/kmhlradioauction/">Radio Auction</a></li>
                    <li><a href="http://www.marshallradio.net/lostpets/">Lost Pets</a></li>
                  </ul>

                  <li class="mobile-only"><a href="http://www.marshallradio.net/calendar/">Calendar</a></li>
                  <li class="mobile-only"><a href="http://www.marshallradio.net/kmhlradioauction/">Radio Auction</a></li>
                  <li class="mobile-only"><a href="http://www.marshallradio.net/lostpets/">Lost Pets</a></li>

                </li>
              </ul>
            </div>
          </div>
        </div> -->


      <div class="main-message">
        <div class="container main-message-holder">
          <h1>WELCOME TO MARSHALL RADIO</h1>
          <span>Home of KKCK, KMHL, KARL, &AMP; KARZ</span>
        </div>
        <div class="main-message-cover">
        </div>
      </div>
        <?php /* if( function_exists('cyclone_slider') ) cyclone_slider('home-slideshow'); */
        ?>

        <?php /* echo do_shortcode('[image-carousel]'); */ ?>

<!-- <div id="carousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
        <li data-target="#carousel" data-slide-to="2"></li>
    </ol>
    

    <div class="carousel-inner">
        
        <div class="item active" style="background:url('http://www.marshallradio.net/wp-content/themes/marshallradio/img/slide1.jpg') no-repeat; background-size: cover;">
            <div class="carousel-caption">
                  <h1>Weather-Related Announcements</h1>
                  <a href="#">Get them here!</a>
            </div>
        </div>

        <div class="item" style="background:url('http://www.marshallradio.net/wp-content/themes/marshallradio/img/banner-field.jpg') no-repeat; background-size: cover;">
            <div class="carousel-caption">
            </div>
        </div>

    </div> 

</div> -->

      <div class="col-md-12 divider home">
          <div class="container">
        <!-- <h1 class="page-title">Latest Posts</h1> -->

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



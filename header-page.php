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
    <div class="navbar navbar-default" role="navigation">
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
                <!--hidden subnav links-->
                <li class="mobile-only"><a href="http://www.marshallradio.net/calendar/">Calendar</a></li>
                <li class="mobile-only"><a href="http://www.marshallradio.net/kmhlradioauction/">Radio Auction</a></li>
              <li class="mobile-only"><a href="http://www.marshallradio.net/lostpets/">Lost Pets</a></li>
                <!--end hidden subnav links-->
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div><!--/.navbar -->

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

    <div class="banner" style="background-image: url('<?php echo $bannerImage; ?>')">
 
    </div><!--/.banner -->

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

      <h1 class="page-title"><?php echo $pageTitle; echo $firstCategory; ?></h1>
          <?php get_search_form(); ?>
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


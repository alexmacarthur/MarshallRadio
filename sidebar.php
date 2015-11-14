<div class="col-md-4 sidebar">

    <div class="widget-area search-widget-area">
        <ul class="widget-list">
           <?php get_search_form(); ?>
        </ul>
    </div>

	<?php echo do_shortcode("[simpleswitch_streams]"); ?>
	
    <!-- Weather Widget -->
    <?php if ( is_sidebar_active('primary_widget_area') ) : ?>
            <div id="primary" class="widget-area one">
                <ul class="widget-list">
                    <?php dynamic_sidebar('primary_widget_area'); ?>
                </ul>
            </div><!-- #primary .widget-area -->
    <?php endif; ?>  


    <!-- Latest Tweets -->
    <?php if ( is_sidebar_active('secondary_widget_area') ) : ?>
            <div id="secondary" class="widget-area two">
                <ul class="widget-list">
                    <?php dynamic_sidebar('secondary_widget_area'); ?>
                </ul>
                <!-- <div class="tweetButtonHolder">
                    <a class="btn btn-lg btn-primary tweet-button" href="https://twitter.com/Marshall_Radio" role="button">Follow @Marshall_Radio</a>     
                </div>  -->       
               
            </div><!-- #secondary .widget-area -->
            
    <?php endif; ?>

    <!-- Category Widget -->
    <?php if ( is_sidebar_active('third_widget_area') ) : ?>
            <div id="secondary" class="widget-area three">
                <ul class="widget-list">
                    <?php dynamic_sidebar('third_widget_area'); ?>
                </ul>    
               
            </div><!-- #secondary .widget-area -->
            
    <?php endif; ?>

    <?php if ( is_sidebar_active('fourth_widget_area') ) : ?>
            <div id="secondary" class="widget-area four">
                <ul class="widget-list">
                    <?php dynamic_sidebar('fourth_widget_area'); ?>
                </ul>    
               
            </div><!-- #secondary .widget-area -->
            
    <?php endif; ?>

</div>
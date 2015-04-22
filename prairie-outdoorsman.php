<?php
/*
 * Template Name: Prairie Outdoorsman
 * Description: The page where the most recent prairie outdoorsman post is shown.
 */
?>

<?php get_header(); ?>
 
<div class="container">

    <div class="row">
        <div class="col-md-8 content">

			<?php the_post(); ?>
			            <div id="post-<?php the_ID(); ?>" class="col-md-12 entry single">
			                <!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
			            <div class="entry-content single">
			<?php the_content(); ?>

            <?php $cat_id = 5; //the certain category ID
			$latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
			if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post(); ?>
			
			<h1 class="latest-episode" id="latest-episode"><?php the_title(); ?></h1>
			<br>

			<?php the_content(); ?>

			<?php endwhile; endif; ?>

			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
			<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
                </div><!-- .entry-content -->
            </div><!-- #post-<?php the_ID(); ?> -->           
     
    <?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>            
                </div><!-- #content -->
    			<?php get_sidebar(); ?>
    </div>
</div><!-- #container -->
 
<?php get_footer(); ?>
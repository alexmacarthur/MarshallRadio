<?php
/*
 * Template Name: Lost Pets
 * Description: The page that will show the lost pets.
 */
?>

<?php get_header(); ?>
 
<div class="container">

    <div class="row">
        <div class="col-md-8 content">


			<?php the_post(); ?>

			            <div class="entry-content single announcements">
			<?php /* the_content();*/ ?>

			<?php 
			    query_posts(array( 
			        'post_type' => 'lost-pets',
			        'showposts' => 10 
			    ) );  
			?>

			<?php while (have_posts()) : the_post(); ?>
				<div class="entry lost-pet" <?php if(!get_field('pet_picture')){echo "style='height:auto;'";} ?>>

					<?php if( get_field('pet_picture') ): ?>

						<div class="col-md-4 pet-picture">
							<img src="<?php the_field("pet_picture"); ?>">
						</div>

					<?php endif; ?>

					<div class="<?php if(get_field('pet_picture')){echo 'col-md-8';}else{echo 'col-md-12';}?> pet-info">
						<h1><?php echo get_the_title(); ?></h1>
						<span>Reported on <?php the_time( get_option( 'date_format' ) ); ?></span>
						<hr>
						<p><?php the_field("pet_description"); ?></p>
					</div>

				</div>

			<?php endwhile;?>
     
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
			<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
                </div><!-- .entry-content -->          
     
    <?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>            
                </div><!-- #content -->
    			<?php get_sidebar(); ?>
    </div>
</div><!-- #container -->
 
<?php get_footer(); ?>
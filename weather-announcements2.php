<?php
/*
 * Template Name: Weather-Related Announcements TEST
 * Description: This is a test template for weather announcements.
 */
?>

<?php get_header(); ?>
 
<div class="container">

    <div class="row">
        <div class="col-md-8 content weather-content">


			<?php the_post(); ?>

			<div class="entry-content weather-entry-content">
			<p><?php  the_content(); ?></p>

			<?php 
			    query_posts(array( 
			        'post_type' => 'announcements',
			        'showposts' => 500, 
					'orderby' => 'title',
					'order' => 'ASC'
			    ) );  
			?>

			<div class="entry weather-entry">
				<h2 style="text-align: center; color: #1a1a1a; font-weight: 800; text-transform: none;">School Announcements</h2>
				<table class="weather-table">
					<tbody>
						<tr>
							<th>School</th>
							<th>Description</th>
							<th>Date</th>
						</tr>

						<?php while (have_posts()) : the_post(); ?>
						
							<?php 
							/* if the entry is a school, list it here */
							if(get_field('school_list') != "Other"): 
							?>
							
								<tr>
									<td>
									
									<?php 
										if(get_field('school_list') == "Other"){
											the_field('other_value');
										} else {
											the_field('school_list');
										}
									?>								
									
									</td>
									<td><?php the_field('weather_description'); ?></td>
									<td><?php the_field('date'); ?></td>
								</tr>
								
							<?php endif; ?>
							
						<?php endwhile;?>
					</tbody>
				</table>
				<hr style="border: 2px dashed rgba(142, 140, 140, 0.85); width: 75%;">
				<h2 style="text-align: center; color: #1a1a1a; font-weight: 800; text-transform: none;">Other Announcements</h2>
				<table class="weather-table">
					<tbody>
						<tr>
							<th>Event or Other</th>
							<th>Description</th>
							<th>Date</th>
						</tr>

						<?php while (have_posts()) : the_post(); ?>
						
							<?php 
							/* if the entry is not a school, list it here */
							if(get_field('school_list') == "Other"): 
							?>
							
								<tr>
									<td>
									
									<?php 
										if(get_field('school_list') == "Other"){
											the_field('other_value');
										} else {
											the_field('school_list');
										}
									?>								
									
									</td>
									<td><?php the_field('weather_description'); ?></td>
									<td><?php the_field('date'); ?></td>
								</tr>
								
							<?php endif; ?>
							
						<?php endwhile;?>
					</tbody>
				</table>					
			</div>
     
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'your-theme' ) . '&after=</div>') ?>
			<?php edit_post_link( __( 'Edit', 'your-theme' ), '<span class="edit-link">', '</span>' ) ?>
                </div><!-- .entry-content -->          
     
    <?php if ( get_post_custom_values('comments') ) comments_template() // Add a custom field with Name and Value of "comments" to enable comments on this page ?>            
                </div><!-- #content -->
    			<?php get_sidebar(); ?>
    </div>
</div><!-- #container -->
 
<?php get_footer(); ?>
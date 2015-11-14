<?php get_header(); ?>
<div class="container main">
<div class="row alert-banner">
	
</div>
<div class="row">

    <div class="col-md-8 content">

		<?php /* Top post navigation */ ?>
		<?php global $wp_query; 
		$total_pages = $wp_query->max_num_pages; 
		if ( $total_pages > 1 ) { ?>

		<?php } ?>

		<?php while ( have_posts() ) : the_post() ?>		

						<?php /* Sets the featured image as the background image. */ ?>						
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
						$image = $image[0]; ?>
						<?php endif; ?>

		<?php /* Create a div with a unique ID thanks to the_ID() and semantic classes with post_class() */ ?>
						<div id="post-<?php the_ID(); ?>" class="col-md-12 entry">
		                <a class="moretag" href="<?php the_permalink();?>">Read More</a>
		<?php /* an h2 title */ ?>
		                    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'hbd-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a><aside></aside></h1>


		<?php /* Microformatted, translatable post meta */ ?>
		                    <div class="entry-meta">
		                        <span class="meta-prep meta-prep-author"><?php _e('By ', 'hbd-theme'); ?></span>
		                        <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'hbd-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
		                        <span class="meta-sep"> | </span>
		                        <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'hbd-theme'); ?></span>
		                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
		                        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
		                    </div><!-- .entry-meta -->

		<?php /* The entry content */ ?>
		                    <div class="col-med-12 entry-content">

		<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'hbd-theme' )  ); ?>
		<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>

							<?php
		                    if ( has_post_thumbnail() ) {
   								$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
     							//echo '<img src="' . $image_src[0]  . '" width="75%"  />';
								} 
							?>

		                    </div><!-- .entry-content -->

		            
		<?php /* Microformatted category and tag links along with a comments link */ ?>
		                    <div class="entry-utility">
		                        <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'hbd-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
		                        <span class="meta-sep"> | </span>
		                        <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'hbd-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
		                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'hbd-theme' ), __( '1 Comment', 'hbd-theme' ), __( '% Comments', 'hbd-theme' ) ) ?></span>
		                        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
		                    </div><!-- #entry-utility -->

		                    <?php 
		                    	$category = get_the_category();
		                    	$theCategory = $category[0]->cat_name;
		                    ?>

		                    <span class="post-date">Posted <?php echo the_time('F j, Y'); if($theCategory === "General" || $theCategory === 'Uncategorized'){echo "";}else{echo " in <span class='cat-name'>" . $category[0]->cat_name . "</span>";}?><span>

		                </div><!-- #post-<?php the_ID(); ?> --> <!--/entry-->
		                

		<?php /* Close up the post div and then end the loop with endwhile */ ?>      

		<?php endwhile; ?>
		
		<?php /* Bottom post navigation */ ?>

		<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		                <div id="nav-below" class="bottom-nav">
		                    <?php next_posts_link(__( 'Older posts', 'hbd-theme' )) ?>
		                    <?php previous_posts_link(__( 'Newer posts', 'hbd-theme' )) ?>
		                </div><!-- #nav-below -->
		<?php } ?>
		
		<?php echo adrotate_group(1); ?>
    </div><!-- .content -->

	<?php get_sidebar(); ?>
</div><!--/.row-->
</div><!-- .container -->
 
<?php get_footer(); ?>
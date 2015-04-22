<?php get_header(); ?>
 
    <div class="container">

<?php if ( have_posts() ) : ?>

    <div class="row">

				<h1 class="page-title"><?php _e( 'Search Results for: ', 'hbd-theme' ); ?><span>"<?php the_search_query(); ?></span>"</h1>

    </div>

        <div class="row">
            <div class="col-md-8 content">

				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		
				<?php } ?>                            

				<?php while ( have_posts() ) : the_post() ?>

				                <div id="post-<?php the_ID(); ?>" class="col-md-12 entry search">
				                    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Permalink to %s', 'hbd-theme'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

				<?php if ( $post->post_type == 'post' ) { ?>
				                    <div class="entry-meta">
				                        <span class="meta-prep meta-prep-author"><?php _e('By ', 'hbd-theme'); ?></span>
				                        <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'hbd-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
				                        <span class="meta-sep"> | </span>
				                        <span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'hbd-theme'); ?></span>
				                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
				                        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
				                    </div><!-- .entry-meta -->
				<?php } ?>

				                    <div class="entry-summary">
				<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'hbd-theme' )  ); ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
				                    </div><!-- .entry-summary -->

				<?php if ( $post->post_type == 'post' ) { ?>
				                    <div class="entry-utility">
				                        <span class="cat-links"><span class="entry-utility-prep entry-utility-prep-cat-links"><?php _e( 'Posted in ', 'hbd-theme' ); ?></span><?php echo get_the_category_list(', '); ?></span>
				                        <span class="meta-sep"> | </span>
				                        <?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'hbd-theme' ) . '</span>', ", ", "</span>\n\t\t\t\t\t\t<span class=\"meta-sep\">|</span>\n" ) ?>
				                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'hbd-theme' ), __( '1 Comment', 'hbd-theme' ), __( '% Comments', 'hbd-theme' ) ) ?></span>
				                        <?php edit_post_link( __( 'Edit', 'hbd-theme' ), "<span class=\"meta-sep\">|</span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?>
				                    </div><!-- #entry-utility -->
				<?php } ?>
				                </div><!-- #post-<?php the_ID(); ?> -->

				<?php endwhile; ?>

				<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				                <div class="bottom-nav">
				                    <?php next_posts_link(__( 'Older posts', 'hbd-theme' )) ?>
				                    <?php previous_posts_link(__( 'Newer posts', 'hbd-theme' )) ?>
				                </div><!-- #nav-below -->
				<?php } ?>                      
 
            </div><!-- #content -->

            <?php else : ?>

    <div class="row">

    </div>
	
	<div class="col-md-8 content">
			<div id="post-0" class="col-md-12 entry search">
			                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'hbd-theme' ) ?></h1>
			                    <div class="entry-content">
			                        <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'hbd-theme' ); ?></p>
    					</div><!-- .entry-content -->
			</div>
	</div>


				               
			<?php endif; ?> 


			<?php get_sidebar(); ?>
		</div>
    </div><!-- #container -->
 
<?php get_footer(); ?>
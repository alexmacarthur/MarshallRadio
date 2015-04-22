<!-- single post -->
<?php get_header(); ?>
 
        <div class="container">

        	<div class="row">

	            <div class="col-md-8 content">

					<?php the_post(); ?>

	                <div id="post-<?php the_ID(); ?>" class="col-md-12 entry single">

						<h1 class="entry-title"><?php the_title(); ?></h1>
						
						<?php /* Microformatted, translatable post meta */ ?>
		                    <div class="entry-meta single">
		                        <span class="meta-prep meta-prep-author"><?php _e('', 'hbd-theme'); ?></span>
		                        <span class="author vcard"><a class="url fn n" href="<?php echo get_author_link( false, $authordata->ID, $authordata->user_nicename ); ?>" title="<?php printf( __( 'View all posts by %s', 'hbd-theme' ), $authordata->display_name ); ?>"><?php the_author(); ?> me</a></span>
		                        <span class="meta-sep"></span>
		                        <span class="meta-prep meta-prep-entry-date"><?php _e('', 'hbd-theme'); ?></span>
		                        <span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
		                     
		                     
		                    </div><!-- end .entry-meta -->

						<div class="entry-content single">
							<?php the_content(); ?>
							<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'hbd-theme' ) . '&after=</div>') ?>
						</div>	

						<div class="entry-utility">
						                    <?php printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'hbd-theme' ),
						                        get_the_category_list(', '),
						                        get_the_tag_list( __( ' and tagged ', 'hbd-theme' ), ', ', '' ),
						                        get_permalink(),
						                        the_title_attribute('echo=0'),
						                        comments_rss() ) ?>

						<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
						                        <?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'hbd-theme' ), get_trackback_url() ) ?>
						<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
						                        <?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'hbd-theme' ), get_trackback_url() ) ?>
						<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
						                        <?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'hbd-theme' ) ?>
						<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
						                        <?php _e( 'Both comments and trackbacks are currently closed.', 'hbd-theme' ) ?>
						<?php endif; ?>
						<?php edit_post_link( __( 'Edit', 'hbd-theme' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
						</div>
	                </div><!-- #post-<?php the_ID(); ?> -->           
            		
            		<?php /* comments switch */
            		if(get_field('comments_switch') == 1){
            			comments_template('', true); 
            			}
            		?>

	            </div><!-- .content -->

	            <?php get_sidebar(); ?>

	        </div><!-- .row -->

        </div><!-- .container -->

<?php get_footer(); ?>
<?php /* The Comments Template — with, er, comments! */ ?>
            <div class="comments">
<?php /* Run some checks for bots and password protected posts */ ?>
<?php
    $req = get_option('require_name_email'); // Checks if fields are required.
    if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
        die ( 'Please do not load this page directly. Thanks!' );
    if ( ! empty($post->post_password) ) :
        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
                <div class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'hbd-theme') ?></div>
            </div><!-- .comments -->
<?php
        return;
    endif;
endif;
?>
 
<?php /* See IF there are comments and do the comments stuff! */ ?>
<?php if ( have_comments() ) : ?>
 
<?php /* Count the number of comments and trackbacks (or pings) */
$ping_count = $comment_count = 0;
foreach ( $comments as $comment )
    get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>
 
<?php /* IF there are comments, show the comments */ ?>
<?php if ( ! empty($comments_by_type['comment']) ) : ?>
 
                <div class="comments-list">
                    <h3><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'hbd-theme') : __('<span>One</span> Comment', 'hbd-theme'), $comment_count) ?></h3>
 
<?php /* If there are enough comments, build the comment navigation  */ ?>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
                    <div class="comments-nav-above">
                                <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </div><!-- #comments-nav-above -->
<?php endif; ?>                   
 
<?php /* An ordered list of our custom comments callback, custom_comments(), in functions.php   */ ?>
                    <ol>
<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
                    </ol>
 
<?php /* If there are enough comments, build the comment navigation */ ?>
<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
                <div class="comments-nav-below">
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
            </div><!-- #comments-nav-below -->
<?php endif; ?>                   
 
                </div><!-- #comments-list .comments -->
 
<?php endif; /* if ( $comment_count ) */ ?>
 
<?php /* If there are trackbacks(pings), show the trackbacks  */ ?>
<?php if ( ! empty($comments_by_type['pings']) ) : ?>
 
                <div class="trackbacks-list">
                    <h3><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'hbd-theme') : __('<span>One</span> Trackback', 'hbd-theme'), $ping_count) ?></h3>
 
<?php /* An ordered list of our custom trackbacks callback, custom_pings(), in functions.php   */ ?>
                    <ol>
<?php wp_list_comments('type=pings&callback=custom_pings'); ?>
                    </ol>             
 
                </div><!-- #trackbacks-list .comments -->           
 
<?php endif /* if ( $ping_count ) */ ?>
<?php endif /* if ( $comments ) */ ?>
 
<?php /* If comments are open, build the respond form */ ?>
<?php if ( 'open' == $post->comment_status ) : ?>
                <div class="respond">
                    <h3><?php comment_form_title( __('Post a Comment', 'hbd-theme'), __('Post a Reply to %s', 'hbd-theme') ); ?></h3>
 
                    <div class="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
 
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                    <p class="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'hbd-theme'),
                    get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>
 
<?php else : ?>
                    <div class="formcontainer">   
 
                        <form class="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
 
<?php if ( $user_ID ) : ?>
                            <p class="login"><?php printf(__('<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'hbd-theme'),
                                get_option('siteurl') . '/wp-admin/profile.php',
                                wp_specialchars($user_identity, true),
                                wp_logout_url(get_permalink()) ) ?></p>
 
<?php else : ?>
 
                            <p class="comment-notes"><?php _e('Your email is <em>never</em> published nor shared.', 'hbd-theme') ?> <?php if ($req) _e('Required fields are marked <span class="required">*</span>', 'hbd-theme') ?></p>
 
              <div class="form-section author">
                                <div class="form-label"><label for="author"><?php _e('Name', 'hbd-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'hbd-theme') ?></div>
                                <div class="form-input"><input id="author" name="author" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="20" tabindex="3" /></div>
              </div><!-- #form-section-author .form-section -->
 
              <div class="form-section email">
                                <div class="form-label"><label for="email"><?php _e('Email', 'hbd-theme') ?></label> <?php if ($req) _e('<span class="required">*</span>', 'hbd-theme') ?></div>
                                <div class="form-input"><input id="email" name="email" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>
              </div><!-- #form-section-email .form-section -->
 
              <div class="form-section url">
                                <div class="form-label"><label for="url"><?php _e('Website', 'hbd-theme') ?></label></div>
                                <div class="form-input"><input id="url" name="url" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
              </div><!-- #form-section-url .form-section -->
 
<?php endif /* if ( $user_ID ) */ ?>
 
              <div class="form-section comment">
                                <div class="form-label"><label for="comment"><?php _e('Comment', 'hbd-theme') ?></label></div>
                                <div class="form-textarea"><textarea id="comment" name="comment" cols="45" rows="8" tabindex="6"></textarea></div>
              </div><!-- #form-section-comment .form-section -->
 
              <div class="form-allowed tags">
                  <p><span><?php _e('You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'hbd-theme') ?></span> <strong><?php echo allowed_tags(); ?></strong></p>
              </div>
 
<?php do_action('comment_form', $post->ID); ?>
 
                            <div class="form-submit"><input class="grayButton" id="submit" name="submit" type="submit" value="<?php _e('Post Comment', 'hbd-theme') ?>" tabindex="7" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></div>
 
<?php comment_id_fields(); ?>  
 
<?php /* Just … end everything. We're done here. Close it up. */ ?>  
 
                        </form><!-- #commentform -->
                    </div><!-- .formcontainer -->
<?php endif /* if ( get_option('comment_registration') && !$user_ID ) */ ?>
                </div><!-- #respond -->
<?php endif /* if ( 'open' == $post->comment_status ) */ ?>
            </div><!-- #comments -->
<!-- WordPress comments -->
<div id="comments">

<?php if ( post_password_required() ) : ?>
			
	<!-- Notice message -->
	<span class="dayd_message dayd_notice"><?php _e('This post is password protected. Enter the password to view comments.', 'haku'); ?></span>

</div>
<!-- end: WordPress comments -->

<?php return; endif; ?>

<?php if ( have_comments() ) : ?>
	
	<!-- Comments title -->
	<h2 id="comments-title">
		<?php printf( _n('1 Response', '%1$s Responses', get_comments_number(), 'haku'), get_comments_number() ); ?>
	</h2>
	
	<!-- Comments list -->
	<ol class="commentlist">
	
		<?php wp_list_comments('type=comment&callback=daydream_comments'); ?>
		
	</ol>
	<!-- end: Comments list -->
	
	<?php if ( get_theme_option('post_trackbacks') ) : ?>
	
	<!-- Pings list -->
	<ul class="pinglist">
	
		<?php wp_list_comments('type=pings&callback=daydream_pings'); ?>
		
	</ul>
	<!-- end: Pings list -->
	
	<?php endif; ?>
	
	<?php if ( get_comment_pages_count() > 1 && get_option('page_comments') ) : ?>
	
	<!-- Pagination links container -->
	<div class="clearfix">
	
		<!-- Previous posts link -->
		<div id="dayd_pagination_prev">
			<?php previous_comments_link( __('Older Comments', 'haku') ); ?>
		</div>
		
		<!-- Next posts link -->
		<div id="dayd_pagination_next">
			<?php next_comments_link( __('Newer Comments', 'haku') ); ?>
		</div>
		
	</div>
	<!-- end: Pagination links container -->
	
	<?php endif; ?>
		
<?php endif; ?>
	
	<!-- Comment form -->
	<?php
	
	/*******************/
	/*   Comment form  */
	$form = array(
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'cancel_reply_link'=> __('or cancel reply', 'haku'),
		'fields' => apply_filters('comment_form_default_fields', array(
				'author' => '<p class="comment-form-author">' . '<label for="author">' . __('Name', 'haku') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" /></p>',
				'email' => '<p class="comment-form-email"><label for="email">' . __('Email', 'haku')  . ( $req ? ' <span class="required">*</span>' : '' ) . '</label>' . '<input id="email" name="email" data-tip-focus="' . esc_attr( __('Will not be published', 'haku') ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></p>',
				'url' => '<p class="comment-form-url"><label for="url">' . __('Website', 'haku') . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="http://" /></p>',
			)
		),
		'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Comment', 'haku') . '</label><textarea id="comment" name="comment" rows="12" placeholder="' . esc_attr( __('Be nice!', 'haku') ) . '"></textarea></p>',
	);
	
	comment_form( $form );
	
	?>
	
	<!-- end: Comment form -->

</div>
<!-- end: WordPress comments -->
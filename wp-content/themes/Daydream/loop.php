<!-- Post -->
<article <?php post_class('dayd_post clearfix'); ?> id="article_<?php the_ID(); ?>">
	
	<!-- Post meta -->
	<aside>
		
		<!-- Picture -->
		<a title="<?php printf( esc_attr__('Permanent link to %s', 'haku'), the_title_attribute('echo=0') ); ?>" href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) the_post_thumbnail('post-thumbnail', array('title' => '') ); ?></a>
		
		<?php if ( get_theme_option('post_author') ) : ?>
		
		<!-- Author, Date -->
		<span class="post_author">
			<?php _e('By', 'haku'); ?> <?php the_author_posts_link(); ?></a>
			<time datetime="<?php the_time(DATE_W3C); ?>"><?php the_time('F j, Y'); ?></time>
		</span>
		
		<?php endif; ?>
		
		<?php if ( get_theme_option('post_comments_count') ) : ?>
		
		<!-- Comments count -->
		<span class="post_comments">
			<?php comments_popup_link( __('No Comments', 'haku') , __('1 Comment', 'haku') , __('% Comments', 'haku') ); ?>
		</span>
		
		<?php endif; ?>
		
		<?php edit_post_link( __('Edit', 'haku'), '<span class="post_action">', '</span>' ); ?>
		
	</aside>
	<!-- end: Post meta -->
	
	<!-- Post content/excerpt -->
	<div>
		
		<!-- Post title -->
		<h2 class="post_title">
			<a title="<?php printf( esc_attr__('Permalink to %s', 'haku'), the_title_attribute('echo=0') ); ?>" href="<?php the_permalink(); ?>" rel="bookmark"><?php echo ( get_the_title() ? get_the_title() : get_the_time('F j') ); ?></a>
		</h2>
		
		<!-- Post content -->
		<?php the_content( __('Continue reading', 'haku') . ' &rarr;' ); ?>
		
		<?php if ( get_theme_option('post_category') || get_theme_option('post_facebook_share') || get_theme_option('post_twitter_share') || get_theme_option('post_google_share') ) : ?>
					
		<!-- Post footer -->
		<footer>
			
			<?php if ( get_theme_option('post_category') ) : ?>
			
			<!-- Post category -->
			<span class="post_cat"><?php _e('In', 'haku'); ?> <?php the_category(', '); ?></span>
			
			<?php endif; ?>
			
			<?php if ( get_theme_option('post_facebook_share') || get_theme_option('post_twitter_share') || get_theme_option('post_google_share') ) : ?>
			
			<!-- Post sharing -->
			<span class="post_share">
				
				<?php if ( get_theme_option('post_facebook_share') ) : ?>
				
				<!-- Facebook -->
				<div id="fb-root"></div>
				<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
				<fb:like href="<?php echo urlencode( get_permalink( $post->ID ) ); ?>" send="false" layout="button_count" width="77" show_faces="false" font="lucida grande"></fb:like>
				<!-- end: Facebook -->
				
				<?php endif; ?>
				
				<?php if ( get_theme_option('post_twitter_share') ) : ?>
				
				<!-- Twitter -->
				<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-count="horizontal">Tweet</a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
				<!-- end: Twitter -->
				
				<?php endif; ?>
				
				<?php if ( get_theme_option('post_google_share') ) : ?>
				
				<!-- Google -->
				<div class="google-share-button">
					<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
					<g:plusone size="medium" class="google-share-button" href="<?php the_permalink(); ?>"></g:plusone>
				</div>
				<!-- end: Google -->
				
				<?php endif; ?>
				
			</span>
			<!-- end: Post sharing -->
			
			<?php endif; ?>
			
		</footer>
		<!-- end: Post footer -->
		
		<?php endif; ?>
		
	</div>
	<!-- end: Post content -->
	
</article>
<!-- end: Post -->
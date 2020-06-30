<?php // footer bottom
	$cryptocurrency_exchange_fb_link_disable      			= 	get_theme_mod('cryptocurrency_exchange_fb_link_disable', '1');
	$cryptocurrency_exchange_facebook_url      				= 	get_theme_mod('cryptocurrency_exchange_facebook_url', '#');
	$cryptocurrency_exchange_tweet_link_disable   			= 	get_theme_mod('cryptocurrency_exchange_tweet_link_disable', '1');
	$cryptocurrency_exchange_twitter_url   					= 	get_theme_mod('cryptocurrency_exchange_twitter_url', '#');
	$cryptocurrency_exchange_insta_link_disable   			= 	get_theme_mod('cryptocurrency_exchange_insta_link_disable', '1');
	$cryptocurrency_exchange_instagram_url   				= 	get_theme_mod('cryptocurrency_exchange_instagram_url', '#');
	$cryptocurrency_exchange_youtube_link_disable 			= 	get_theme_mod('cryptocurrency_exchange_youtube_link_disable', '1');
	$cryptocurrency_exchange_youtube_url 					= 	get_theme_mod('cryptocurrency_exchange_youtube_url', '#');?>
<footer class="footer_bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<p class="copyright">&copy; <?php echo esc_html(date('Y')); ?> - <?php echo esc_html( get_bloginfo( 'name' ) ); ?> | 
					<?php esc_html_e('WordPress Theme By', 'cryptocurrency-exchange'); ?> <a href="https://awplife.com/" rel="nofollow"><?php esc_html_e('A WP Life', 'cryptocurrency-exchange'); ?></a> | 
					<?php esc_html_e('Powered by', 'cryptocurrency-exchange'); ?> <a href="https://wordpress.org"><?php esc_html_e('WordPress.org','cryptocurrency-exchange'); ?></a>
				</p>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="footer_social">
					<ul class="footer-social-links">
						<?php if($cryptocurrency_exchange_fb_link_disable != '1' && $cryptocurrency_exchange_facebook_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_facebook_url', '')); ?>"><span class="fa fa-facebook"></span></a></li><?php } ?>
						<?php if($cryptocurrency_exchange_tweet_link_disable != '1' && $cryptocurrency_exchange_twitter_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_twitter_url', '')); ?>"><span class="fa fa-twitter"></span></a></li><?php } ?>
						<?php if($cryptocurrency_exchange_insta_link_disable != '1' && $cryptocurrency_exchange_instagram_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_instagram_url', '')); ?>"><span class="fa fa-instagram"></span></a></li><?php } ?>
						<?php if($cryptocurrency_exchange_youtube_link_disable != '1' && $cryptocurrency_exchange_youtube_url != '') { ?><li><a href="<?php echo esc_url(get_theme_mod('cryptocurrency_exchange_youtube_url', '')); ?>"><span class="fa fa-youtube"></span></a></li><?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<div class="site-search-area">
	<form role="search" method="get" id="site-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div>
			<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e('Search...', 'cryptocurrency-exchange'); ?>"/>
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'cryptocurrency-exchange'); ?>" />
		</div>
	</form>
</div>
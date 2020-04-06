<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" value="<?php echo get_search_query(); ?>" placeholder="Search" name="s" id="s"/>
	<input type="submit" class="btn btn--search" id="searchsubmit" value=""/>
</form>
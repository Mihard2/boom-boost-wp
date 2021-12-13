

<!-- <form class="header__search">
	<input type="text" name="search-form" id="search-form" placeholder="I look for...">
	<input class="icons-main icons-main__searche" type="submit" value="">
</form> -->

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="header__search">
	<input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="I look for..."/>
	<input type="submit" class="icons-main icons-main__searche" id="searchsubmit" value="" />
</form>
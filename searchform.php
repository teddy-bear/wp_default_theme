<?
/**
 * Default search form output.
 */
?>
<form method="get" class="search-form" action="<?php bloginfo( 'home' ); ?>">
  <input type="search" class="search-field" value="<?php the_search_query(); ?>" name="s">
  <input type="submit" value="<?php //_e( 'Search', 'theme' ); ?>">
</form>
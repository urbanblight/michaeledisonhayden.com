<div id="menu">

<?php

$page_args = array('sort_order' => 'ASC',
	        'sort_column' => 'post_title'
            );

$pages=get_pages($page_args);
    foreach($pages as $page) {
        echo '<span class="menu_item"><a href="'.get_page_link( $page->ID )
             .'">'.strtoupper($page->post_title).'</a></span>';
    }

$cat_args=array('orderby' => 'name',
                'order' => 'ASC',
                'depth' => 1
                );

$categories=get_categories($args);

foreach($categories as $category) {
    if ($category->parent==0) {
        echo '<span class="menu_item"><a href=" '
             .get_category_link( $category->term_id ).'" title="'
             .sprintf( __( "View all posts in %s" ), $category->name )
             . '" ' . '>' . strtoupper ($category->name) . '</a></span>';
	}
   }
?>
    <div id="social">
    	<a href="https://twitter.com/MichaelEHayden" target="_blank"><img src="/wp-content/uploads/2016/12/twitter-logo.png" /></a>
    	<a href="https://www.facebook.com/michael.e.hayden.1" target="_blank"><img src="/wp-content/uploads/2016/12/facebook-logo.png" /></a>
    </div>
</div>

<div id="menu">
<?php
$args=array(
  'sort_order' => 'ASC',
	'sort_column' => 'post_title'
  );
$pages=get_pages($args);
  foreach($pages as $page) {
    echo '<a href="'.get_page_link( $page->ID ). '">' . strtoupper ($page->post_title) . '</a> ';
   }
$args=array(
  'orderby' => 'name',
  'order' => 'ASC',
  'depth' => 1
  );
$categories=get_categories($args);
  foreach($categories as $category) {
	if ($category->parent==0) {
    echo '<a href=" '.get_category_link( $category->term_id ). '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . strtoupper ($category->name) . '</a> ';
	}
   }
?>
</div>

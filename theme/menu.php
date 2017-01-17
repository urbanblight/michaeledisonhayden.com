<ul class="menu" id="theMenu">
	<li class="icon">
		<a href="javascript:void(0);" onclick="toggleMenu()">
			<i class="material-icons">reorder</i>
		</a>
	</li>

<?php

$page_args = array('sort_order' => 'ASC', 'sort_column' => 'post_title');
$pages=get_pages($page_args);
foreach($pages as $page) {
	echo '<span class="menu_item">
			<a href="'.get_page_link( $page->ID ).'">'
				.strtoupper($page->post_title)
			.'</a>
		</span>';
}

$cat_args=array('orderby' => 'name', 'order' => 'ASC', 'depth' => 1);
$categories=get_categories($args);
foreach($categories as $category) {
	if ($category->parent==0) {
		echo '<span class="menu_item">
				<a href="javascript:void(0)" '
					.'onclick="$(\'#viewing_area\').load(\''
					.get_category_link($category->term_id).' #page_content\');"'
             		.'" title="'.sprintf(__("View all posts in %s"), $category->name)
             		.'">'.strtoupper($category->name)
				.'</a>
			  </span>';
	}
}
?>
    <div id="social">
    	<a href="https://twitter.com/MichaelEHayden" target="_blank">
			<img src="/wp-content/uploads/2016/12/twitter-logo.png" />
		</a>
    </div>
</ul>
<script>
/* Toggle between adding and removing the "responsive" class to menu when the
	user clicks on the icon */
function toggleMenu() {
	var el = document.getElementById("menu");
	if (el.className === "menu") {
		el.className += " responsive";
	} else {
		el.className = "menu";
    }
}
</script>

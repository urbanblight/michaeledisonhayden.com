<div class="container">
<nav>
<?php

$whitelisted_cat_names = array('Fiction', 'Non-fiction');
$cat_args=array('orderby' => 'name', 'order' => 'ASC', 'depth' => 1);
$categories=get_categories($args);
foreach($categories as $category) {
	if ($category->parent==0 && in_array($category->name, $whitelisted_cat_names)) {
		echo '<span class="menuItem">
				<a href="'.get_category_link($category->term_id).'"'
             		.'" title="'.sprintf(__("View all posts in %s"), $category->name)
             		.'">'.strtoupper($category->name)
				.'</a>
			  </span>';
	}
}
?>
</nav>
</div>
<center><div id="social">
    	<a href="https://twitter.com/MichaelEHayden" target="_blank">
			<img src="/wp-content/uploads/2017/03/Twitter_bird_logo_2012.svg_.png" />
		</a>
</div></center>
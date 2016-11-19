<?php
get_header();
echo "<div id=\"container\">
	<div id=\"entries\">
	    <h3>";
if (have_posts()){
    $post = $posts[0]; // Hack. Set $post so that the_date() works.
    /* If this is a category archive */
    if (is_category()) {
	echo single_cat_title();
    /* If this is a daily archive */
    } elseif (is_day()) {
	the_time('F jS, Y');
    /* If this is a monthly archive */
    } elseif (is_month()) {
	the_time('F Y');
    /* If this is a yearly archive */
    } elseif (is_year()) {
	the_time('Y');
    /* If this is a search */
    } elseif (is_search()) {
	echo "Results";
    /* If this is an author archive */
    } elseif (is_author()) {
	echo "Author ";
    /* If this is a paged archive */
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
	echo "Archives";
    }
    echo "</h3>
	    <br/>
		<ul>";
    while (have_posts()) {
	the_post();
	echo "<li>
		<div class=\"results_content\">
		 <h1><a href=\"".the_permalink()."\">".the_title()."</a></h1>
		    <div>".the_time('m.d.y')."<b> | </b> Filed Under ".the_category(', ')."</div><br/>
		    ".the_excerpt()."</div>
		</li>";
    }
    echo "</ul>";
} else {
    echo "<h3>Not Found</h3>";
}
next_posts_link('&laquo; Previous Entries');
echo "<br/>";
previous_posts_link('&raquo; Next Entries');
echo "</div></div>";
get_footer();
?>

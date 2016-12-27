<?php
/*
Template Name: Archives
*/
get_header();
echo "<div id=\"container\">
	<div id=\"entries\">
	    <h1>The Archives</h1>
	    <h3>Archives by Month</h3>
  <ul>";
wp_get_archives('type=monthly&show_post_count=1');
echo "</ul>
    <h3>Archives by Category</h3>
  <ul>";
wp_list_cats('sort_column=name&hierarchical=0&show_count=1');
echo "</ul>
	</div><!--end entries-->
	    </div><!-- end container -->";
get_footer();

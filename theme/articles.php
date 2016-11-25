<?php
if (have_posts()) :  while (have_posts()) : the_post();
echo "<h1><a href=\"".the_permalink()."\">".the_title()."\"</a></h1><div>".the_time('m.d.y')." <b> | </b>Filed Under ".the_category(', ')."</div><br/>";
?>

<?php get_header(); ?>
<h1><a href="http://www.michaeledisonhayden.com"><?php bloginfo('name')?></a></h1>
<hr>
<div id="page_content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php get_footer(); ?>
</div>

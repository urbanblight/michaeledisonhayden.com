<?php get_header(); ?>
<div id="entry">
 <h2><?php the_title(); ?></h2>
<div style="text-align:right"><?php the_time('m.d.y') ?> <b> | </b> Filed Under <?php the_category(', ') ?></div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>
<?php get_footer(); ?>

<?php
/**
 * @package WordPress
 * @subpackage MEH
 */

if (function_exists('get_header')) {
    get_header();
} else {
    /* Redirect browser */
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "");
    exit;
};
?>

<!-- The page layout -->
<div class="container">
	<h1><a href="/"><?php bloginfo('name')?></a></h1>
        <hr>
        <div class="container"  id="viewing_area">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    			<div class="results_content">
            			<h3><a href="javascript:void(0)" onclick="$('#viewing_area').load('<?php the_permalink(); ?> #entry');"><?php the_title(); ?></a></h3>
				<?php the_excerpt().'...' ?>
	    			<div style="text-align:right">
					<?php the_time('m.d.y') ?> <b> | </b> Filed Under <?php the_category(', ') ?>
				</div>
	    			<br/>

    			</div>
		<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
		<?php endif; ?>
		<?php next_posts_link('&laquo; Previous Entries'); ?>
     </div>
</div>
<?php get_template_part( 'menu' ); ?>
<?php get_footer();?>

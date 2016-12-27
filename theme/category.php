<?php get_header(); ?>
<h1><a href="http://www.michaeledisonhayden.com"><?php bloginfo('name')?></a></h1>
<hr>
<h2 style="text-align:center"><?php strtoupper(single_cat_title()); ?></h2>
<br />
<div id="viewing_area">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <li>
            <div class="results_content">
            <h3><a href="javascript:void(0)" onclick="$('#viewing_area').load('<?php the_permalink(); ?> #entry');"><?php the_title(); ?></a></h3>
		<?php the_excerpt().'...' ?>
	    <div style="text-align:right"><?php the_time('m.d.y') ?> <b> | </b> Filed Under <?php the_category(', ') ?></div>
	    <br/>

    </div>
        </li></ul>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php next_posts_link('&laquo; Previous Entries'); ?>
<br/>
<?php previous_posts_link('&raquo; Next Entries'); ?>
</div>
<?php get_footer();?>

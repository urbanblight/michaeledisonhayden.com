<?php

function MEH_get_recent_notes () {
    $notes = array();
    $query_props = array('post_status' => array('publish'),
                         'posts_per_page' => 5,
                         'cat' => 21, # @todo there has to be a better way
                         'orderby' => 'date',
                         'order' => 'DESC');
    $recents = new WP_Query($query_props);
    while ($recents->have_posts()) : $recents->the_post();
        $note = new stdClass();
	$note->permalink = get_permalink();
        $note->title = get_the_title();
        $note->excerpt = get_the_excerpt();
        $note->time = get_the_time('m.d.y');
	foreach (get_the_category() as $category) {
	    $note->category = $note->category ? $note->category.", ".$category->cat_name : $category->cat_name;
	}
        array_push($notes, $note);
    endwhile;
    return $notes;
}

?>

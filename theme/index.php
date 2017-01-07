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

<h1><a href="/"><? bloginfo('name')?></a></h1>
<hr />

<!-- The page layout -->
<div class="container">
    <div class="left" id="sidebar"><?php get_template_part( 'menu' ); ?></div>
    <div class="right" id="viewing_area">
	<div id = "notes">Loading ...</div>
	<div id = "bio">Loading ...</div>
    </div>
</div>


<script>
    // Loads bio from WordPress Bio Page
    $('#bio').load('/bio #page_content');

    // Loads 5 most recent Notes in rotation for 7 seconds each.
    var previewContent = [];
    <? foreach (MEH_get_recent_notes() as $note): ?>
        previewContent.push("<span id=\"note_title\"><h3>LATEST ...</h3></span>"
			      + "<div id=\"single_note\"><h3><a href=\"javascript:void(0)\" onclick=\"$('#viewing_area').load('"
                              + <? echo '"'.$note->permalink.'"' ?> + " #entry');\">"
                              + <? echo '"'.$note->title.'"' ?> + "</a></h3>"
                              + <? echo '"'.$note->excerpt.'"' ?>
                              + "<div style=\"text-align:right\">"
                                + <? echo '"'.$note->time.'"' ?> + "<b> | </b> Filed Under "
                                + <? echo '"'.$note->category.'"' ?>
                                + "</div></div>");
    <? endforeach ?>
    var i = 0;
    function updateNotes(content, note_pos) {
        var note_pos = note_pos || i;
        console.log("executing updateNotes with note_pos of:", note_pos);
	$('#notes').html(content[note_pos]);
        i++;
        if (i == previewContent.length) {i=0;}
    }
    updateNotes(previewContent);
    setInterval(updateNotes, 4000, previewContent);
</script>
<? get_footer(); ?>
</html>

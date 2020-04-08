<?php
get_header();
?>

<div id="layout" class="pure-g">
    <div class="content pure-u-1 pure-u-mid-3-4">
<?php
if (have_posts()):
    while (have_posts()) : the_post();
    the_title();
    the_content();
endwhile;
else:
    _e('No posts');
endif;
?>
</div>
</div>

<?php

get_footer();

?>


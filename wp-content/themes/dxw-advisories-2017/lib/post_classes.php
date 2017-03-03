<?php

add_filter( 'post_class', 'recommendationStatusClass');

function recommendationStatusClass($classes)
{
    global $post;
    $recommendationStatus = get_field('recommendation', $post->ID);
    $classes[] = $recommendationStatus;
    return $classes;
}

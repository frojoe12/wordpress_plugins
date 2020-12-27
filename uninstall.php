<?php

/*
 * trigger this file on Plugin uninstall
 * @package JoeFrostPlugin
 */

 if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
 }


// method 2 - slower, more secure
// clear database stored data
$books = get_posts( 
    [ 'post_type' => 'book', 'numberposts' => -1 ]
);
 
foreach( $books as $book ) {
    wp_delete_post( $book->ID, true );
}    

// method 2 - faster, less secure
// access the database via SQL as one query

/*
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE posts_type = 'book'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (
    SELECT id FROM wp_posts
)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (
    SELECT id FROM wp_posts
)");

*/

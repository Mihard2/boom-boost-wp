<?php
function get_custom_post_type_template($single_template) {
 global $post;

 if ($post->post_type == 'product') {
 $single_template = dirname( __FILE__ ) . '/single-template.php';
 }
 return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );

as well as following code include in template _include
add_filter( 'template_include', 'portfolio_page_template', 99 );

function portfolio_page_template( $template ) {

 if ( is_page( 'slug' )  ) {
 $new_template = locate_template( array( 'single-template.php' ) );
 if ( '' != $new_template ) {
 return $new_template ;
 }
 }

 return $template;
}
?>
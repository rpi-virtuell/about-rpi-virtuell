<?php
/* Write your awesome functions below */
add_action( '__grid_single_post_content' , function(){
	global $post;
	
	$url = get_post_meta ($post->ID, 'link_zum_dienst', true);
	
	echo '<i style="display:none" class="link_zum_dienst">'.$url.'</i>';
	
});
add_action( 'wp_footer', function(){
	?><script>
	jQuery(document).ready(function($){
		$('i.link_zum_dienst').each(function(i, el){
	  
		  var p = $(el).parents('article')[0];
			  
		  $(p).find('a.tc-grid-bg-link').attr('href',$(el).html()) ;
		  $(p).find('h2.entry-title a').first().attr('href',$(el).html()) ;

		});
	});
	
	</script><?php
});

add_filter( 'template_include', 'datenschutz_page_template', 99 );

function datenschutz_page_template( $template ) {

	if ( isset($_GET['frame']) ) {
		$new_template = locate_template( array( 'datenschutz.php' ) );
		if ( !empty( $new_template ) ) {
			return $new_template;
		}
	}

	return $template;
}
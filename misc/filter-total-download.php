// Filter the total download number in English number format
function dlm_shortcode_total_downloads_formatting( $total ) {

	$english_format_number = number_format($total);
	return $english_format_number;
} 
add_filter( 'dlm_shortcode_total_downloads', 'dlm_shortcode_total_downloads_formatting' );

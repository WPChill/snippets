function dlm_add_custom_seconds_to_downloading_page( $seconds ) {
  return 500;
 }
 
 add_filter( 'dlm_dp_automated_start_seconds', 'dlm_add_custom_seconds_to_downloading_page' );

/**
 * All downloads require visitors to be logged in
 *
 * @param $can_download
 * @param $download
 *
 * @return bool
 */
function dlm_all_downloads_members_only( $can_download, $download ) {

	// No need for checking if access is already denied
	if ( false == $can_download ) {
		return $can_download;
	}

	// Check if user is logged in
	if ( ! is_user_logged_in() ) {
		$can_download = false;
	} // Check if it's a multisite and if user is member of blog
	else if ( is_multisite() && ! is_user_member_of_blog( get_current_user_id(), get_current_blog_id() ) ) {
		$can_download = false;
	}

	return $can_download;
}

add_filter( 'dlm_can_download', 'dlm_all_downloads_members_only', 10, 2 );
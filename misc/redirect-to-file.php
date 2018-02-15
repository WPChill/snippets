/**
 *  Redirect to file & disable forced downloads
 *
 */

add_filter( 'dlm_do_not_force', '__return_true' );
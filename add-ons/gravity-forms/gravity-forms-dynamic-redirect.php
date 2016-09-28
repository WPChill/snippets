<?php

// Gravity Forms Dynamic Redirect

add_filter( 'gform_confirmation', 'dlm_gf_dynamic_redirect', 10, 4 );
function dlm_gf_dynamic_redirect( $confirmation, $form, $entry, $ajax ) {

	// DLM GF Handler
	$dlm_gf_handler = new DLM_GF_Gravity_Forms_Handler();

	// fetch download ID dynamically from form
	$lead_id = $dlm_gf_handler->get_lead_index_of_dlm_field( $form );

	// check
	if ( null !== $lead_id ) {

		if ( isset( $entry[ $lead_id ] ) ) {
			$download_id = absint( $entry[ $lead_id ] );

			// create download
			$download = new DLM_Download( $download_id );

			// check URL
			if ( '' != $download->get_the_download_link() ) {

				// set redirect
				$confirmation = array( 'redirect' => $download->get_the_download_link() );

			}
		}

	}

	return $confirmation;
}
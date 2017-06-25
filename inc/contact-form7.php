<?php

/**
 * Inspired by Contact Form 7 :: Changing the default contact form 
 *
 * @package pedamuse
 */

function pedamuse_contact7( $template, $prop) {
	if ( 'form' == $prop ) {
		$template = implode(
			'', 
			array(
				'<div class="controls">',
				'<div class="row">',
				'<div class="col-md-6">',
				'<div class="form-group">',
				'<label for="form_name" hidden>Firstname *</label>',
				'[text*  your-name class:form-control id:form_name placeholder "Enter your First Name"]',
				'</div>',
				'</div>',
				'<div class="col-md-6">',
				'<div class="form-group">',
				'<label for="form_lastname" hidden>Lastname *</label>',
				'[text*  your-surname class:form-control id:form_lastname  placeholder "Enter your Last Name"]',
				'</div>',
				'</div>',
				'</div>',
				'<div class="row">',
				'<div class="col-md-6">',
				'<div class="form-group">',
				'<label for="form_email" hidden>Email *</label>',
				'[email* your-email class:form-control id:form_email placeholder "Enter your Email"]',
				'</div>',
				'</div>',
				'<div class="col-md-6">',
				'<div class="form-group">',
				'<label for="form_phone" hidden>Phone</label>',
				'[tel* your-phone class:form-control id:form_phone placeholder "Enter your Phone"]',
				'</div>',
				'</div>',
				'</div>',
				'<div class="row">',
				'<div class="col-md-12">',
				'<div class="form-group">',
				'<label for="form_message" hidden>Message *</label>',
				'[textarea*  your-message class:form-control id:form_message x3 placeholder "Start typing here"]',
				'</div>',
				'</div>',
				'<div class="col-md-12">',
				'[submit class:btn class:btn-success class:btn-send "Get in touch"]',
				'</div>',
				'</div>',
				'<div class="row">',
				'<div class="col-md-12">',
				'<p class="text-muted pull-right"><strong>*</strong> These fields are required.</p>',
				'</div>',
				'</div>',
				'</div>'
			)
		);

	return trim( $template );

	} else {
		return $template;
	}
}

add_filter( 'wpcf7_default_template', 'pedamuse_contact7', 10, 2 );


// Naming the form to Pedamuse Contact
function mod_contact7_form_title( $template ) {
	$template->set_title( 'Pedamuse Contact' );
	return $template;
}
add_filter( 'wpcf7_contact_form_default_pack', 'mod_contact7_form_title' );

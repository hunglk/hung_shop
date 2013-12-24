<?php

	if (!defined('BASEPATH'))
		exit('No direct script access allowed');

	// section default
	$template['frontend']['template'] = 'default_template';
	$template['frontend']['regions'] = array(
		'header',
		'content',
		'footer',
	);
	$template['frontend']['parser'] = 'parser';
	$template['frontend']['parser_method'] = 'parse';
	$template['frontend']['parse_template'] = FALSE;

	// section default
	$template['home']['template'] = 'home_template';
	$template['home']['regions'] = array(
		'header',
		'content',
		'footer'
	);
	$template['home']['parser'] = 'parser';
	$template['home']['parser_method'] = 'parse';
	$template['home']['parse_template'] = FALSE;
<?php

	if (!defined('BASEPATH'))
		exit('No direct script access allowed');

	// section default
	$template['admin']['template'] = 'admin/admin_template';
	$template['admin']['regions'] = array(
		'header',
		'content',
		'footer'
	);
	$template['admin']['parser'] = 'parser';
	$template['admin']['parser_method'] = 'parse';
	$template['admin']['parse_template'] = FALSE;

	// section default
	$template['backend']['template'] = 'admin/default_template';
	$template['backend']['regions'] = array(
		'header',
		'content',
		'footer'
	);
	$template['backend']['parser'] = 'parser';
	$template['backend']['parser_method'] = 'parse';
	$template['backend']['parse_template'] = FALSE;
<?php

// This script starts the process of setting up the gateway info.

// Create an array for the information:
$data = array();

// Transaction stuff:
$data['x_type'] = 'AUTH_ONLY';

// Billing info:
$data['x_card_num'] = $cc_number;
$data['x_exp_date'] = $cc_exp;
$data['x_card_code'] = $cc_cvv;
$data['x_first_name'] = $cc_first_name;
$data['x_last_name'] = $cc_last_name;
$data['x_address'] = $cc_address;
$data['x_state'] = $cc_state;
$data['x_city'] = $cc_city;
$data['x_zip'] = $cc_zip;

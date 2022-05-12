<?php

/*
 * --------------------------------------------------------------------
 * Calendar module routes definitions
 * --------------------------------------------------------------------
 */
$routes->group('{locale}/calendar', ['namespace' => 'Calendar\Controllers'], function ($routes) {
	$routes->add('/', 'Calendar::index');		
});
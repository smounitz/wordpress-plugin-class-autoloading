<?php

spl_autoload_register("plugin_class_autoload");

function plugin_class_autoload($class_name)
{
	$parts = explode('\\', $class_name);
	
	if ( 3 == count( $parts ) ){
		
		$vedor 	= $parts[0];
		$plugin = $parts[1];
		$class	= $parts[2];
		
		$class_file	 = 'wp-content/plugins/' . $vender . '-' . $plugin . '/classes/' . $class . '.php';

		$class_file = str_replace( '_','-', $class_file );
		$class_file = strtolower($class_file);
		$class_file = ABSPATH . $class_file;

		if ( is_readable( $class_file) ){
			
			require_once $class_file;	
		}
	}	
}
<?php

require_once 'RouteMethods.php';

Class Route
{
	
	
	private static $instance = null;
	
	 public static function getRouteMethodInstance( $arguments )
	{
		if ( self::$instance === null )
		{
			self::$instance = new RouteMethods( $arguments[0], $arguments[1] );
		}
		else{
			self::$instance->setRouteString($arguments[0]);
			self::$instance->setCallback($arguments[1]);
		}
		
		return self::$instance;
	}
	
	public static function __callStatic( $name, $arguments )
	{
		$routeMethods = self::getRouteMethodInstance( $arguments );
		
		return call_user_func_array( [$routeMethods, $name], $arguments );
		
	}
	
}
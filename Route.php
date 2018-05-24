<?php

require_once 'RouteMethod.php';

class Route
{
	
	
	/**
	 * @var null
	 */
	private static $instance = null;
	
	
	/**
	 * It Creates object of RouteMethod class at once and uses it ( Singleton Pattern )
	 * @param $arguments
	 * @return RouteMethodInterface
	 */
	public static function getRouteMethodInstance( $arguments ) : RouteMethodInterface
	{
		
		if ( self::$instance === null )
		{
			self::$instance = new RouteMethod( $arguments[0], $arguments[1] );
		}
		else{
			self::$instance->setRouteString($arguments[0]);
			self::$instance->setCallback($arguments[1]);
		}
		return self::$instance;
	}
	
	/**
	 * By CallStatic method every public methods from the RouteMethod class will be invoked statically
	 * @param string $name
	 * @param array $arguments
	 * @return mixed
	 */
	public static function __callStatic( string $name, array $arguments )
	{
		
		try{
			$routeMethods = self::getRouteMethodInstance($arguments );
		}
		catch (Throwable $exception)
		{
			echo $exception->getMessage();
		}
	
		
		return call_user_func_array( [$routeMethods, $name], $arguments );
		
	}
	
}
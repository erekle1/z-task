<?php


class RouteMethods
{
	
	private $requestMethod;
	private $requestUri;
	private $routeString;
	private $callback;
	static $requestMethods = ['POST', 'GET'];
	
	public function __construct( $routeString, $callback )
	{
		$this->callback      = $callback;
		$this->routeString   = $routeString;
		$this->requestMethod = $_SERVER['REQUEST_METHOD'];
		$this->requestUri    = $_SERVER['REQUEST_URI'];
		$this->beforeRequest( $routeString, $callback );
	}
	
	
	public function setCallback( $callBackName )
	{
		
		$this->callback = $callBackName;
	}
	
	public function setRouteString( $routeString )
	{
		$this->routeString = $routeString;
	}
	
	public function get( $routeString, $callback )
	{
		if ( $this->requestMethod == 'GET' &&  $routeString == $this->requestUri ) {
			return $callback();
		}
		
	}
	
	public function post( $routeString, $callback )
	{
		if ( $this->requestMethod == 'POST' &&  $routeString == $this->requestUri ) {
			return $callback();
		}
		
	}
	
	private function beforeRequest( $routeString, $callback )
	{
//		try {
//			if ( $routeString != $this->requestUri ) {
//				throw new Exception( 'Request URI does not math any routes' );
//			}
//			if ( !$this->is_closure( $callback ) ) {
//				throw new Exception( 'There is no closure function' );
//			}
//		} catch ( Exception $exception ) {
//			echo $exception->getMessage();
//
//		}
		
	}
//
//	public function __call( $name, $arguments )
//	{
//
//
//		switch ( $this->requestMethod ) {
//			case 'GET' :
//				return $this->$name( $arguments );
//				break;
//			case 'POST' :
//				return $this->$name( $arguments );
//				break;
//		}
//
//	}
	
	private function is_closure( $t )
	{
		return is_object( $t ) && ($t instanceof Closure);
	}
	
	
}
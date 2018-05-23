<?php

require_once 'RouteMethodsInterface.php';

class RouteMethod implements RouteMethodsInterface
{
	
	private $requestMethod;
	private $requestUri;
	public $routeString;
	private $callback;
	static $requestMethods = ['POST', 'GET'];
	
	public function __construct( string $routeString, Closure $callback )
	{
		$this->callback      = $callback;
		$this->routeString   = $routeString;
		$this->requestMethod = $_SERVER['REQUEST_METHOD'];
		$this->requestUri    = $_SERVER['REQUEST_URI'];
	}
	
	public function setCallback( Closure $callBackFunction ): void
	{
		$this->callback = $callBackFunction;
	}
	
	public function setRouteString( string $routeString ): void
	{
		try {
			if ( $routeString === null ) {
				throw new InvalidArgumentException( 'Route is null' );
			} else {
				$this->routeString = $routeString;
			}
		} catch ( InvalidArgumentException $exception ) {
			echo $exception->getMessage();
		}
		
	}
	
	public function setRequestMethod( string $requestMethod ): void
	{
		try {
			if ( !in_array( $requestMethod, self::$requestMethods ) ) {
				throw new InvalidArgumentException( 'Request method is not valid' );
			} else {
				$this->requestMethod = $requestMethod;
			}
		} catch ( InvalidArgumentException $exception ) {
			echo $exception->getMessage();
		}
		
	}
	
	public function get( string $uri, Closure $callback )
	{
		return $this->request( 'GET', $uri, $callback );
	}
	
	public function post( string $uri, Closure $callback )
	{
		return $this->request( 'POST', $uri, $callback );
	}
	
	protected function request( $method, $URI, $callback )
	{
		if ( $this->requestMethod == $method && $URI == $this->requestUri ) {
			return call_user_func( $this->callback );
		}
	}
	
	
	
	
}
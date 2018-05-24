<?php

require_once 'RouteMethodInterface.php';

class RouteMethod implements RouteMethodInterface
{
	
	private $requestMethod;
	private $requestUri;
	private $routeString;
	private $callback;
	static $requestMethods = ['POST', 'GET'];
	
	public function __construct( string $routeString, Closure $callback )
	{
		$this->setRouteString( $routeString );
		$this->setCallback( $callback );
		$this->requestMethod = $_SERVER['REQUEST_METHOD'];
		$this->requestUri    = $_SERVER['REQUEST_URI'];
	}
	
	/**
	 * @param Closure $callBackFunction
	 */
	public function setCallback( Closure $callBackFunction ): void
	{
		$this->callback = $callBackFunction;
	}
	
	/**
	 * @param string $routeString
	 */
	public function setRouteString( string $routeString ): void
	{
		
		$this->routeString = trim( $routeString );
	}
	
	/**
	 * @param string $requestMethod
	 */
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
	
	/**
	 * @param string $uri
	 * @param Closure $callback
	 * @return mixed
	 */
	public function get( string $uri, Closure $callback )
	{
		return $this->request( 'GET', $uri, $callback );
	}
	
	/**
	 * @param string $uri
	 * @param Closure $callback
	 * @return mixed
	 */
	public function post( string $uri, Closure $callback )
	{
		return $this->request( 'POST', $uri, $callback );
	}
	
	/**
	 * @param string $method
	 * @param string $URI
	 * @param $callback
	 * @return mixed
	 */
	protected function request( string $method, string $URI, $callback )
	{
		if ( $this->requestMethod == $method && $URI == $this->requestUri ) {
			return call_user_func( $this->callback );
		}
	}
	
	
}
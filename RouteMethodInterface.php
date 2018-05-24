<?php
/**
 * Created by PhpStorm.
 * User: erekle
 * Date: 5/23/18
 * Time: 3:52 PM
 */

interface RouteMethodInterface
{
	/**
	 * @param string $uri
	 * @param Closure $callback
	 * @return mixed
	 */
	public function get( string $uri, Closure $callback );
	
	/**
	 * @param string $uri
	 * @param Closure $callback
	 * @return mixed
	 */
	public function post( string $uri, Closure $callback );
	
}
<?php
/**
 * Created by PhpStorm.
 * User: erekle
 * Date: 5/23/18
 * Time: 3:52 PM
 */

interface RouteMethodsInterface
{
	public function get( string $uri, Closure $callback );
	
	public function post( string $uri, Closure $callback );
	
	
}
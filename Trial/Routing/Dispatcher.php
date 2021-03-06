<?php namespace Trial\Routing;

use Trial\Injection\Container;

use Trial\Routing\Http\Request,
	Trial\Routing\Http\Response;

/**
 * Dispatcher class
 * 
 * Dispatches and executes the request
 * 
 * @package Trial
 */

class Dispatcher {
	
	/**
	 * Dispatch the request
	 * 
	 * @param \Trial\Injection\Container $container
	 * @param \Trial\Routing\Http\Route $route
	 * @param \Trial\Routing\Http\Request $request
	 * @return \Trial\Routing\Http\Response
	 */
	public function dispatch (
		Container $container, 
		Route $route, 
		Request $request
	) {
		$action = $route->getAction();
		$response = new Response;
		
		if ($body = $action->invoke($container, $request, $response)) {
			$response->setBody($body);
		}
		
		return $response;
	}
	
}
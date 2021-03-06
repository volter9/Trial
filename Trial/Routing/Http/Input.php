<?php namespace Trial\Routing\Http;

use Trial\Helpers\DotNotation;

/**
 * @todo make it unit testable
 */

class Input {
	
	private $get;
	private $post;
	private $server;
	
	private $headers;
	
	public function __construct (array $data = [], array $headers = []) {
		$this->get    = isset($data['get'])    ? $data['get']    : $_GET;
		$this->post   = isset($data['post'])   ? $data['post']   : $_POST;
		$this->server = isset($data['server']) ? $data['server'] : $_SERVER;
		
		$this->headers = $headers ? $headers : getallheaders();
	}
	
	public function header ($header = null) {
		return $header === null
			? $this->headers
			: DotNotation::get($this->headers, $header, false);
	}
	
	public function get ($key = null) {
		return $key === null 
			? $this->get 
			: DotNotation::get($this->get, $key);
	}
	
	public function post ($key = null) {
		return $key === null 
			? $this->post 
			: DotNotation::get($this->post, $key);
	}
	
	public function server ($key = null) {
		return $key === null 
			? $this->server 
			: DotNotation::get($this->server, $key);
	}
	
}
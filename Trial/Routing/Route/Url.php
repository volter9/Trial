<?php namespace Trial\Routing\Route;

use Trial\Routing\Http\Request;

class Url {
	
	private $method;
	private $url;
	
	private $pattern;
	
	public function __construct ($method, $url) {
		$this->method = $method;
		$this->url = $url;
	}
	
	public function getUrl () {
		return $this->url;
	}
	
	public function getMethod () {
		return $this->method;
	}
	
	public function setPattern ($pattern) {
		$this->pattern = $pattern;
	}
	
	public function match (Url $url) {
		return $this->compareMethod($url->getMethod())
			&& $this->matchUrl($url->getUrl());
	}
	
	private function compareMethod ($method) {
		return $this->method === '*' 
			|| $this->method === $method;
	}
	
	protected function matchUrl ($url) {
		return $this->url === $url 
			|| preg_match($this->pattern, $url);
	}
	
}
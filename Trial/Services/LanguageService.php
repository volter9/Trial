<?php namespace Trial\Services;

use Trial\Config;

use Trial\Injection\Container;

class LanguageService implements Service {
	
	public function register (Container $container) {
		$config = $container->get('configs.app')->get('language');
		
		$path = $container->get('app.path')->build(
			"{$config['folder']}{$config['default']}"
		);
		
		$container->set('language', new Config($path));
	}
	
}
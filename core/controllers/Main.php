<?php 

namespace core\controllers;

use core\classes\Store;

class Main{

	public function index(){

		$dataweb = [
			'title'=> APP_NAME . '' . APP_VERSION,
		];

		Store::Layout([
			'layouts/html_header',
			'layouts/header',
			'home',
			'layouts/footer',
			'layouts/html_footer',
		], $dataweb);
	}
}
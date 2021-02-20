<?php 

namespace App\Controller;

use Src\Request;

class Controller 
{
	public $request;

	public function __construct()
	{
		$this->request = new Request;
	}

	public function view($arquivo, $array = null)
	{
		if (!is_null($array)) {
			foreach ($array as $var => $value) {
				${$var} = $value;
			}
		}
		ob_start();
		include __DIR__ . '/../View/layout.php';
		ob_flush();
	}

}
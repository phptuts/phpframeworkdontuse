<?php

namespace Core\Facade;

use Core\Http\ParamBag;
use Core\Http\Request;

/**
 * Class RequestFacade
 *
 * @package Core\Facade
 */
class RequestFacade 
{
	/**
	 * @return Request
	 */
	public static function createRequest() {
		
		$post = (new ParamBag())->add($_POST);
		
		$get = (new ParamBag())->add($_GET);
		
		$files = (new ParamBag())->add($_FILES);
		
		$server = (new ParamBag())->add($_SERVER);
		
		return new Request($_SERVER['REQUEST_URI'], $get, $post, $files, $server);
		
	}
}
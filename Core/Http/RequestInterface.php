<?php

namespace Core\Http;

/**
 * Interface RequestInterface
 *
 * @package Core\Http
 */
interface RequestInterface {

	/**
	 * @return string
	 */
	public function getUrl();

	/**
	 * @return ParamBagInterface
	 */
	public function query();

	/**
	 * @return ParamBagInterface
	 */
	public function post();

	/**
	 * @return ParamBagInterface
	 */
	public function files();

	/**
	 * @return ParamBagInterface
	 */
	public function server();
	
}

<?php

namespace Core\Http;

interface ParamBagInterface {

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public function get($name);

	/**
	 * @return array
	 */
	public function all();

	/**
	 * @return mixed
	 */
	public function keys();

	/**
	 * @param array $parameters
	 *
	 * @return array
	 */
	public function add($parameters);

	/**
	 * @param string $key
	 * @param string $value
	 *
	 * @return mixed
	 */
	public function set($key, $value);

	/**
	 * @param string $key
	 *
	 * @return boolean
	 */
	public function has($key);

	/**
	 * @param string $key
	 *
	 * @return $this
	 */
	public function remove($key);
	
}

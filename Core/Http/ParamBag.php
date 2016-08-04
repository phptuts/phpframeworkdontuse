<?php

namespace Core\Http;

/**
 * Use a basic collection for params like query, files, and post variables
 *
 * Class ParamBag
 *
 * @package Core\Http
 */
class ParamBag implements ParamBagInterface
{
	/**
	 * @var array
	 */
	protected $params = [];

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public function get($name)
	{
		return $this->params[$name];
	}

	/**
	 * @return array
	 */
	public function all()
	{
		return $this->params;
	}

	/**
	 * @return array
	 */
	public function keys()
	{
		return array_keys($this->params);
	}

	/**
	 * @param array $parameters
	 * 
	 * @return $this
	 */
	public function add($parameters)
	{
		$this->params = array_merge($this->params, $parameters);
		
		return $this;
	}

	/**
	 * @param string $key
	 * @param string $value
	 * 
	 * @return $this
	 */
	public function set($key, $value)
	{
		$this->params[$key] = $value;
		
		return $this;
	}

	/**
	 * @param string $key
	 * 
	 * @return $this
	 */
	public function has($key)
	{
		return isset($this->params[$key]);
	}

	/**
	 * @param string $key
	 *
	 * @return $this
	 */
	public function remove($key)
	{
		unset($this->params[$key]);
		
		return $this;
	}

}
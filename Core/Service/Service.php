<?php

namespace Core\Service;

/**
 * Class Service
 *
 * @package Core\Service
 */
class Service
{
	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $class;

	/**
	 * @var array
	 */
	protected $args;

	/**
	 * @var boolean
	 */
	protected $shared;

	/**
	 * Service constructor.
	 *
	 * @param $name
	 * @param $class
	 * @param array $args
	 * @param bool $shared
	 */
	public function __construct($name, $class, $args = [], $shared = true)
	{
		$this->name = $name;
		$this->class = $class;
		$this->args = $args;
		$this->shared = true;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 *
	 * @return $this
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getClass()
	{
		return $this->class;
	}

	/**
	 * @param mixed $class
	 *
	 * @return $this
	 */
	public function setClass($class)
	{
		$this->class = $class;

		return $this;
	}

	/**
	 * @return array
	 */
	public function getArgs()
	{
		return $this->args;
	}

	/**
	 * @param Argument $arg
	 *
	 * @return $this
	 */
	public function addArgs(Argument $arg)
	{
		$this->args[] = $arg;

		return $this;
	}

	/**
	 * @return boolean
	 */
	public function isShared()
	{
		return $this->shared;
	}
	
	

	

}
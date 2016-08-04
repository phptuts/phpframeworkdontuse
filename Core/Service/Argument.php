<?php

namespace Core\Service;

/**
 * Class Argument
 *
 * @package Core\Service
 */
class Argument
{
	const TYPE_SERVICE = 'service';
	
	const TYPE_RAW = 'raw';

	/**
	 * @var
	 */
	protected $value;

	/**
	 * @var string
	 */
	protected $type;

	/**
	 * Argument constructor.
	 *
	 * @param $value
	 * @param string $type
	 */
	public function __construct($value, $type = self::TYPE_SERVICE)
	{
		$this->value = $value;
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
	
	

}
<?php

namespace App\Model;

/**
 * Class Cow
 *
 * @package App\Model
 */
class Cow implements AnimalInterface
{

	/**
	 * @var int
	 */
	protected $price = 100;

	/**
	 * @return int
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param float $price
	 *
	 * @return float
	 */
	public function setPrice($price)
	{
		$this->price = $price;

		return $price;
	}
}
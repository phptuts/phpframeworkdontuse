<?php

namespace App\Model;

/**
 * Class Chicken
 *
 * @package App\Model
 */
class Chicken implements AnimalInterface
{
	/**
	 * @var int
	 */
	protected $price = 40;

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
<?php

namespace App\Model;

interface AnimalInterface
{
	/**
	 * @return double
	 */
	public function getPrice();

	/**
	 * Sets the price
	 * 
	 * @param double $price
	 *
	 * @return mixed
	 */
	public function setPrice($price);
	
}
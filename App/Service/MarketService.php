<?php

namespace App\Service;

use App\Model\AnimalInterface;

class MarketService
{
	protected  $money;

	/**
	 * @param double $money
	 *
	 * @return $this
	 */
	public function loadMoney($money) 
	{
		$this->money += $money;
		
		return $this;
	}
	
	public function spendMoney($money) 
	{
		$this->money -= $money;

		return $this;

	}

	/**
	 * @param AnimalInterface $animal
	 *
	 * @return $this
	 */
	public function buy(AnimalInterface $animal) 
	{
		$this->money -= $animal->getPrice();
		
		return $this;
	}

	/**
	 * @param AnimalInterface $animal
	 *
	 * @return $this
	 */
	public function sell(AnimalInterface $animal) 
	{
		$this->money += $animal->getPrice();
		
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function balance() 
	{
		return $this->money;
	}
}
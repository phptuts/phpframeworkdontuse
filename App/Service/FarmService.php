<?php

namespace App\Service;

use App\Model\AnimalInterface;

/**
 * Class FarmService
 *
 * @package App\Service
 */
class FarmService
{
	const FENCE_PRICE = 100;

	/**
	 * @var MarketService
	 */
	protected $market;

	/**
	 * FarmService constructor.
	 *
	 * @param MarketService $market
	 */
	public function __construct(MarketService $market)
	{
		$this->market = $market;
	}

	/**
	 * @return $this
	 */
	public function buildFence() {
		$this->market->spendMoney(self::FENCE_PRICE);
		
		return $this;
	}

	/**
	 * @param AnimalInterface $animal
	 * @param $number
	 */
	public function buyAnimals(AnimalInterface $animal, $number) {
		for ($i = 0; $i < $number; $i += 1) {
			$this->market->buy($animal);
		}
	}

	/**
	 * @param AnimalInterface $animal
	 * @param $number
	 */
	public function sellAnimals(AnimalInterface $animal, $number) {
		for ($i = 0; $i < $number; $i += 1) {
			$this->market->sell($animal);
		}
	}

	/**
	 * @return mixed
	 */
	public function balance() {
		return $this->market->balance();
	}

	/**
	 * @param $money
	 *
	 * @return $this
	 */
	public function addMoney($money) 
	{
		$this->market->loadMoney($money);
		
		return $this;
	}
}
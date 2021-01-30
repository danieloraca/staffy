<?php
declare(strict_types=1);

namespace App\Models;

class Rota
{
    /** @var Shop */
    private $shop;

    /** @var string */
    private $weekCommenceDate;

    /** @var array */
    private $staff;

    /** @var array */
    private $shifts;

    public function __construct(Shop $shop, string $weekCommenceDate)
    {
        $this->shop = $shop;
        $this->weekCommenceDate = $weekCommenceDate;
    }

    /**
     * @return Shop
     */
    public function getShop(): Shop
    {
        return $this->shop;
    }

    /**
     * @param Shop $shop
     */
    public function setShop(Shop $shop): void
    {
        $this->shop = $shop;
    }

    /**
     * @return string
     */
    public function getWeekCommenceDate(): string
    {
        return $this->weekCommenceDate;
    }

    /**
     * @param string $weekCommenceDate
     */
    public function setWeekCommenceDate(string $weekCommenceDate): void
    {
        $this->weekCommenceDate = $weekCommenceDate;
    }
}

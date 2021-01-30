<?php
declare(strict_types=1);

namespace App\Models;

class Staff
{
    /** @var string */
    private $firstName;

    /** @var ?string */
    private $lastName;

    /** @var Shop */
    private $shop;

    public function __construct(Shop $shop, string $firstName, ?string $lastName)
    {
        $this->shop = $shop;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return ?string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
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
}
